<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Http\Request;
use App\Models\DiaryEntry;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::middleware('auth')->group(function () {

    Route::get('/diario', function () {

    $entries = DiaryEntry::where('user_id', Auth::id())
        ->latest()
        ->take(5)
        ->get();

    return view('diario', compact('entries'));

})->middleware('auth');

    Route::post('/salvar', function (Request $request) {
        DiaryEntry::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'content' => $request->content
        ]);

        return redirect('/memorias');
    });

    Route::get('/memorias', function () {
    $entries = DiaryEntry::where('user_id', Auth::id())
        ->latest()
        ->take(5)
        ->get();

    return view('memorias', compact('entries'));
})->middleware('auth');

});
Route::get('/', function () {
    return view('MenuInicial');
});
Route::get('/', function () {
    if (Auth::check()) {
        return redirect('/diario');
    }

    return view('MenuInicial');
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
Route::get('/editar/{id}', function ($id) {
    $entry = DiaryEntry::findOrFail($id);

    // segurança: só dono pode editar
    if ($entry->user_id !== Auth::id()) {
        abort(403);
    }

    return view('editar', compact('entry'));
})->middleware('auth');
Route::post('/atualizar/{id}', function (Request $request, $id) {
    $entry = DiaryEntry::findOrFail($id);

    // segurança
    if ($entry->user_id !== Auth::id()) {
        abort(403);
    }

    $entry->update([
        'title' => $request->title,
        'content' => $request->content
    ]);

    return redirect('/memorias');
})->middleware('auth');
Route::delete('/deletar/{id}', function ($id) {
    $entry = DiaryEntry::findOrFail($id);

    // segurança: só o dono pode excluir
    if ($entry->user_id !== Auth::id()) {
        abort(403);
    }

    $entry->delete();

    return redirect('/memorias');
})->middleware('auth')->name('deletar');
Route::get('/welcome', function () {
    $entries = DiaryEntry::where('user_id', Auth::id())
        ->latest()
        ->take(5) // só os últimos 5
        ->get();

    return view('welcome', compact('entries'));
})->middleware('auth');