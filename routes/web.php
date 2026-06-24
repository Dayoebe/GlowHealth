<?php

use App\Livewire\Home;
use App\Livewire\Impact;
use App\Livewire\Outreach;
use App\Livewire\Services;
use Illuminate\Support\Facades\Route;

Route::livewire('/', Home::class)->name('home');
Route::livewire('/impact', Impact::class)->name('impact');
Route::livewire('/outreach', Outreach::class)->name('outreach');
Route::livewire('/services', Services::class)->name('services');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
});

require __DIR__.'/settings.php';
