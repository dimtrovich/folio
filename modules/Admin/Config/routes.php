<?php

use BlitzPHP\Facades\Route;
use BlitzPHP\Router\RouteBuilder;
use BlitzPHP\Schild\Controllers\LoginController;

Route::middleware('session')->prefix('admin')->namespace('\Folio\Admin\Controllers')->group(function (RouteBuilder $route) {
    $route->name('admin.logout')->get('logout', [LoginController::class, 'logoutAction']);
	
	$route->name('admin.dashboard')->get('/', 'Dashboard::index');
	
	$route->name('admin.competences')->presenter('competences');
	$route->name('admin.experiences')->presenter('experiences');
});
