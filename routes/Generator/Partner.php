<?php
/**
 * Partner
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'Partner'], function () {
        Route::resource('partners', 'PartnersController');
        //For Datatable
        Route::post('partners/get', 'PartnersTableController')->name('partners.get');
    });
    
});