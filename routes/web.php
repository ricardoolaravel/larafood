<?php

use App\Http\Controllers\Admin\DetailPlanController;

Route::prefix('admin')
    ->namespace('Admin')
    ->group(function(){


    /**
     * Rota para detalhes do plano
     */

    Route::put('plans/{url}/details/{id}/', 'DetailPlanController@update')->name('details.plan.update');
    Route::get('plans/{url}/details/{id}/edit', 'DetailPlanController@edit')->name('details.plan.edit');
    Route::post('plans/{url}/details/create', 'DetailPlanController@store')->name('details.plan.store');
    Route::get('plans/{url}/details/create', 'DetailPlanController@create')->name('details.plan.create');
    Route::get('plans/{url}/details', 'DetailPlanController@index')->name('details.plan.index');



    /**
     * Rota para planos
     */
    
    Route::put('plans/{url}', 'PlanController@update')->name('plans.update');
    Route::get('plans/{url}/edit', 'PlanController@edit')->name('plans.edit');
    Route::any('plans/search', 'PlanController@search')->name('plans.search');
    Route::get('plans', 'PlanController@index')->name('plans.index');
    Route::get('plans/create', 'PlanController@create')->name('plans.create');
    Route::delete('plans/{url}', 'PlanController@destroy')->name('plans.destroy');
    Route::get('plans/{url}', 'PlanController@show')->name('plans.show');
    Route::post('plans', 'PlanController@store')->name('plans.store');

    /**
     * Rota Dahboard
     */

    Route::get('/', 'PlanController@index')->name('admin.index');
});










Route::get('/', function () {
    return view('welcome');
});
