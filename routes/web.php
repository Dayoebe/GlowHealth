<?php

use App\Livewire\Contact;
use App\Livewire\Home;
use App\Livewire\Impact;
use App\Livewire\Outreach;
use App\Livewire\Partner;
use App\Livewire\Services;
use App\Livewire\Volunteer;
use Illuminate\Support\Facades\Route;

Route::livewire('/', Home::class)->name('home');
Route::livewire('/contact', Contact::class)->name('contact');
Route::livewire('/impact', Impact::class)->name('impact');
Route::livewire('/outreach', Outreach::class)->name('outreach');
Route::livewire('/partner', Partner::class)->name('partner');
Route::livewire('/services', Services::class)->name('services');
Route::livewire('/volunteer', Volunteer::class)->name('volunteer');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
});

require __DIR__.'/settings.php';
