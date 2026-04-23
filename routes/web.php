<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('admin.auth.login');
})->name('login');

Route::get('/dashboard', function () {
    return view('admin.dashboard.index');
})->name('dashboard');

Route::get('/students', function () {
    return view('admin.students.index');
})->name('stundets');

Route::get('/lecturers', function () {
    return view('admin.lecturers.index');
})->name('lecturers');

Route::get('/supervisor-quota', function () {
    return view('admin.supervisor-quota.index');
})->name('supervisor-quota');

Route::get('/ta-information', function () {
    return view('admin.ta-information.index');
})->name('ta-information');

Route::get('/manage-profile', function() {
    return view('admin.manage-profile.index');
});