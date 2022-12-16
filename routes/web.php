<?php

use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Session\Session;

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
use Illuminate\Routing\Controllers\Middleware;

Route::get('/', function () {
    return view('main-home.index');
})->name('home.index');

Route::get('/admin', 'App\Http\Controllers\admin\adminController@checkAdmin')->name('admin.index');
Route::get('/admin/comment', 'App\Http\Controllers\admin\commentPageController@comment')->name('commentPage.comment');
Route::get('/admin/comment/{idCommented}', 'App\Http\Controllers\admin\commentPageController@replyComment')->name('commentPage.replyComment');
Route::get('/admin/deleteComment/{commentId}', 'App\Http\Controllers\admin\commentPageController@deleteComment')->name('commentPage.deleteComment');
Route::get('/admin/deleteReplyComment/{replyCommentId}', 'App\Http\Controllers\admin\commentPageController@deleteReplyComment')->name('commentPage.deleteReplyComment');


Route::get('/login', 'App\Http\Controllers\backend\loginController@index')->name('login');
Route::post('/login', 'App\Http\Controllers\backend\loginController@postInfoLogin')->name('loginPost');
Route::get('/register', 'App\Http\Controllers\backend\registerController@index')->name('register');
Route::post('/register', 'App\Http\Controllers\backend\registerController@postInfoRegister')->name('registerPost');
Route::get('/logout', 'App\Http\Controllers\backend\logoutController@logout')->name('logout');


// USER

Route::group(['prefix' => 'user', 'namespace' => 'App\Http\Controllers\backend'], function () {
    Route::get('home', 'homeController@index')->name('home');
    Route::get('routes', 'routeController@index')->name('learn.routes.index');
    Route::get('routes/frontend', 'routeFrontendController@index')->name('learn.routes.frontend.index');
    Route::get('routes/backend', 'routeBackendController@index')->name('learn.routes.backend.index');
    // LESSON 
    Route::get('lessons', 'lessonsController@index')->name('learn.lessons.index');
    Route::get('lessons/html-css', 'lessonsController@index')->name('learn.lessons.index');
    //EndLESSON

    Route::get('comments', 'commentsController@index')->name('learn.comments.index');
    Route::get('comments-update/{idComment}', 'commentsController@updateIndex')->name('updateComment.index');
    Route::post('comments-update', 'commentsController@postUpdateIndex')->name('postUpdateComment.index');
    
    Route::get('replyComments-update/{idComment}', 'commentsController@replyUpdateIndex')->name('updateReplyComment.index');
    Route::post('replyComments-update', 'commentsController@postReplyUpdateIndex')->name('postUpdateReplyComment.index');


    Route::get('personal-info', 'infoController@index')->name('learn.info.index');
    Route::get('update-info', 'infoController@updateIndex')->name('learn.infoUpdate.index');
    Route::post('update-info', 'infoController@postUpdateIndex')->name('learn.postInfoUpdate.index');
});

// LESSON DETAIL
Route::group(['prefix' => 'user', 'namespace' => 'App\Http\Controllers\lessonDetail'], function () {
    Route::get('lessons/html-css', 'htmlController@index')->name('lessonHTML.index');
    Route::get('lessons/js', 'jsController@index')->name('lessonJS.index');
    Route::get('lessons/php', 'phpController@index')->name('lessonPHP.index');
    Route::get('lessons/reactjs', 'reactController@index')->name('lessonREACT.index');
    Route::get('lessons/laravel', 'laravelController@index')->name('lessonLARAVEL.index');
    Route::get('lessons/ubuntu', 'ubuntuController@index')->name('lessonUBUNTU.index');
    
    
});
//END LESSSON DETAIL

Route::group(['prefix' => 'user', 'namespace' => 'App\Http\Controllers\search'], function () {
    Route::get('search', 'searchController@index')->name('search.index');
    Route::get('resultSearch', 'searchController@search')->name('search.search');
});

Route::get('admin/comments', 'App\Http\Controllers\backend\commentsController@index')->name('admin.comments.index');
Route::get('admin/commentsUpdate/{idComment}', 'App\Http\Controllers\admin\commentPageController@updateIndex')->name('AdminUpdateComment.index');



// Route::get('comments-update/{idComment}', 'commentsController@updateIndex')->name('updateComment.index');
// Route::post('comments-update', 'commentsController@postUpdateIndex')->name('postUpdateComment.index');
// ADMIN
Route::group(['prefix' => 'admin', 'namespace' => 'App\Http\Controllers\adminManager'], function () {


    Route::get('manageHTML-CSS', 'HTMLController@index')->name('manage.html.index');
    Route::get('manageJS', 'JSController@index')->name('manage.js.index');
    Route::get('managePHP', 'PHPController@index')->name('manage.php.index');
    Route::get('manageLARAVEL', 'LaravelController@index')->name('manage.laravel.index');
    Route::get('manageREACT', 'ReactController@index')->name('manage.react.index');
    Route::get('manage-users', 'UsersController@index')->name('manage.users.index');
});

Route::group(['prefix' => 'admin', 'namespace' => 'App\Http\Controllers\formadd'], function () {

    Route::get('adduser', 'formAddUserController@index')->name('user.index');
    Route::post('adduser', 'formAddUserController@postUser')->name('user.post');
    Route::get('deleteUser/{id}', 'formAddUserController@delete')->name('user.delete');
});

// MANAGEMENT LESSONS
Route::group(['prefix' => 'admin', 'namespace' => 'App\Http\Controllers\formadd'], function () {

    // ADD
    Route::get('addlessonHTML', 'formAddHtmlController@index')->name('formadd.html.index');
    Route::post('addlessonHTML', 'formAddHtmlController@postlesson')->name('formadd.html.post');
    Route::get('addlessonJS', 'formAddJSController@index')->name('formadd.js.index');
    Route::post('addlessonJS', 'formAddJSController@postlesson')->name('formadd.js.post');

    // UPDATE 

    Route::get('updatelessonHTML/{id}', 'formAddHtmlController@update')->name('formadd.html.update');
    Route::post('updatelessonHTML', 'formAddHtmlController@postUpdate')->name('formadd.html.postupdate');
    Route::get('updatelessonJS/{id}', 'formAddJSController@update')->name('formadd.js.update');
    Route::post('updatelessonJS', 'formAddJSController@postUpdate')->name('formadd.js.postupdate');

    // DELETE
    Route::get('deletelessonHTML/{id}', 'formAddHtmlController@delete')->name('formadd.html.delete');

    Route::get('deletelessonJS/{id}', 'formAddJSController@delete')->name('formadd.js.delete');
});
