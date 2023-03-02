<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ModuleController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\ModuleFunctionController;
use App\Http\Controllers\Admin\AdminManageNewsController;
use App\Http\Controllers\Admin\AdminManageUsersController;
use App\Http\Controllers\Admin\AdminManageAdminsController;
use App\Http\Controllers\Admin\AdminManageProjectsController;
use App\Http\Controllers\Admin\AdminManageInvestersController;
use App\Http\Controllers\Admin\AdminManageCategoriesController;

Route::get('/admin_login', [AdminController::class, 'adminlogin'])->name('adminlogin');
Route::post('/authenticate', [AdminController::class, 'authenticate'])->name('adminauthenticate');

// ----------------------------------Test Admin LTE----------------------------------

Route::middleware('auth:admin')->group(function () {
    Route::get('/', [AdminController::class, 'index_LTE'])->name('adminPage');
    // Route::get('/', [AdminController::class, 'index'])->name('adminPage');
    Route::post('/logout', [AdminController::class, 'logout'])->name('adminLogout');

    // manage admins ~ not done
    Route::prefix('/manage_admins')->group(function () {
        // index page
        Route::get('/', [AdminManageAdminsController::class, 'index_LTE'])->name('adminManageAdmin');
        // show create form 
        Route::get('/create', [AdminManageAdminsController::class, 'create'])->name('adminCreateAdmin');
        // Store admin data
        Route::post('/', [AdminManageAdminsController::class, 'store'])->name('adminStoreAdmin');
        // show edit form
        Route::get('/{admin}/edit', [AdminManageAdminsController::class, 'edit'])->name('adminEditAdmin');
        // Update admin
        Route::put('/{admin}', [AdminManageAdminsController::class, 'update'])->name('adminUpdateAdmin');
        // Destroy admin
        Route::delete('/{admin}', [AdminManageAdminsController::class, 'destroy'])->name('adminDeleteAdmin');
        // Show admin
        Route::get('/show/{admin}', [AdminManageAdminsController::class, 'show'])->name('adminShowAdmin');
    });

    // manage users ~ done
    Route::prefix('/manage_users')->group(function () {
        // index page
        Route::get('/', [AdminManageUsersController::class, 'index_LTE'])->name('adminManageUser');
        // show create form 
        Route::get('/create', [AdminManageUsersController::class, 'create'])->name('adminCreateUser');
        // Store user data
        Route::post('/', [AdminManageUsersController::class, 'store'])->name('adminStoreUser');
        // show edit form
        Route::get('/{user}/edit', [AdminManageUsersController::class, 'edit'])->name('adminEditUser');
        // Update user
        Route::put('/{user}', [AdminManageUsersController::class, 'update'])->name('adminUpdateUser');
        // Destroy user
        Route::delete('/{user}', [AdminManageUsersController::class, 'destroy'])->name('adminDeleteUser');
        // Show user
        Route::get('/show/{user}', [AdminManageUsersController::class, 'show'])->name('adminShowUser');
    });

    // manage categories ~ done
    Route::prefix('/manage_categories')->group(function () {
        //index page
        Route::get('/', [AdminManageCategoriesController::class, 'index_LTE'])->name('adminManageCategory');
        // show create form
        Route::get('/create', [AdminManageCategoriesController::class, 'create'])->name('adminCreateCategory');
        // Store category data
        Route::post('/', [AdminManageCategoriesController::class, 'store'])->name('adminStoreCategory');
        // show edit form
        Route::get('/{category}/edit', [AdminManageCategoriesController::class, 'edit'])->name('adminEditCategory');
        // Update category
        Route::put('/{category}', [AdminManageCategoriesController::class, 'update'])->name('adminUpdateCategory');
        // Destroy category
        Route::delete('/{category}', [AdminManageCategoriesController::class, 'destroy'])->name('adminDeleteCategory');
        // Show category
        Route::get('/show/{category}', [AdminManageCategoriesController::class, 'show'])->name('adminShowCategory');
    });

    // manage investers ~ not done
    Route::prefix('/manage_investers')->group(function () {
        //index page
        Route::get('/', [AdminManageInvestersController::class, 'index_LTE'])->name('adminManageInvester');
        // show create form
        Route::get('/create', [AdminManageInvestersController::class, 'create'])->name('adminCreateInvester');
        // Store invester data
        Route::post('/', [AdminManageInvestersController::class, 'store'])->name('adminStoreInvester');
        // show edit form
        Route::get('/{invester}/edit', [AdminManageInvestersController::class, 'edit'])->name('adminEditInvester');
        // Update invester
        Route::put('/{invester}', [AdminManageInvestersController::class, 'update'])->name('adminUpdateInvester');
        // Destroy invester
        Route::delete('/{invester}', [AdminManageInvestersController::class, 'destroy'])->name('adminDeleteInvester');
        // Show invester
        Route::get('/show/{invester}', [AdminManageInvestersController::class, 'show'])->name('adminShowInvester');
    });

    // manage news ~ not done
    Route::prefix('/manage_news')->group(function () {
        //index page
        Route::get('/', [AdminManageNewsController::class, 'index'])->name('adminManageNew');
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

    // manage projects ~ not done
    Route::prefix('/manage_projects')->group(function () {
        //index page
        Route::get('/', [AdminManageProjectsController::class, 'index'])->name('adminManageProject');
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

    // manage modules ~ done    
    Route::prefix('/modules')->group(function () {
        //index page-done
        Route::get('/', [ModuleController::class, 'index'])->name('adminManageModule');
        // show create form-done
        Route::get('/create', [ModuleController::class, 'create'])->name('adminCreateModule');
        // Store modules data-done
        Route::post('/', [ModuleController::class, 'store'])->name('adminStoreModule');
        // show edit form-done
        Route::get('/{module}/edit', [ModuleController::class, 'edit'])->name('adminEditModule');
        // Update modules-done
        Route::put('/{module}', [ModuleController::class, 'update'])->name('adminUpdateModule');
        // Update modules position -done
        Route::put('/{module}/pos', [ModuleController::class, 'posupdate'])->name('adminUpdateModulePos');
        // Destroy modules
        Route::delete('/{module}', [ModuleController::class, 'destroy'])->name('adminDeleteModule');
        // // Show modules
        // Route::get('/show/{module}', [ModuleController::class, 'show'])->name('adminShowModule');
    });

    // manage modulesFunction ~ done    
    Route::prefix('/modules_function')->group(function () {
        // show create form
        Route::get('/create', [ModuleFunctionController::class, 'create'])->name('adminCreateModuleFunction');
        // Store modules function data
        Route::post('/', [ModuleFunctionController::class, 'store'])->name('adminStoreModuleFunction');
        // show edit form
        Route::get('/{modulefunction}/edit', [ModuleFunctionController::class, 'edit'])->name('adminEditModuleFunction');
        // Update modules function
        Route::put('/{modulefunction}', [ModuleFunctionController::class, 'update'])->name('adminUpdateModuleFunction');
        // Update modules function pos
        Route::put('/{modulefunction}/pos', [ModuleFunctionController::class, 'posupdate'])->name('adminUpdateModuleFunctionPos');
        // Destroy modules function
        Route::delete('/{modulefunction}', [ModuleFunctionController::class, 'destroy'])->name('adminDeleteModuleFunction');
    });

    // manage permisson ~ not done    
    Route::prefix('/manage_permissions')->group(function () {
        //index page
        Route::get('/', [PermissionController::class, 'index'])->name('adminManagePermission');
        // show create form
        Route::get('/create', [PermissionController::class, 'create'])->name('adminCreatePermission');
        // Store permission data
        Route::post('/', [PermissionController::class, 'store'])->name('adminStorePermission');
        // show edit form
        Route::get('/{permission}/edit', [PermissionController::class, 'edit'])->name('adminEditPermission');
        // Update permission
        Route::put('/{permission}', [PermissionController::class, 'update'])->name('adminUpdatePermission');
        // Destroy permission
        Route::delete('/{permission}', [PermissionController::class, 'destroy'])->name('adminDeletePermission');
        // Show permission
        Route::get('/show/{permission}', [PermissionController::class, 'show'])->name('adminShowPermission');
    });

    Route::prefix('/manage_role')->group(function () {
        // //index page
        // Route::get('/', [Per::class, 'index'])->name('adminManageModule');
        // // show create form
        // Route::get('/create', [ModuleController::class, 'create'])->name('adminCreateModule');
        // // Store modules data
        // Route::post('/', [ModuleController::class, 'store'])->name('adminStoreModule');
        // // show edit form
        // Route::get('/{module}/edit', [ModuleController::class, 'edit'])->name('adminEditModule');
        // // Update modules
        // Route::put('/{module}', [ModuleController::class, 'update'])->name('adminUpdateModule');
        // // Destroy modules
        // Route::delete('/{module}', [ModuleController::class, 'destroy'])->name('adminDeleteModule');
        // // Show modules
        // Route::get('/show/{module}', [ModuleController::class, 'show'])->name('adminShowModule');
    });
});
