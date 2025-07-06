<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\ServicesList;

Route::get('/', function () {
    return view('welcome');
});

Route::get('services', ServicesList::class)->name('services.list');
