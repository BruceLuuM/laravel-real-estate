<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\EditorController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\InvesterController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminManageNewsController;
use App\Http\Controllers\Admin\AdminManageUsersController;
use App\Http\Controllers\Admin\AdminManageProjectsController;
use App\Http\Controllers\Admin\AdminManageInvestersController;
use App\Http\Controllers\Admin\AdminManageCategoriesController;

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

/*
    Common resource types:
    + index - show all listing
    + show - show single listing
    + create - show form to create a new listing
    + store - store new listing
    + edit - show form to edit listing
    + update - update existing listing
    + destroy - delete existing listing
*/

// All news ~~ website index page
Route::get('/', [NewsController::class, 'index']);


// Show register/create form
Route::get('/register', [UsersController::class, 'create'])->middleware('guest')->name('register');

// Create New user ~~ register new user
Route::post('/users', [UsersController::class, 'store'])->name('storeUser');

// Show login form
Route::get('/login', [UsersController::class, 'login'])->middleware('guest')->name('login');

//Login user
Route::post('/users/authenticate', [UsersController::class, 'authenticate'])->name('authenticate');
// User news Management
Route::prefix('user')->middleware(['auth', 'user-access:user'])->group(function () {
    Route::prefix('/news')->group(function () {
        // Show create form
        Route::get('/create', [NewsController::class, 'create'])->name('userCreateNews');

        // Store new data
        Route::post('/', [NewsController::class, 'store'])->name('userStoreNews');

        // Store edit form
        Route::get('/{new}/edit', [NewsController::class, 'edit'])->name('userEditNews');

        // Update news
        Route::put('/{new}', [NewsController::class, 'update'])->name('userUpdateNews');

        // Destroy news
        Route::delete('/{new}', [NewsController::class, 'destroy'])->name('userDestroyNews');

        // Manage news
        Route::get('/manage', [NewsController::class, 'manage'])->name('userManageNews');
    });

    // Log user out
    Route::post('/logout', [UsersController::class, 'logout'])->name('userLogout');
});

// single new
Route::get('/tin-tuc-{new:slug}', [NewsController::class, 'show'])->name('showNew');

// INVESTER

// All invester 
Route::get('/invester', [InvesterController::class, 'index']);

// single invester
Route::get('/chu-dau-tu-{invester:slug}', [InvesterController::class, 'show'])->name('showInvester');

// PROJECT

// All project
Route::get('/project', [ProjectController::class, 'index']);

// single project
Route::get('/du-an-{project:slug}', [ProjectController::class, 'show'])->name('showProject');

// CATEGORY

// single category
Route::get('/category/{category:slug}', [CategoryController::class, 'show'])->name('showCategory');

// ----------------------------------ADMIN----------------------------------

/*
    Common resource types:
    + index - show all items
    + show - show single items

    + create - show form to create a new items
    + store - store new items

    + edit - show form to edit items
    + update - update existing items

    + destroy - delete existing items
*/

Route::prefix('admin')->middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('adminPage');
    Route::post('/logout', [AdminController::class, 'logout'])->name('adminLogout');

    // manage users
    Route::prefix('/manage_users')->group(function () {
        // index page
        Route::get('/', [AdminManageUsersController::class, 'index'])->name('adminManageUsers');

        // show create form -- already exists with index page --

        // Store user data
        Route::post('/', [AdminManageUsersController::class, 'store'])->name('adminStoreUser');

        // show edit form -- already exists with index page --
        // Update user
        Route::put('/{user}', [AdminManageUsersController::class, 'update'])->name('adminUpdateUser');

        // Destroy user
        Route::delete('/{user}', [AdminManageUsersController::class, 'destroy'])->name('adminDeleteUser');
    });

    // manage categories
    Route::prefix('/manage_categories')->group(function () {
        //index page
        Route::get('/', [AdminManageCategoriesController::class, 'index'])->name('adminManageCategories');

        // show create form -- already exists with index page --
        // Store categories data
        Route::post('/', [AdminManageCategoriesController::class, 'store'])->name('adminStoreCategory');

        // show edit form -- already exists with index page --
        // Update categories
        Route::put('/{category}', [AdminManageCategoriesController::class, 'update'])->name('adminUpdateCategory');

        // Destroy categories
        Route::delete('/{category}', [AdminManageCategoriesController::class, 'destroy'])->name('adminDeleteCategory');
    });

    // manage investers
    Route::prefix('/manage_investers')->group(function () {
        //index page
        Route::get('/', [AdminManageInvestersController::class, 'index'])->name('adminManageInvesters');
        // show create form
        Route::get('/create', [AdminManageInvestersController::class, 'create'])->name('adminCreateInvester');
        // Store investers data
        Route::post('/', [AdminManageInvestersController::class, 'store'])->name('adminStoreInvester');
        // show edit form
        Route::get('/{invester}/edit', [AdminManageInvestersController::class, 'edit'])->name('adminEditInvester');
        // Update investers
        Route::put('/{invester}', [AdminManageInvestersController::class, 'update'])->name('adminUpdateInvester');
        // Destroy new
        Route::delete('/{invester}', [AdminManageInvestersController::class, 'destroy'])->name('adminDeleteInvester');
    });

    // manage news
    Route::prefix('/manage_news')->group(function () {
        //index page
        Route::get('/', [AdminManageNewsController::class, 'index'])->name('adminManageNews');
        // show create form
        Route::get('/create', [AdminManageNewsController::class, 'create'])->name('adminCreateNew');
        // Store new data
        Route::post('/', [AdminManageNewsController::class, 'store'])->name('adminStoreNew');
        // show edit form
        Route::get('/{new}/edit', [AdminManageNewsController::class, 'edit'])->name('adminEditNew');
        // Update new
        Route::put('/{new}', [AdminManageNewsController::class, 'update'])->name('adminUpdateNew');
        // Destroy new
        Route::delete('/{new}', [AdminManageNewsController::class, 'destroy'])->name('adminDeleteNew');
    });


    // manage projects
    Route::prefix('/manage_projects')->group(function () {
        //index page
        Route::get('/', [AdminManageProjectsController::class, 'index'])->name('adminManageProjects');
        // show create form
        Route::get('/create', [AdminManageProjectsController::class, 'create'])->name('adminCreateProject');
        // Store new data
        Route::post('/', [AdminManageProjectsController::class, 'store'])->name('adminStoreProject');
        // show edit form
        Route::get('/{project}/edit', [AdminManageProjectsController::class, 'edit'])->name('adminEditProject');
        // Update new
        Route::put('/{project}', [AdminManageProjectsController::class, 'update'])->name('adminUpdateProject');
        // Destroy new
        Route::delete('/{project}', [AdminManageProjectsController::class, 'destroy'])->name('adminDeleteProject');
    });
});

// ----------------------------------CK editor upload----------------------------------
Route::post('/uploadAdmin', [EditorController::class, 'uploadImageAdmin'])->name('ckeditor.upload.admin');
Route::post('/uploadUser', [EditorController::class, 'uploadImageUser'])->name('ckeditor.upload.user');
