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



// Route::view('/{any}', 'spa')->where('any', '.*');



/* For Topic Controller */
Route::get('/topics', 'TopicController@index')->name('topics.index');
Route::get('/topics/create', 'TopicController@create')->name('topic.create');
Route::post('/topics/create', 'TopicController@store');
Route::get('/topics/edit/{topic_id}', 'TopicController@edit')->name('topic.edit');
Route::post('/topics/update/{topic_id}', 'TopicController@update');
Route::delete('/topics/destroy/{topic_id}', 'TopicController@destroy')->name('topic.destroy');


/* For Level Contoller */
Route::get('/levels', 'LevelController@index')->name('levels.index');
Route::get('/levels/create', 'LevelController@create')->name('level.create');
Route::post('/levels/create', 'LevelController@store');
Route::get('/levels/edit/{level_id}', 'LevelController@edit')->name('level.edit');
Route::post('/levels/update/{level_id}', 'LevelController@update');
Route::delete('/levels/destroy/{level_id}', 'LevelController@destroy')->name('level.destroy');


/* For Objective Contoller */
Route::get('/objectives', 'ObjectiveController@index')->name('objectives.index');
Route::get('/objectives/{topic_id}', 'ObjectiveController@show')->name('objectives.show');
Route::get('/objectives/create/{topic_id}', 'ObjectiveController@create')->name('objective.create');
Route::post('/objectives/create/{topic_id}', 'ObjectiveController@store');
Route::get('/objectives/edit/{objective_id}', 'ObjectiveController@edit')->name('objective.edit');
Route::post('/objectives/update/{objective_id}/{topic_id}', 'ObjectiveController@update');
Route::delete('/objectives/destroy/{topic_id}/{objective_id}', 'ObjectiveController@destroy')->name('objective.destroy');


/* For Statement Contoller */
Route::get('/statements/{objective_id}', 'GroupStatementController@index')->name('statements.index');
Route::get('/statements/create/{objective_id}', 'GroupStatementController@create')->name('statement.create');
Route::post('/statements/create/{objective_id}', 'GroupStatementController@store');
Route::get('/statements/edit/{objective_id}', 'GroupStatementController@edit')->name('statement.edit');
Route::post('/statements/update/{objective_id}/{statement_id}', 'GroupStatementController@update');
Route::delete('/statements/destroy/{objective_id}/{statement_id}', 'GroupStatementController@destroy')->name('statement.destroy');
Route::get('/statements/framework/{teacher_id}', 'GroupStatementController@framework')->name('statements.framework');



/* For Behavior Contoller */
Route::get('/behaviors/{statement_id}', 'BehaviorController@index')->name('behaviors.index');
Route::get('/behaviors/create/{statement_id}', 'BehaviorController@create')->name('behavior.create');
Route::post('/behaviors/create/{statement_id}', 'BehaviorController@store');
Route::get('/behaviors/edit/{behavior_id}', 'BehaviorController@edit')->name('behavior.edit');
Route::post('/behaviors/update/{behavior_id}/{statement_id}', 'BehaviorController@update');
Route::delete('/behaviors/destroy/{statement_id}/{behavior_id}', 'BehaviorController@destroy')->name('behavior.destroy');



/* For Track Contoller */
Route::get('/tracks/{teacher_id}', 'TrackController@index')->name('tracks.index');




/* For Progress Contoller */
Route::get('/progress/{teacher_id}', 'ProgressController@index')->name('progress.index');
Route::get('/progress/create/{id}/{statement_id}/{teacher_id}', 'ProgressController@store')->name('progress.create');



/* For Credit Contoller */
Route::get('/credits/create/{behavior_id}/{teacher_id}', 'CreditController@create')->name('credit.create');
Route::post('/credits/create/{behavior_id}/{teacher_id}', 'CreditController@store');
Route::get('/credits/show/{teacher_id}', 'CreditController@show')->name('credit.show');
