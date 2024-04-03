<?php

use App\Http\Controllers\AlarmeController;
use App\Http\Controllers\ProfileController;
use App\Models\AgencyDoorOpening;
use Illuminate\Support\Facades\Route;

Route::get('/', static function () {
    $open_door = AgencyDoorOpening::all();
    return view('dashboard')->with('open_door', $open_door);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/disparar-alarme', [AlarmeController::class, 'send'])->name('alarme.send');
    Route::get('/parar-alarme', [AlarmeController::class, 'pause'])->name('alarme.stop');
});

require __DIR__.'/auth.php';
