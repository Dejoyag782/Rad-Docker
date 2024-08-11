<?php

// Controllers
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\DashController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PortfolioController;

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard.dash.index');
    })->name('dashboard');

    Route::get('/dashboard', [DashController::class, 'index'])->name('dashboard');

    Route::get('/services', [ServiceController::class, 'index'])->name('services');    
    Route::get('/get-service', [ServiceController::class, 'getServiceData'])->name('getServiceData');
    Route::post('/service/store-or-update', [ServiceController::class, 'storeOrUpdate'])->name('service.storeOrUpdate');   
    Route::delete('/destroy-service/{serviceId}', [ServiceController::class, 'destroyService'])->name('service.destroy');
    Route::get('/service/{id}', [ServiceController::class, 'showService']);  
    
    Route::get('/portfolio', [PortfolioController::class, 'index'])->name('portfolio');    
    // Route::post('/project/store', [PortfolioController::class, 'store'])->name('project.store');    
    Route::post('/project/store-or-update', [PortfolioController::class, 'storeOrUpdate'])->name('project.storeOrUpdate'); 
    Route::get('/getProjectsByService/{service_id}', [PortfolioController::class, 'getProjectsByService']);
    Route::post('/delete-project', [PortfolioController::class, 'deleteProject'])->name('deleteProject');        
    Route::get('/project/{id}', [PortfolioController::class, 'showProject'])->name('project.show');


    Route::get('/history', [HistoryController::class, 'index'])->name('history');
    Route::get('/get-history', [HistoryController::class, 'getHistoryData'])->name('getHistoryData');
    Route::post('/timeline/store-or-update', [HistoryController::class, 'storeOrUpdate'])->name('timeline.storeOrUpdate');   
    Route::delete('/destroy-history/{historyId}', [HistoryController::class, 'destroyHistory'])->name('history.destroy');
    Route::get('/history/{id}', [HistoryController::class, 'showHistory']);    

    Route::get('/team', [TeamController::class, 'index'])->name('team');
    Route::post('/team/store', [TeamController::class, 'store'])->name('team.store');
    Route::post('/get-team', [TeamController::class, 'getTeam'])->name('getTeamMember');    
    Route::post('/delete-member', [TeamController::class, 'deleteMember'])->name('deleteTeamMember');
    Route::get('/team/{id}', [TeamController::class, 'showMember'])->name('team.show');
    Route::post('/team/update/{id}', [TeamController::class, 'updateMember'])->name('team.update');

    // Messages Route
    Route::get('/messages', [MessageController::class, 'index'])->name('messages');
    Route::post('/get-messages', [MessageController::class, 'getMessages'])->name('getMessages');    
    Route::post('/get-archived-messages', [MessageController::class, 'getArchivedMessages'])->name('getArchivedMessages');
    Route::post('/archive-message', [MessageController::class, 'archiveMessage'])->name('archiveMessage');    
    Route::post('/delete-message', [MessageController::class, 'deleteMessage'])->name('deleteMessage');
    Route::get('/messages/{id}', [MessageController::class, 'showMessage']);

});

// Routes that only admins can access
Route::middleware(['auth','isAdmin'])->group(function () {
    // Users Route 
    Route::get('/users', [UserController::class, 'index'])->name('users');
    Route::post('/users/store', [UserController::class, 'store'])->name('users.store');
    Route::post('/get-users', [UserController::class, 'getUsers'])->name('getUsers');    
    Route::post('/delete-user', [UserController::class, 'deleteUser'])->name('deleteUser');
    Route::get('/users/{id}', [UserController::class, 'showUser'])->name('users.show');
    Route::post('/users/update/{id}', [UserController::class, 'updateUser'])->name('users.update');
});


    Route::get('/', [WelcomeController::class, 'index'])->name('welcome');    
    Route::get('/display-history', [WelcomeController::class, 'displayHistoryData'])->name('displayHistoryData');
    Route::get('/display-team', [WelcomeController::class, 'displayTeamData'])->name('displayTeamData');    
    Route::get('/display-service', [WelcomeController::class, 'displayServiceData'])->name('displayServiceData');
    Route::get('/displayProjectsByService/{service_id}', [WelcomeController::class, 'displayProjectsByService']);
    Route::post('/message/store', [WelcomeController::class, 'store'])->name('message.store');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
