<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Admin\Users\ListUsers;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Livewire\Admin\Appointments\CreateAppointmentForm;
use App\Http\Livewire\Admin\Appointments\ListAppointments;
use App\Http\Livewire\Admin\Appointments\UpdateAppointmentForm;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::group(['middleware' => ['auth', 'admin']], function (){
//     // Halaman Dashboard
//     Route::get('admin/dashboard', DashboardController::class)->name('admin.dashboard');

//     // Halaman pengolahan data user // Untuk CRUD Dalam bentuk modal
//     Route::get('admin/users', ListUsers::class)->name('admin.users');

//     // Halaman pengolahan data appointments
//     // Halaman Utama
//     Route::get('admin/appointments', ListAppointments::class)->name('admin.appointments');
//     // Halaman tambah
//     Route::get('admin/appointments/create', CreateAppointmentForm::class)->name('admin.appointments.create');
//     // Halaman ubah data
//     Route::get('admin/appointments/{appointment}/edit', UpdateAppointmentForm::class)->name('admin.appointment.edit');
// });