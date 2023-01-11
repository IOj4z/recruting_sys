<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group([
    'middleware' => ['auth:api', 'scope:admin'],
    'prefix' => 'admin',
    'namespace' => 'Admin'
], function () {
    Route::apiResource('users', 'UserController');
    Route::apiResource('resumes', 'ResumeController');
    Route::apiResource('vacancies', 'VacancyController');

});

Route::group([
    'middleware' => ['auth:api', 'scope:employer'],
    'prefix' => 'employer',
    'namespace' => 'Employer'
], function () {
    Route::apiResource('resumes', 'ResumeController');
    Route::apiResource('vacancies', 'VacancyController');
});

Route::group([
    'middleware' => ['auth:api', 'scope:applicant'],
    'prefix' => 'applicant',
    'namespace' => 'Applicant'
], function () {
    Route::apiResource('resumes', 'ResumeController');
    Route::apiResource('vacancies', 'VacancyController');
});
