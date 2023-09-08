<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScholarController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'adminDashboard'])->name('admin.dashboard');
    Route::get('/admin/logout', [AdminController::class, 'adminLogout'])->name('admin.logout');
    Route::get('/admin/profile', [AdminController::class, 'adminProfile'])->name('admin.profile');
    Route::post('/admin/profile/store', [AdminController::class, 'adminProfileStore'])->name('admin.profile.store');
    Route::get('/admin/change/password', [AdminController::class, 'adminChangePassword'])->name('admin.change.password');
    Route::post('/admin/update/password', [AdminController::class, 'adminUpdatePassword'])->name('admin.update.password');
    Route::get('/admin/scholars_profile', [AdminController::class, 'scholarsProfile'])->name('admin.scholars');
    Route::get('admin/scholars_profile/{spas_id}', [ScholarController::class, 'viewSchoPage'])->name('admin.scholar.view');
    Route::get('scholars/export', [ScholarController::class, 'export'])->name('scholars.export');
    Route::post('scholars/import', [ScholarController::class, 'import'])->name('scholars.import');
    Route::get('scholars/delete/all', [ScholarController::class, 'deleteAll'])->name('scholars.delete.all');
    Route::get('admin/scholars/edit', [ScholarController::class, 'editSchoPage'])->name('admin.scholar.edit');
    Route::get('admin/scholars/delete', [ScholarController::class, 'editSchoPage'])->name('admin.scholar.delete');

}); //End Group Admin Middleware

Route::middleware(['auth', 'role:agent'])->group(function () {
    Route::get('/agent/dashboard', [AgentController::class, 'agentDashboard'])->name('agent.dashboard');
}); //End Group Agent Middleware

Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login');