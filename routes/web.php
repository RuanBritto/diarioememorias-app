<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\DiaryEntry;

/*
|--------------------------------------------------------------------------
| HOME
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    if (Auth::check()) {
        return redirect('/memorias');
    }

    return Inertia::render('Welcome');
});

/*
|--------------------------------------------------------------------------
| AUTH (VIEWS VIA INERTIA)
|--------------------------------------------------------------------------
*/

// LOGIN
Route::get('/login', function () {
    if (Auth::check()) {
        return redirect('/memorias');
    }

    return Inertia::render('Auth/Login');
})->name('login');

// REGISTER
Route::get('/register', function () {
    if (Auth::check()) {
        return redirect('/memorias');
    }

    return Inertia::render('Auth/Register');
});

/*
|--------------------------------------------------------------------------
| AUTH ACTIONS
|--------------------------------------------------------------------------
*/

require __DIR__ . '/auth.php';

/*
|--------------------------------------------------------------------------
| ROTAS PROTEGIDAS
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/memorias', function () {
        $entries = DiaryEntry::where('user_id', Auth::id())
            ->latest()
            ->get();

        return Inertia::render('Memorias', [
            'entries' => $entries
        ]);
    });

    Route::get('/diario', function () {
        return Inertia::render('Diario');
    });

    Route::post('/salvar', function (Request $request) {
        DiaryEntry::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect('/memorias');
    });

    Route::get('/editar/{id}', function ($id) {
        $entry = DiaryEntry::findOrFail($id);

        if ($entry->user_id !== Auth::id()) {
            abort(403);
        }

        return Inertia::render('Editar', [
            'entry' => $entry
        ]);
    });

    Route::post('/atualizar/{id}', function (Request $request, $id) {
        $entry = DiaryEntry::findOrFail($id);

        if ($entry->user_id !== Auth::id()) {
            abort(403);
        }

        $entry->update([
            'title' => $request->title,
            'content' => $request->content
        ]);

        return redirect('/memorias');
    });

    Route::delete('/deletar/{id}', function ($id) {
        $entry = DiaryEntry::findOrFail($id);

        if ($entry->user_id !== Auth::id()) {
            abort(403);
        }

        $entry->delete();

        return redirect('/memorias');
    });

});
