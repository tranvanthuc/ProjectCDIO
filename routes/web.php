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
// test 



// end test

//index
Route::get('/', ['as' => 'getIndex','uses' => 'HomeController@getIndex']);

// // home show news moi nhat 
Route::get('/autocomplete', array('as' => 'autocomplete', 'uses' => 'SearchController@autocomplete'));

// Route::get('/', ['as' =>'getSearch', 'uses' => 'SearchController@getSearch']);

//show new cu nhat
// Route::get('/home', ['as' => 'getHomeOldNews', 'uses' =>'HomeController@getHomeOldNews']);

Route::get('login', ['as' => 'getLogin', 'uses' => 'LoginController@getLogin']);
Route::post('login', ['as' => 'postLogin', 'uses' => 'LoginController@postLogin']);
Route::get('logout', ['as' => 'getLogout', 'uses' => 'LoginController@getLogout']);
// login social 
Route::get('login/{provider}', 'LoginController@redirectToProvider');
Route::get('login/{provider}/callback', 'LoginController@handleProviderCallback');

Route::get('/resize/{src}/{w?}/{h?}', ['as' => 'resize', 'uses' => 'ImageController@resize']);
Route::get('/fitImgNews/{src}/{w?}/{h?}', ['as' => 'fit', 'uses' => 'ImageController@fitImgNews']);
Route::get('/fitAvatar/{src}/{w?}/{h?}', ['as' => 'fit', 'uses' => 'ImageController@fitAvatar']);
Route::get('/major/{id}', ['as' => 'getNewsInMajor', 'uses'=>'NewsController@getNewsInMajor']);

Route::get('register', ['as' => 'getRegister', 'uses' => 'RegisterController@getRegister']);
Route::post('register', ['as' => 'postRegister', 'uses' => 'RegisterController@postRegister']);

// home 
Route::group(['middleware' => 'auth'], function(){
	





	

// edit information
	Route::get('/home/editInfo/{id}', ['as' => 'getEditInfoUser', 'uses'=>'UserController@getEditInfoUser']);
	Route::post('/home/editInfo/{id}', ['as' => 'postEditInfoUser', 'uses'=>'UserController@postEditInfoUser']);

	Route::get('home/newsDetail/{id}' ,['as' => 'getNewsDetail', 'uses' => 'NewsController@getNewsDetail']);

// edit password
	Route::get('/home/editPass/{id}', ['as' => 'getEditPassUser', 'uses'=>'UserController@getEditPassUser']);
	Route::post('/home/editPass/{id}', ['as' => 'postEditPassUser', 'uses'=>'UserController@postEditPassUser']);

	// user add news 
	Route::get('home/addNews', ['as' => 'getAddNewsUser', 'uses' => 'NewsController@getAddNewsUser']);
	Route::post('home/addNews', ['as' => 'postAddNewsUser', 'uses' => 'NewsController@postAddNewsUser']);
	Route::get('home/editNews/{id}', ['as' => 'getEditNewsUser', 'uses' => 'NewsController@getEditNewsUser']);
	Route::post('home/editNews/{id}', ['as' => 'postEditNewsUser', 'uses' => 'NewsController@postEditNewsUser']);

	// user delete news 
	Route::get('home/lockMyNews/{id}', ['as' => 'getDelMyNews', 'uses' => 'NewsController@getLockMyNews']);


	//get news home 
	Route::get('home', ['as' => 'getHome', 'uses' =>'HomeController@getHome']);
	// get news detail
	Route::get('home/newsDetail/{id}' ,['as' => 'getNewsDetail', 'uses' => 'NewsController@getNewsDetail']);

	Route::get('/home/major/{id}', ['as' => 'getNewsInMajor', 'uses'=>'NewsController@getNewsInMajor']);
	
	//get news home 
	
	//view news detail, add news , del new , edit news of user


	// admin

	Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function(){
		Route::get('/dashboard', ['as' => 'getDashboard', function(){
			$totalUsers = DB::table('users')->count();
		    $totalReports = DB::table('reports')->count();
		    $totalNews = DB::table('news')->count();
		    $totalMajors = DB::table('majors')->count();
		    $totalSubjects = DB::table('subjects')->count();
		    $totalLogs = DB::table('reports')->count();

		    return view('sb-admin.dashboard', compact('totalUsers','totalReports','totalNews','totalMajors', 'totalSubjects','totalLogs'));
		}]);
		//user management
		Route::group(['prefix' => 'user'], function(){
			Route::get('add', ['as' => 'getAddUser', 'uses' => 'UserController@getAddUser']);

			Route::post('add', ['as' => 'postAddUser', 'uses' => 'UserController@postAddUser']);
			
			Route::get('edit/{id}', ['as' => 'getEditUser', 'uses' => 'UserController@getEditUser']);
			Route::post('edit/{id}', ['as' => 'postEditUser', 'uses' => 'UserController@postEditUser']);


			Route::get('list', ['as' => 'getListUser', 'uses' => 'UserController@getListUser']);

			Route::get('lock/{id}',['as' => 'getLockUser' , 'uses' => 'UserController@getLockUser']);
			Route::get('delete/{id}',['as' => 'getDelUser' , 'uses' => 'UserController@getDelUser']);
			Route::get('deleteAllUsers', ['as' => 'getDelAllUsers', 'uses'=> 'UserController@getDelAllUsers']);
		}); //user
		
		Route::group(['prefix' => 'major'], function(){
			Route::get('add', ['as' => 'getAddMajor', 'uses' => 'MajorController@getAddMajor']);
			Route::post('add', ['as' => 'postAddMajor', 'uses' => 'MajorController@postAddMajor']);

			Route::get('edit/{id}', ['as' => 'getEditMajor', 'uses' => 'MajorController@getEditMajor']);
			Route::post('edit/{id}', ['as' => 'postEditMajor', 'uses' => 'MajorController@postEditMajor']);

			Route::get('delete/{id}', ['as' => 'getDelMajor', 'uses' => 'MajorController@getDelMajor']);

			Route::get('list', ['as' => 'getListMajors', 'uses' => 'MajorController@getListMajors']);
		});

		Route::group(['prefix' => 'subject'], function(){
			Route::get('add', ['as' => 'getAddSubject', 'uses' => 'SubjectController@getAddSubject']);
			Route::post('add', ['as' => 'postAddSubject', 'uses' => 'SubjectController@postAddSubject']);

			Route::get('edit/{id}', ['as' => 'getEditSubject', 'uses' => 'SubjectController@getEditSubject']);
			Route::post('edit/{id}', ['as' => 'postEditSubject', 'uses' => 'SubjectController@postEditSubject']);

			Route::get('delete/{id}', ['as' => 'getDelSubject', 'uses' => 'SubjectController@getDelSubject']);

			Route::get('list', ['as' => 'getListSubjects', 'uses' => 'SubjectController@getListSubjects']);
		});


		//news management
		Route::group(['prefix' => 'news'], function(){

			//view image fit or resize 
			
			
			Route::get('add', ['as' => 'getAddNews', 'uses' => 'NewsController@getAddNews']);

			Route::post('add', ['as' => 'postAddNews', 'uses' => 'NewsController@postAddNews']);
			Route::get('edit/{id}', ['as' => 'getEditNews', 'uses' => 'NewsController@getEditNews']);

			Route::post('edit/{id}', ['as' => 'postEditNews', 'uses' => 'NewsController@postEditNews']);

			Route::get('lock/{id}',['as' => 'getLockNews' , 'uses' => 'NewsController@getLockNews']);
			Route::get('userLock/{id}',['as' => 'getUserLockNews' , 'uses' => 'NewsController@getUserLockNews']);



			Route::get('list', ['as' => 'getListNews', 'uses' => 'NewsController@getListNews']);

			Route::get('delete/{id}',['as' => 'getDelNews' , 'uses' => 'NewsController@getDelNews']);

			Route::get('delImg/{id}', ['as' => 'getDelImg', 'uses' => 'NewsController@getDelImg']);
			Route::get('deleteAllNews', ['as' => 'getDelAllNews', 'uses'=> 'NewsController@getDelAllNews']);

		}); //news
		
		Route::get('report', ['as' => 'getReport', 'uses' => 'ReportController@getReport']);
		Route::get('delReport', ['as' => 'getDelReport', 'uses' => 'ReportController@getDelReport']);
	}); // admin
}); //midleware
