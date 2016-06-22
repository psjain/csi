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
//Route::get('g1','adminTravelGrantController@g1');
	//admin travel grants
	Route::group(['prefix'=>'travel-grants','middleware'=>'auth.admin'],function(){	
		Route::get('/view', [ 'as' => 'adminTravelGrantView', 'uses'=>'adminTravelGrantController@index' ]);
		Route::get('/{value}', [ 'as' => 'adminTravelGrantViewSpecific', 'uses'=>'AdminDashboardController@travelGrantRequests' ]);
		Route::post('/approved', [ 'as' => 'adminTravelGrantApproved', 'uses'=>'adminTravelGrantController@approve' ]);
		Route::post('/{id}', [ 'as' => 'adminTravelGrantApproveSave', 'uses'=>'adminTravelGrantController@approvesave' ]);
		Route::get('/{filename}',['as'=>'adminTravelGrantMemberDocument','uses'=>'adminTravelGrantController@showDocument']);
		Route::post('/rejected', [ 'as' => 'adminTravelGrantRejected', 'uses'=>'adminTravelGrantController@reject' ]);
	    Route::post('/revised', [ 'as' => 'adminTravelGrantRevised', 'uses'=>'adminTravelGrantController@revise' ]);
		Route::get('/{id}', [ 'as' => 'adminTravelGrantViewForm', 'uses'=>'adminTravelGrantController@view' ]);
		Route::get('/profile/{id}',['as'=>'adminTravelGrantMemberProfile','uses'=>'adminTravelGrantController@profile']);
	});
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

Route::get('register/{entity}', ['as'=>'register', 'uses'=>'RegisterController@create']);
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

Route::group(['prefix'=>''],function(){
	Route::get('/dashboard', ['middleware'=>'auth','uses'=>'UserDashboardController@index']);	
	Route::get('/profile', ['middleware'=>'auth','as' => 'profile', 'uses'=>'UserDashboardController@showProfile']);
	Route::get('/confirmStudentBranch', ['middleware'=> ['auth', 'isacademic'], 'as' => 'confirmStudentBranch', 'uses'=>'UserDashboardController@confirmStudentBranch']);
	Route::post('/makeStudentBranch', ['middleware'=> ['auth', 'isacademic'], 'uses'=>'UserDashboardController@makeStudentBranch']);
	Route::get('/card', ['middleware'=>'auth.individual', 'as' => 'card', 'uses'=>'UserDashboardController@showCard']);

	//travelgrants
	Route::group(['prefix'=>'travel-grants','middleware'=>'auth'],function(){
		Route::get('/create', ['as' => 'createtravel', 'uses'=>'TravelGrantsController@create']);
		Route::get('/view', ['as' => 'viewalltravel', 'uses'=>'TravelGrantsController@viewAll']);
		Route::get('/edit/{id}', ['as' => 'editgrant', 'uses'=>'TravelGrantsController@editgrant']);
		Route::get('/delete/{id}', ['as' => 'deletegrant', 'uses'=>'TravelGrantsController@deletegrant']);
		Route::post('/save', ['as' => 'travelgrantsave', 'uses'=>'TravelGrantsController@store']);
		Route::post('/update/{id}', ['as' => 'updatetravelgrant', 'uses'=>'TravelGrantsController@updategrant']);
		Route::get('/getdocument/{filename}',['as'=>'TravelGrantMemberDocument','uses'=>'TravelGrantsController@showDocument']);
	});
});
// Registration routes...
// Route::group(['prefix' => 'admin'], function() {
// 	// Authentication routes...
	

// 	// Registration routes...
// 	//Route::get('auth/register', 'Auth\AdminAuthController@getRegister');
// 	//Route::post('auth/register', 'Auth\AdminAuthController@postRegister');
	
	
// });
// Registration routes...
// Route::get('/dashboard', ['middleware' => 'auth' ,'uses' => 'UserDashboardController@index']);
