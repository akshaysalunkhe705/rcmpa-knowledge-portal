<?php

use Illuminate\Support\Facades\Route;
use APP\Http\Controllers\RoleController;
use App\Models\RoleModel;

Route::get('/', function () {
    return view('welcome');
});

