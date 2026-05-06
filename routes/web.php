<?php

use App\Enums\PermissionEnum;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProjectController;
use App\RoleEnum;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth',  'verified'])->name('dashboard');

// Muutetun etusivun koodi
Route::get('/dashboard', function () {
    $tasks = \App\Models\Task::with(['user', 'client', 'project'])
                              ->orderBy('deadline_at', 'asc')
                              ->limit(5)
                              ->get();
    $projects = \App\Models\Project::with(['user', 'client'])
                                   ->orderBy('deadline_at', 'asc')
                                   ->limit(5)
                                   ->get();
    $stats = [
        'total_tasks' => \App\Models\Task::count(),
        'open_tasks' => \App\Models\Task::where('status', 'open')->count(),
        'in_progress_tasks' => \App\Models\Task::where('status', 'in progress')->count(),
        'total_projects' => \App\Models\Project::count(),
        'total_clients' => \App\Models\Client::count(),
        'total_users' => \App\Models\User::count(),
    ];

    return view('dashboard', compact('tasks', 'stats', 'projects'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('users', UserController::class);
    
    // Codeblock entering Users-page for user-role on production
    // Route::resource('users', UserController::class)
    // ->middleware('can:' . PermissionEnum::MANAGE_USERS->value);

    Route::resource('clients', ClientController::class);
    Route::resource('projects', ProjectController::class);
    Route::resource('tasks', TaskController::class);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
