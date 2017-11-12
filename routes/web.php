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

Route::get('/', 'IndexController@load_index');

Route::get('/about-us/',function(){
    return view('pages.about');
});

Route::get('/404/',function(){
    return view('pages.404');
});

Route::get('/terms-and-conditions/',function(){
    return view('pages.terms');
});


Route::get('/reactivate_account/',function(){
    return view('pages.mess');
});

Route::get('/register/',function(){
    return view('pages.register');
});

//REGISTRATION REQUESTS
Route::post('/register/req', 'ReqController@make_request');


Route::get('/contact-us/',function(){
    return view('pages.contact');
});

Route::post('/send-mail',function(){

});

Route::get('/admin-section/', 'AdminController@dash')->middleware('admin');
Route::post('/admin-section/message', 'CardController@post')->middleware('admin');

Route::get('/admin-section/issues/', 'AdminController@issues')->middleware('admin');


//USERS IN ADMIN PANEL//
Route::get('/admin-section/users/', 'AdminController@users')->middleware('admin');
Route::post('/admin-section/users/store', 'UserController@store')->middleware('admin');

Route::put('/admin-section/users/{user_id}/suspend', 'UserController@suspend')->middleware('admin');
Route::delete('/admin-section/users/{user_id}/delete', 'UserController@delete')->middleware('admin');
Route::get('/admin-section/users/{user_id}/edit', 'UserController@edit')->middleware('admin');

Route::put('/admin-section/users/{user_id}/', 'UserController@update')->middleware('authenticated');
Route::put('/admin-section/users/{user_id}/password', 'UserController@update_password')->middleware('authenticated');

Route::get('/admin-section/users/all/', 'AdminController@all_users')->middleware('admin');
Route::get('/admin-section/users/create/', 'UserController@create')->middleware('admin');
//USERS IN ADMIN PANEL ENDS HERE//




Route::resource('/admin-section/columns/','ColumnController');

Route::get('/admin-section/issues/manage/{issue_id}/', 'IssueController@manage_issue')->middleware('admin');
Route::get('/admin-section/issues/add', 'IssueController@new_issue')->middleware('admin');
Route::post('/admin-section/issues/', 'IssueController@store_issue')->middleware('admin');



//ARTICLE CRUD...
Route::get('/admin-section/articles/add/{issue_id}/{column_id}', 'ArticleController@add_article')->middleware('admin');
Route::post('/admin-section/articles/','ArticleController@store_article')->middleware('admin');
Route::get('/admin-section/articles/{article_id}/edit', 'ArticleController@edit_article')->middleware('admin');
Route::put('/admin-section/articles/{article_id}', 'ArticleController@update_article')->middleware('admin');
Route::delete('/admin-section/articles/{article_id}', 'ArticleController@delete_article')->middleware('admin');

//ENDS HERE...

Route::get('/articles/{issue_number}/{column_name}/{article_id}/{article_name}','ArticleController@preview');
Route::get('/articles/issue-{issue_number}/', 'IssueController@view_issue');
Route::get('/articles/{issue_number}/', 'IssueController@view_issue');


Route::get('/articles/{issue_number}/{column_name}/{article_id}/{article_name}/full_view','ArticleController@full_article')->middleware('authenticated');



Route::get('/columns/{column_id}/{column_name}/', 'ColumnController@view_column');

Route::get('/admin-section/columns/{id}/edit', 'ColumnController@edit')->middleware('admin');
Route::put('/admin-section/columns/{id}', 'ColumnController@update')->middleware('admin');
Route::delete('/admin-section/columns/{id}', 'ColumnController@destroy')->middleware('admin');

Route::get('/account/', [
    'uses' => 'UserController@view_account'
]);




//admin routes
Route::get('/admin-section/reg-req/{req_id}', 'ReqController@view_request')->middleware('admin');
Route::delete('/admin-section/reg-req/{req_id}', 'ReqController@delete_request')->middleware('admin');
//admin routes



Route::get('/request-sent/',function(){
    return view('pages.req');
});
//REGISTRATION REQUESTS ENDS HERE


Auth::routes();
//Route::post('/login', 'UserController@login');


