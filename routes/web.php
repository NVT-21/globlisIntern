<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
//Contry
Route::resource('countries', CountryController::class);
//User
Route::resource('users', UserController::class);
//Person
Route::resource('people', PersonController::class);
Route::get('People/info-people/{idCompany}', [PersonController::class,'infoPeople'])->name('people.info_people');
//Company
Route::resource('companies', CompanyController::class);
Route::post('companies/{idCompany}/add-person/{personId}', [CompanyController::class,'addPeople'])->name('companies.add_people');
Route::get('companies/people/{idCompany}', [CompanyController::class ,'getPeople'])->name('companies.get_people');
//Role
Route::resource('roles', RoleController::class);
Route::get('roles/asign-role/{userId}', [RoleController::class, 'viewSelect'])->name('roles.view_select');
Route::post('roles/asign-role/{userId}', [RoleController::class, 'assignRole'])->name('roles.assign_role');
//Department
Route::get('departments/create/{companyId}', [DepartmentController::class,'create'])->name('departments.create');
Route::post('departments/create/{companyId}', [DepartmentController::class, 'store'])->name('departments.store');
Route::get('departments/{deparmentId}', [DepartmentController::class, 'edit'])->name('departments.edit');
Route::put('departments/{departmentId}', [DepartmentController::class, 'update'])->name('departments.update');
Route::delete('companies/{company}/departments/{department}', [DepartmentController::class, 'destroy'])->name('departments.destroy');
//Project 
Route::get('projects/create', [ProjectController::class, 'create'])->name('projects.create');
Route::get('projects', [ProjectController::class ,'index'])->name('projects.index');
Route::post('projects', [ProjectController::class, 'store'])->name('projects.store');
Route::get('projects/{projectId}', [ProjectController::class, 'edit'])->name('projects.edit');
Route::put('projects/{projectId}', [ProjectController::class, 'update'])->name('projects.update');
Route::get('projects/{projectId}/getPeople', [ProjectController::class, 'getPeople'])->name('projects.get_people');
//Task
Route::get('tasks/filter', [TaskController::class, 'filter'])->name('tasks.filter');
Route::get('/tasks/export', [TaskController::class, 'export'])->name('tasks.export');
Route::resource('tasks', TaskController::class);




