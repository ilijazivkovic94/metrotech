<?php

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

Route::group(['namespace' => 'Api\V1', 'prefix' => 'v1', 'as' => 'v1.'], function () {
    Route::group(['prefix' => 'auth', 'middleware' => ['guest']], function () {
        Route::post('register', 'RegisterController@register');
        Route::post('login', 'AuthController@login');
        // Password Reset
        Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail');
    });

   
    // Route::group(['middleware' => ['auth:api']], function () {
        Route::group(['prefix' => 'auth'], function () {
            Route::post('logout', 'AuthController@logout');
            // Route::post('password/reset', 'ResetPasswordController@reset')->name('password.reset');
        });
        // Users
        Route::resource('users', 'UsersController', ['except' => ['create', 'edit']]);
        Route::post('users/delete-all', 'UsersController@deleteAll');
        //@todo need to change the route name and related changes
        Route::get('deactivated-users', 'DeactivatedUsersController@index');
        Route::get('deleted-users', 'DeletedUsersController@index');

        // Roles
        Route::resource('roles', 'RolesController', ['except' => ['create', 'edit']]);

        // Permission
        Route::resource('permissions', 'PermissionController', ['except' => ['create', 'edit']]);

        // Page
        Route::resource('pages', 'PagesController', ['except' => ['create', 'edit']]);
        Route::get('homepages', 'PagesController@get_home');
		
		 

        // Faqs
        Route::resource('faqs', 'FaqsController', ['except' => ['create', 'edit']]);

        // Blog Categories
        Route::resource('blog_categories', 'BlogCategoriesController', ['except' => ['create', 'edit']]);

        // Blog Tags
        Route::resource('blog_tags', 'BlogTagsController', ['except' => ['create', 'edit']]);

        // Blogs
        Route::resource('blogs', 'BlogsController', ['except' => ['create', 'edit']]);
	// });
	
	/*
	|--------------------------------------------------------------------------
	| API Templates Routes
	|--------------------------------------------------------------------------
	*/
    // Slider
    Route::get('sliders/get_data', 'SlidersController@get_data');
	Route::resource('sliders', 'SlidersController', ['except' => ['create', 'edit']]);
    // Learning
    Route::get('learnings/get_data', 'LearningsController@get_data');
	Route::resource('learnings', 'LearningsController', ['except' => ['create', 'edit']]);
    // Home Video
    Route::get('homeVideo/get_data', 'HomeVideoController@get_data');
	Route::resource('homeVideo', 'HomeVideoController', ['except' => ['create', 'edit']]);
    // Teams
    Route::get('teams/get_data', 'TeamsController@get_data');
	Route::resource('teams', 'TeamsController', ['except' => ['create', 'edit']]);
    // Partners
    Route::get('partners/get_data', 'PartnersController@get_data');
	Route::resource('partners', 'PartnersController', ['except' => ['create', 'edit']]);
	
		 
});
