<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

Route::get('/signin_with_doctorbattles', function () {
    $query = http_build_query([
        'scope' => '',
        'client_id' => 16, // Replace with Client ID
        'redirect_uri' => 'https://metrotech.gg/callback',
        'response_type' => 'code',
    ]);
    return redirect('https://doctorbattles.com/oauth/authorize?'.$query);
});

Route::get('/test',function(Request $request){
    $token = session()->get('token.access_token');
});

Route::get('/api/token',function(Request $request){
    $token = session()->get('token.access_token');
    return response()->json(['token' => $token],200);
});
Route::get('/api/load_auth',function(Request $request){
    $user = null;
    if (auth()->check()){
        $user = auth()->user();
    }
    return response()->json(['user' => $user],200);
});

Route::get('/callback', function (Request $request) {
    $response = (new GuzzleHttp\Client)->post('https://doctorbattles.com/oauth/token', [
        'form_params' => [
            'grant_type' => 'authorization_code',
            'client_id' => 16, // Replace with Client ID
            'client_secret' => 'VqhL4Iqg0kUJZsq8tZBfhloEmOwZHljptjzDO3pa', // Replace with client secret
            'scope' => '',
            'redirect_uri' => 'https://metrotech.gg/callback',
            'code' => $request->code,
        ]
    ]);

    session()->put('token', json_decode((string) $response->getBody(), true));
    return redirect('/chat');
});
Route::get('/test/nfl',function (){
    exit('a');
    $string = file_get_contents('assets/nfl.json');
    $infos = json_decode($string, true);
    foreach ($infos as $info){
        \App\User::updateOrCreate([
            'email' => $info['email']
        ],[
            'name' => $info['username'],
            'first_name' => $info['first_name'],
            'last_name' => $info['last_name'],
            'organization' => $info['organization_first'] . ' ' .$info['organization_second'],
            'xbox' => $info['xbox'],
            'school' => '',
            'grade' => '',
            'd_o_b' => $info['d_o_b'],
            'password' => Hash::make('nflflag'),
            'parent_full_name' => $info['p_first_name'] . ' ' . $info['p_last_name'],
            'parent_email' => $info['parent_email'],
        ]);
    }

    exit('success');
});
Route::post('/api/register_metro',function(Request $request){
    $requestData = $request->all();
    \App\User::updateOrCreate([
        'email' => $requestData['email']
    ],[
        'name' => $requestData['user_name'],
        'first_name' => $requestData['first_name'],
        'last_name' => $requestData['last_name'],
        'school' => $requestData['school'] ? $requestData['school'] : '',
        'grade' => $requestData['grade'] ? $requestData['grade'] : '',
        'organization' => $requestData['organization'] ? $requestData['organization'] : '',
        'xbox' => $requestData['xbox'],
        'd_o_b' => $requestData['d_o_b'],
        'password' => Hash::make($requestData['password']),
        'parent_full_name' => $requestData['parent_full_name'],
        'parent_email' => $requestData['parent_email'],
    ]);
    return response()->json(['status' => 'OK'],200);
});
Route::post('/contactus', 'ContactUsController@contactUSPost');
Route::post('/subscribe', 'ContactUsController@subscribePost');

// Route::get('/', 'BaseController@index');
// Route::get('/home', 'BaseController@index');
Route::get('/compete/leagues/nflflag', function(Request $request){
    return redirect('/nfl_flag');
});

Route::get('/pages/home', function(Request $request){
    return redirect('/home');
});
Route::get('/nfl_flag', function(Request $request){
    return redirect('/tournaments/nfl_flag');
});




/**
 * Global Routes
 * Routes that are used between both frontend and backend.
 */

// Switch between the included languages
Route::get('lang/{lang}', 'LanguageController@swap');

/* ----------------------------------------------------------------------- */

/*
 * Frontend Routes
 * Namespaces indicate folder structure
 */
Route::group(['namespace' => 'Frontend', 'as' => 'frontend.'], function () {
    includeRouteFiles(__DIR__.'/Frontend/');
});

/* ----------------------------------------------------------------------- */

/*
 * Backend Routes
 * Namespaces indicate folder structure
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'git' => 'admin', 'middleware' => 'admin'], function () {
    /*
     * These routes need view-backend permission
     * (good if you want to allow more than one group in the backend,
     * then limit the backend features by different roles or permissions)
     *
     * Note: Administrator has all permissions so you do not have to specify the administrator role everywhere.
     */
    includeRouteFiles(__DIR__.'/Backend/');
});

includeRouteFiles(__DIR__.'/Generator/');

Route::get('/{any}', 'BaseController@index')->where('any', '.*');

/*
* Routes From Module Generator
*/
