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



// Route::view('/{any}', 'spa')->where('any', '.*')


Route::get('/home','UsersController@home');
/*------------------------------*/

/************************************************
*********************FRIENDS*********************
****************************************************/
Route::get('/viewpage','FriendsController@viewpage');

Route::post('/friendadd','FriendsController@friendadd');
Route::get('/friendadd','FriendsController@friendadd');
Route::post('/frienddelete','FriendsController@frienddelete');
Route::post('/friendlist','FriendsController@friendlist');
Route::get('/friendlists/{id}','FriendsController@friendlists');
Route::get('/usersearch','FriendsController@usersearch');
Route::post('/usersearch','FriendsController@usersearch');
Route::post('/checkfriend','FriendsController@checkfriend');

/*-----------------------*/
/***********************************
**************Quests*****************
*******************************/
Route::post('/addquest','QuestsController@addquest');
Route::get('/addquest','QuestsController@addquest');
Route::get('listquests/{id}','QuestsController@listquests');
Route::post('/listquest','QuestsController@listquest');

Route::post('/deletequest','QuestsController@deletequest');
Route::post('/checkquest','QuestsController@checkquest');