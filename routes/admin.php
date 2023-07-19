<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Admin\Users\ListUsers;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Livewire\Admin\Appointments\CreateAppointmentForm;
use App\Http\Livewire\Admin\Appointments\ListAppointments;
use App\Http\Livewire\Admin\Appointments\UpdateAppointmentForm;
use App\Http\Livewire\Admin\Profile\UpdateProfile;
use App\Http\Livewire\Admin\Settings\UpdateSetting;
use App\Http\Livewire\Analythics;

    // Halaman Dashboard
    Route::get('dashboard', DashboardController::class)->name('dashboard');

    // Halaman pengolahan data user // Untuk CRUD Dalam bentuk modal
    Route::get('users', ListUsers::class)->name('users');

    // Halaman pengolahan data appointments
    // Halaman Utama
    Route::get('appointments', ListAppointments::class)->name('appointments');
    // Halaman tambah
    Route::get('appointments/create', CreateAppointmentForm::class)->name('appointments.create');
    // Halaman ubah data
    Route::get('appointments/{appointment}/edit', UpdateAppointmentForm::class)->name('appointment.edit');

    // Halaman edit profile
    Route::get('profile', UpdateProfile::class)->name('profile.edit');

    // Halaman Pengolahan data analythics
    Route::get('analythics', Analythics::class)->name('analythics');

    // Halaman Pengolahan data setting
    Route::get('settings', UpdateSetting::class)->name('settings');