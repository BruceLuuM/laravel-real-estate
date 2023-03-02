<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\EditorController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\InvesterController;
use App\Http\Controllers\LiveSearchController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ModuleController;
use App\Http\Controllers\Admin\ModuleFunctionController;
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

//searchtest
// Route::get('/', [LiveSearchController::class, 'index']);
// Route::get('/search_news', [LiveSearchController::class, 'search_news'])->name('search_news');
// Route::get('/search_districts', [LiveSearchController::class, 'search_districts'])->name('search_districts');
// Route::get('/search_wards', [LiveSearchController::class, 'search_wards'])->name('search_wards');


// All news ~~ website index page
Route::get('/', [NewsController::class, 'index']);


// Show register/create form
Route::get('/register', [UsersController::class, 'create'])->middleware('guest')->name('register');

// Create New user ~~ register new user
Route::post('/users', [UsersController::class, 'store'])->name('storeUser');

// Show login form
Route::get('/login', [UsersController::class, 'login'])->middleware('guest')->name('login');
// admin login
// Route::get('/admin_login', [AdminController::class, 'adminlogin'])->middleware('auth:admin')->name('adminlogin');

//Login user
Route::post('/users/authenticate', [UsersController::class, 'authenticate'])->name('authenticate');

// User news Management
// Route::prefix('user')->middleware(['auth', 'user-access:user||VIP'])->group(function () {
Route::prefix('user')->middleware(['auth'])->group(function () {
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

// ----------------------------------old Admin ----------------------------------
// Route::prefix('admin')->middleware(['auth', 'user-access:admin'])->group(function () {
// Route::prefix('VIP_mem')->middleware(['auth', 'user-access:VIP'])->group(function () {
//     Route::get('/', [AdminController::class, 'index_new'])->name('adminPage');
//     // Route::get('/', [AdminController::class, 'index'])->name('adminPage');
//     Route::post('/logout', [AdminController::class, 'logout'])->name('adminLogout');

//     // manage users
//     Route::prefix('/manage_users')->group(function () {
//         // index page
//         Route::get('/', [AdminManageUsersController::class, 'index'])->name('adminManageUser');

//         // show create form -- already exists with index page --

//         // Store user data
//         Route::post('/', [AdminManageUsersController::class, 'store'])->name('adminStoreUser');

//         // show edit form -- already exists with index page --
//         // Update user
//         Route::put('/{user}', [AdminManageUsersController::class, 'update'])->name('adminUpdateUser');

//         // Destroy user
//         Route::delete('/{user}', [AdminManageUsersController::class, 'destroy'])->name('adminDeleteUser');
//     });

//     // manage categories
//     Route::prefix('/manage_categories')->group(function () {
//         //index page
//         Route::get('/', [AdminManageCategoriesController::class, 'index'])->name('adminManageCategory');

//         // show create form -- already exists with index page --
//         // Store categories data
//         Route::post('/', [AdminManageCategoriesController::class, 'store'])->name('adminStoreCategory');

//         // show edit form -- already exists with index page --
//         // Update categories
//         Route::put('/{category}', [AdminManageCategoriesController::class, 'update'])->name('adminUpdateCategory');

//         // Destroy categories
//         Route::delete('/{category}', [AdminManageCategoriesController::class, 'destroy'])->name('adminDeleteCategory');
//     });

//     // manage investers
//     Route::prefix('/manage_investers')->group(function () {
//         //index page
//         Route::get('/', [AdminManageInvestersController::class, 'index'])->name('adminManageInvester');
//         // show create form
//         Route::get('/create', [AdminManageInvestersController::class, 'create'])->name('adminCreateInvester');
//         // Store investers data
//         Route::post('/', [AdminManageInvestersController::class, 'store'])->name('adminStoreInvester');
//         // show edit form
//         Route::get('/{invester}/edit', [AdminManageInvestersController::class, 'edit'])->name('adminEditInvester');
//         // Update investers
//         Route::put('/{invester}', [AdminManageInvestersController::class, 'update'])->name('adminUpdateInvester');
//         // Destroy new
//         Route::delete('/{invester}', [AdminManageInvestersController::class, 'destroy'])->name('adminDeleteInvester');
//     });

//     // manage news
//     Route::prefix('/manage_news')->group(function () {
//         //index page
//         Route::get('/', [AdminManageNewsController::class, 'index'])->name('adminManageNew');
//         // show create form
//         Route::get('/create', [AdminManageNewsController::class, 'create'])->name('adminCreateNew');
//         // Store new data
//         Route::post('/', [AdminManageNewsController::class, 'store'])->name('adminStoreNew');
//         // show edit form
//         Route::get('/{new}/edit', [AdminManageNewsController::class, 'edit'])->name('adminEditNew');
//         // Update new
//         Route::put('/{new}', [AdminManageNewsController::class, 'update'])->name('adminUpdateNew');
//         // Destroy new
//         Route::delete('/{new}', [AdminManageNewsController::class, 'destroy'])->name('adminDeleteNew');
//     });


//     // manage projects
//     Route::prefix('/manage_projects')->group(function () {
//         //index page
//         Route::get('/', [AdminManageProjectsController::class, 'index'])->name('adminManageProject');
//         // show create form
//         Route::get('/create', [AdminManageProjectsController::class, 'create'])->name('adminCreateProject');
//         // Store new data
//         Route::post('/', [AdminManageProjectsController::class, 'store'])->name('adminStoreProject');
//         // show edit form
//         Route::get('/{project}/edit', [AdminManageProjectsController::class, 'edit'])->name('adminEditProject');
//         // Update new
//         Route::put('/{project}', [AdminManageProjectsController::class, 'update'])->name('adminUpdateProject');
//         // Destroy new
//         Route::delete('/{project}', [AdminManageProjectsController::class, 'destroy'])->name('adminDeleteProject');
//     });
// });

// ----------------------------------CK editor upload----------------------------------
Route::post('/uploadAdmin', [EditorController::class, 'uploadImageAdmin'])->name('ckeditor.upload.admin');
Route::post('/uploadUser', [EditorController::class, 'uploadImageUser'])->name('ckeditor.upload.user');

// ----------------------------------AJAX Live search----------------------------------
Route::get('/search_news', [LiveSearchController::class, 'search_news'])->name('search_news');
Route::get('/search_districts', [LiveSearchController::class, 'search_districts'])->name('search_districts');
Route::get('/search_wards', [LiveSearchController::class, 'search_wards'])->name('search_wards');

Route::get('/phonenumber_check', [LiveSearchController::class, 'phonenumber_check'])->name('phonenumber_check');


// ----------------------------------Test Admin LTE----------------------------------

Route::prefix('VIP_mem')->middleware(['auth', 'user-access:VIP'])->group(function () {

    // Route::get('/', [AdminController::class, 'index_LTE'])->name('adminPage');
    // // Route::get('/', [AdminController::class, 'index'])->name('adminPage');
    // Route::post('/logout', [AdminController::class, 'logout'])->name('adminLogout');

    // // manage admins ~ not done
    // Route::prefix('/manage_admins')->group(function () {
    //     // index page
    //     Route::get('/', [AdminManageAdminsController::class, 'index_LTE'])->name('adminManageAdmin');
    //     // show create form 
    //     Route::get('/create', [AdminManageAdminsController::class, 'create'])->name('adminCreateAdmin');
    //     // Store user data
    //     Route::post('/', [AdminManageAdminsController::class, 'store'])->name('adminStoreAdmin');
    //     // show edit form
    //     Route::get('/{admin}/edit', [AdminManageAdminsController::class, 'edit'])->name('adminEditAdmin');
    //     // Update user
    //     Route::put('/{admin}', [AdminManageAdminsController::class, 'update'])->name('adminUpdateAdmin');
    //     // Destroy user
    //     Route::delete('/{admin}', [AdminManageAdminsController::class, 'destroy'])->name('adminDeleteAdmin');
    //     // Show user
    //     Route::get('/show/{admin}', [AdminManageAdminsController::class, 'show'])->name('adminShowAdmin');
    // });

    // // manage users ~ done
    // Route::prefix('/manage_users')->group(function () {
    //     // index page
    //     Route::get('/', [AdminManageUsersController::class, 'index_LTE'])->name('adminManageUser');
    //     // show create form 
    //     Route::get('/create', [AdminManageUsersController::class, 'create'])->name('adminCreateUser');
    //     // Store user data
    //     Route::post('/', [AdminManageUsersController::class, 'store'])->name('adminStoreUser');
    //     // show edit form
    //     Route::get('/{user}/edit', [AdminManageUsersController::class, 'edit'])->name('adminEditUser');
    //     // Update user
    //     Route::put('/{user}', [AdminManageUsersController::class, 'update'])->name('adminUpdateUser');
    //     // Destroy user
    //     Route::delete('/{user}', [AdminManageUsersController::class, 'destroy'])->name('adminDeleteUser');
    //     // Show user
    //     Route::get('/show/{user}', [AdminManageUsersController::class, 'show'])->name('adminShowUser');
    // });

    // // manage categories ~ done
    // Route::prefix('/manage_categories')->group(function () {
    //     //index page
    //     Route::get('/', [AdminManageCategoriesController::class, 'index_LTE'])->name('adminManageCategory');
    //     // show create form
    //     Route::get('/create', [AdminManageCategoriesController::class, 'create'])->name('adminCreateCategory');
    //     // Store category data
    //     Route::post('/', [AdminManageCategoriesController::class, 'store'])->name('adminStoreCategory');
    //     // show edit form
    //     Route::get('/{category}/edit', [AdminManageCategoriesController::class, 'edit'])->name('adminEditCategory');
    //     // Update category
    //     Route::put('/{category}', [AdminManageCategoriesController::class, 'update'])->name('adminUpdateCategory');
    //     // Destroy category
    //     Route::delete('/{category}', [AdminManageCategoriesController::class, 'destroy'])->name('adminDeleteCategory');
    //     // Show category
    //     Route::get('/show/{category}', [AdminManageCategoriesController::class, 'show'])->name('adminShowCategory');
    // });

    // // manage investers ~ not done
    // Route::prefix('/manage_investers')->group(function () {
    //     //index page
    //     Route::get('/', [AdminManageInvestersController::class, 'index_LTE'])->name('adminManageInvester');
    //     // show create form
    //     Route::get('/create', [AdminManageInvestersController::class, 'create'])->name('adminCreateInvester');
    //     // Store invester data
    //     Route::post('/', [AdminManageInvestersController::class, 'store'])->name('adminStoreInvester');
    //     // show edit form
    //     Route::get('/{invester}/edit', [AdminManageInvestersController::class, 'edit'])->name('adminEditInvester');
    //     // Update invester
    //     Route::put('/{invester}', [AdminManageInvestersController::class, 'update'])->name('adminUpdateInvester');
    //     // Destroy invester
    //     Route::delete('/{invester}', [AdminManageInvestersController::class, 'destroy'])->name('adminDeleteInvester');
    //     // Show invester
    //     Route::get('/show/{invester}', [AdminManageInvestersController::class, 'show'])->name('adminShowInvester');
    // });

    // // manage news ~ not done
    // Route::prefix('/manage_news')->group(function () {
    //     //index page
    //     Route::get('/', [AdminManageNewsController::class, 'index'])->name('adminManageNew');
    //     // show create form
    //     Route::get('/create', [AdminManageNewsController::class, 'create'])->name('adminCreateNew');
    //     // Store new data
    //     Route::post('/', [AdminManageNewsController::class, 'store'])->name('adminStoreNew');
    //     // show edit form
    //     Route::get('/{new}/edit', [AdminManageNewsController::class, 'edit'])->name('adminEditNew');
    //     // Update new
    //     Route::put('/{new}', [AdminManageNewsController::class, 'update'])->name('adminUpdateNew');
    //     // Destroy new
    //     Route::delete('/{new}', [AdminManageNewsController::class, 'destroy'])->name('adminDeleteNew');
    // });

    // // manage projects ~ not done
    // Route::prefix('/manage_projects')->group(function () {
    //     //index page
    //     Route::get('/', [AdminManageProjectsController::class, 'index'])->name('adminManageProject');
    //     // show create form
    //     Route::get('/create', [AdminManageProjectsController::class, 'create'])->name('adminCreateProject');
    //     // Store new data
    //     Route::post('/', [AdminManageProjectsController::class, 'store'])->name('adminStoreProject');
    //     // show edit form
    //     Route::get('/{project}/edit', [AdminManageProjectsController::class, 'edit'])->name('adminEditProject');
    //     // Update new
    //     Route::put('/{project}', [AdminManageProjectsController::class, 'update'])->name('adminUpdateProject');
    //     // Destroy new
    //     Route::delete('/{project}', [AdminManageProjectsController::class, 'destroy'])->name('adminDeleteProject');
    // });

    // // manage modules ~ not done    
    // Route::prefix('/modules')->group(function () {
    //     //index page
    //     Route::get('/', [ModuleController::class, 'index'])->name('adminManageModule');
    //     // show create form
    //     Route::get('/create', [ModuleController::class, 'create'])->name('adminCreateModule');
    //     // Store modules data
    //     Route::post('/', [ModuleController::class, 'store'])->name('adminStoreModule');
    //     // show edit form
    //     Route::get('/{module}/edit', [ModuleController::class, 'edit'])->name('adminEditModule');
    //     // Update modules
    //     Route::put('/{module}', [ModuleController::class, 'update'])->name('adminUpdateModule');
    //     // Destroy modules
    //     Route::delete('/{module}', [ModuleController::class, 'destroy'])->name('adminDeleteModule');
    //     // Show modules
    //     Route::get('/show/{module}', [ModuleController::class, 'show'])->name('adminShowModule');
    // });

    // // manage modulesFunction ~ not done    
    // Route::prefix('/modules_function')->group(function () {
    //     //index page
    //     Route::get('/', [ModuleFunctionController::class, 'index'])->name('adminManageModuleFunction');
    //     // show create form
    //     Route::get('/create', [ModuleFunctionController::class, 'create'])->name('adminCreateModuleFunction');
    //     // Store modules data
    //     Route::post('/', [ModuleFunctionController::class, 'store'])->name('adminStoreModuleFunction');
    //     // show edit form
    //     Route::get('/{modulefunction}/edit', [ModuleFunctionController::class, 'edit'])->name('adminEditModuleFunction');
    //     // Update modules
    //     Route::put('/{modulefunction}', [ModuleFunctionController::class, 'update'])->name('adminUpdateModuleFuncion');
    //     // Destroy modules
    //     Route::delete('/{modulefunction}', [ModuleFunctionController::class, 'destroy'])->name('adminDeleteModuleFunction');
    //     // Show modules
    //     Route::get('/show/{modulefunction}', [ModuleFunctionController::class, 'show'])->name('adminShowModuleFunction');
    // });

    // // manage permisson ~ not done    
    // Route::prefix('/manage_permission')->group(function () {
    //     // //index page
    //     // Route::get('/', [Per::class, 'index'])->name('adminManageModule');
    //     // // show create form
    //     // Route::get('/create', [ModuleController::class, 'create'])->name('adminCreateModule');
    //     // // Store modules data
    //     // Route::post('/', [ModuleController::class, 'store'])->name('adminStoreModule');
    //     // // show edit form
    //     // Route::get('/{module}/edit', [ModuleController::class, 'edit'])->name('adminEditModule');
    //     // // Update modules
    //     // Route::put('/{module}', [ModuleController::class, 'update'])->name('adminUpdateModule');
    //     // // Destroy modules
    //     // Route::delete('/{module}', [ModuleController::class, 'destroy'])->name('adminDeleteModule');
    //     // // Show modules
    //     // Route::get('/show/{module}', [ModuleController::class, 'show'])->name('adminShowModule');
    // });
});
