<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// routes for all the admin panel comes here
Route::group(['prefix'=> 'admin' ,'namespace'=>'Admin'], function(){
	// all the routes for front-end site
	Route::get('/sample', ['as' => 'sample', 'uses' => function () {
		return View('backend.sample-list');




	}]);
    Route::get('/', ['as' => 'admin', 'uses' => 'Auth\AdminAuthController@index']);
    
    Route::get('login', [ 'middleware' => 'guest.admin', 'uses' => 'Auth\AdminAuthController@getLogin'] );
	Route::post('login', [ 'as' => 'adminLogin', 'uses' => 'Auth\AdminAuthController@postLogin'] );
	Route::get('logout', [ 'as' => 'logout', 'uses' => 'Auth\AdminAuthController@getLogout']);

	Route::get('dashboard', ['middleware'=>'auth.admin', 'as' => 'adminDashboard', 'uses'=>'AdminDashboardController@index']);	
	
	Route::group(['prefix' => 'payments', 'middleware'=>'auth.admin'], function(){
		Route::get('/{id}', ['as' => 'adminMemberPaymentDetails', 'uses' => 'PaymentController@index']);
		Route::get('/', [ 'as' => 'adminMembershipContent', 'uses'=>'MembershipController@index' ]);
		


	});

	Route::get('/admintravelgrant', [ 'as' => 'adminTravelGrantView', 'uses'=>'adminTravelGrantController@index' ]);

	Route::get('/admintravelgrantapproved', [ 'as' => 'adminTravelGrantApproved', 'uses'=>'adminTravelGrantController@approve' ]);
	
	Route::get('/admintravelgrantrejected', [ 'as' => 'adminTravelGrantRejected', 'uses'=>'adminTravelGrantController@reject' ]);
	
	Route::get('/admintravelgrantviewform', [ 'as' => 'adminTravelGrantViewForm', 'uses'=>'adminTravelGrantController@view' ]);
	

	Route::group(['prefix' => 'memberships', 'middleware'=>'auth.admin'], function(){
		Route::get('/', [ 'as' => 'adminMembershipContent', 'uses'=>'MembershipController@index' ]);
		// Route::get('{typeId}/verify/{id}', [ 'as' => 'backendInstitutionVerifyById', 'uses'=>'InstitutionController@verify' ]);
		// Route::get('{typeId}/profile/{id}', [ 'as' => 'backendInstitutionById', 'uses'=>'InstitutionController@profile' ]);
		// Route::get('{typeId}/profile/{id}/reject/{pid}', [ 'as' => 'backendInstitutionRejectById', 'uses'=>'InstitutionController@reject_payment' ]);
		// Route::post('{typeId}/profile/{id}/reject/{pid}', [ 'as' => 'backendInstitutionRejectById', 'uses'=>'InstitutionController@store_reject_payment' ]);
		// Route::get('{typeId}/profile/{id}/accept/{pid}', [ 'as' => 'backendInstitutionAcceptById', 'uses'=>'InstitutionController@accept_payment' ]);
		// Route::get('listStudentBranch', [ 'as' => 'backendInstitutionListStudentBranch', 'uses'=>'InstitutionController@listStudentBranch' ]);
		// Route::get('makeStudentBranch/{rid}', [ 'as' => 'backendInstitutionMakeStudentBranch', 'uses'=>'InstitutionController@makeStudentBranch' ]);
		// Route::get('{typeId}', [ 'as' => 'backendInstitution', 'uses'=>'InstitutionController@index' ]);
		// Route::get('/', [ 'as' => 'backendInstitutionHome', 'uses'=>'AdminDashboardController@index' ]);
	});

	Route::get('proofs/{filename}', function($filename){
	    $path = storage_path() . '/uploads/payment_proofs/' . $filename;

		$filetype = File::mimeType($path);
		$imgbinary = fread(fopen($path, "r"), filesize($path));
    	$file = 'data:image/' . $filetype . ';base64,' . base64_encode($imgbinary);

	    //$file = base64_encode(file_get_contents($path));

	    return view('backend.individuals.proof', compact('file'));
	});

	Route::group(['prefix' => 'individual', 'middleware'=>'auth.admin'], function(){
		
		Route::get('{typeId}/verify/{id}', [ 'as' => 'backendIndividualVerifyById', 'uses'=>'IndividualController@verify' ]);
		Route::get('{typeId}/profile/{id}', [ 'as' => 'backendIndividualById', 'uses'=>'IndividualController@profile' ]);
		Route::get('{typeId}/profile/{id}/reject/{pid}', [ 'as' => 'backendIndividualRejectById', 'uses'=>'IndividualController@reject_payment' ]);
		Route::post('{typeId}/profile/{id}/reject/{pid}', [ 'as' => 'backendIndividualRejectById', 'uses'=>'IndividualController@store_reject_payment' ]);
		Route::get('{typeId}/profile/{id}/accept/{pid}', [ 'as' => 'backendIndividualAcceptById', 'uses'=>'IndividualController@accept_payment' ]);
		Route::get('{typeId}/profile/{id}/proof/{nid}', [ 'as' => 'backendIndividualProofById', 'uses'=>'IndividualController@view_proof' ]);
		Route::get('{typeId}', [ 'as' => 'backendIndividual', 'uses'=>'IndividualController@index' ]);
		Route::get('/', [ 'as' => 'backendIndividualHome', 'uses'=>'AdminDashboardController@index' ]);
	});

});

Route::get('register/{entity}', [
		'as'=>'register', 'uses'=>'RegisterController@create'
]);
Route::post('register/getresource/{resource}', 'RegisterController@getResource');
Route::post('register/{entity}', 'RegisterController@store');

// all the routes for front-end site
Route::get('/', function () {
	return View('frontend.index');

});

// all the routes for front-end site
Route::get('/home', function () {
	return View('frontend.index');

});

// all the routes for front-end site
Route::get('/sample', ['as' => 'sample', 'uses' => function () {
	return View('frontend.sample-list');

}]);

// Authentication routes...
Route::get('login', ['middleware' =>['guest'] ,'uses' => 'Auth\AuthController@getLogin']);
Route::get('logout', 'Auth\AuthController@getLogout');

// Authentication routes...
Route::post('login', 'Auth\AuthController@postLogin');
Route::get('/dashboard', ['middleware'=>'auth', 'uses'=>'UserDashboardController@index']);	

Route::get('/profile', ['middleware'=>'auth', 'as' => 'profile', 'uses'=>'UserDashboardController@showProfile']);
Route::get('/confirmStudentBranch', ['middleware'=> ['auth', 'isacademic'], 'as' => 'confirmStudentBranch', 'uses'=>'UserDashboardController@confirmStudentBranch']);
Route::post('/makeStudentBranch', ['middleware'=> ['auth', 'isacademic'], 'uses'=>'UserDashboardController@makeStudentBranch']);
Route::get('/card', ['middleware'=>'auth.individual', 'as' => 'card', 'uses'=>'UserDashboardController@showCard']);

//travelgrants
Route::get('/travelgrant', ['middleware'=>'auth', 'as' => 'createtravel', 'uses'=>'TravelGrantsController@create']);
Route::get('/travelgrantviewall', ['middleware'=>'auth', 'as' => 'viewalltravel', 'uses'=>'TravelGrantsController@viewAll']);
Route::get('/travelgrantmygrant', ['middleware'=>'auth', 'as' => 'viewallgrant', 'uses'=>'TravelGrantsController@viewgrant']);
Route::get('/travelgrant/editgrant/{id}', ['middleware'=>'auth', 'as' => 'editgrant', 'uses'=>'TravelGrantsController@editgrant']);

Route::get('/travelgrant/delete/{id}', [ 'middleware'=>'auth','as' => 'deletegrant', 'uses'=>'TravelGrantsController@destroy']);
Route::post('/travelgrant', ['middleware'=>'auth', 'as' => 'storetravel', 'uses'=>'TravelGrantsController@store']);


// Registration routes...
// Route::group(['prefix' => 'admin'], function() {
// 	// Authentication routes...
	

// 	// Registration routes...
// 	//Route::get('auth/register', 'Auth\AdminAuthController@getRegister');
// 	//Route::post('auth/register', 'Auth\AdminAuthController@postRegister');
	
	
// });
// Registration routes...
// Route::get('/dashboard', ['middleware' => 'auth' ,'uses' => 'UserDashboardController@index']);
