<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TasksController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GiftsController;
use Illuminate\Support\Facades\Route;

/*

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello_world', function () {
    return "</h1>Hello World<h1>";
});


Route::get('/hello/{id}', function ($id) {
    return "</h1>Hello World<h1>".$id;
});

Route::get('/hello', function () {
    return "</h1>Olá Turma SoftDev Porto<h1>";
})-> name("contacts.show");
*/

Route::fallback(function () {
    return "<h1>Sorry, the page you are looking for could not be found.</h1>
    <a href='".route('home')."'>Clica aqui para voltar à pagina inicial</a>";
});

//
Route::get('/', function () {
    return redirect()->route('home');
});

//Home
Route::get('/home', [HomeController::class, 'showHome'])-> name("home");

//USERS

//view
Route::get('/users',[UserController::class, 'showAllUsers'] )-> name("users.show");

//Add Form
Route::get('/users/addd', [UserController::class, 'showAddUserForm']) -> name("users.add");

//Add a specific user
Route::post('/create-user', [UserController::class, 'create'])->name('user.create');

//view all info in a new blade
Route::get('/users/{id}',[UserController::class, 'viewUser'] )-> name("users.view");

//remove
Route::get('/delete-user/{id}', [UserController::class, 'deleteUserFromDB'] )-> name("users.delete");

// Edit User Form
Route::get('/users/edit/{id}', [UserController::class, 'showEditUserForm'])->name('users.edit');

// Update User
Route::post('/users/update/{id}', [UserController::class, 'updateUser'])->name('users.update');


//GIFTS

//AddGift Form
Route::get('/gift-add', [GiftsController::class, 'showAddGiftForm'])->name('gifts.add');

//CreateGift
Route::post('/gifts-create', [GiftsController::class, 'createGift'])->name('gifts.create');

//Vizualizar
Route::get('/gifts', [GiftsController::class, 'showAllGifts'])-> name("gifts.show");

//view all info in a new blade
Route::get('/gifts/{id}',[GiftsController::class, 'viewGifts'] )-> name("gifts.view");

//remover
Route::get('/delete-gift/{id}', [GiftsController::class, 'deleteGiftFromDB'] )-> name("gifts.delete");

//editar gift
Route::get('/gifts/edit/{id}', [GiftsController::class, 'showEditGiftForm'])->name('gifts.edit');

//update gift
Route::post('/gifts/edit/{id}', [GiftsController::class, 'updateGift'])->name('gifts.update');


//TASKS

//view all info in a new balde
Route::get('/tasks/{id}',[TasksController::class, 'viewTasks'] )-> name("tasks.view");

//tasks
Route::get('/tasks', [TasksController::class, 'showAllTasks'])-> name("tasks.show");

//AddTask Form
Route::get('/tasks-add', [TasksController::class, 'showAddTaskForm'])->name('tasks.add');

//CreateTask
Route::post('/tasks-create', [TasksController::class, 'createTask'])->name('tasks.create');

//remover
Route::get('/delete-task/{id}', [TasksController::class, 'deleteTaskFromDB'] )-> name("tasks.delete");

// Edit Task Form
Route::get('/tasks/edit/{id}', [TasksController::class, 'showEditTaskForm'])->name('tasks.edit');

// Update Task
Route::put('/tasks/update/{id}', [TasksController::class, 'updateTask'])->name('tasks.update');








