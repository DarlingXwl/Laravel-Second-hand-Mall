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
// 网站根目录
Route::any('/','Home\IndexController@index') -> name('index');

// 登陆页面
Route::any('/login', 'Home\IndexController@login') -> name('login');

// 用户注册
Route::any('/register', 'Home\IndexController@register') -> name('register');

// 个人中心
Route::any('/member', 'Home\IndexController@member') -> name('member');
Route::any('/changepwd', 'Home\IndexController@changepwd') -> name('changepwd');
// 提交处理
Route::any('/action', 'Home\ActionController@action') -> name('action');

// 商品详情页
Route::any('/goods', 'Home\GoodsController@goods') -> name('goods');
// 购物车
Route::any('/shopcar', 'Home\GoodsController@shopcar') -> name('shopcar');
// 商品分类
Route::any('/class', 'Home\GoodsController@class') -> name('class');
Route::any('/seller', 'Home\GoodsController@seller') -> name('seller');
Route::any('/addsell', 'Home\GoodsController@addsell') -> name('addsell');
Route::any('/changesell', 'Home\GoodsController@changesell') -> name('changesell');
Route::any('/order', 'Home\GoodsController@order') -> name('order');
Route::any('/sorder', 'Home\GoodsController@sorder') -> name('sorder');
Route::any('/addorder', 'Home\GoodsController@addorder') -> name('addorder');
Route::any('/changeorder', 'Home\GoodsController@changeorder') -> name('changeorder');

// 后台管理
Route::group(['prefix'=>'admin'], function () {
    // 后台登陆页面
    Route::any('/login','Admin\IndexController@login') -> name('admin-login');

    Route::any('/check', 'Admin\IndexController@check') -> name('admin-check');

    // 管理员页面
    Route::any('/index', 'Admin\IndexController@index') -> name('admin-Index');
    Route::any('/index/welcome', 'Admin\IndexController@welcome') -> name('admin-Admin');
    Route::any('/logout', 'Admin\IndexController@logout') -> name('admin-logout');
    Route::any('/action', 'Admin\ActionController@action') -> name('admin-action');
    Route::any('/member', 'Admin\IndexController@member') -> name('admin-member');
    Route::any('/changepwd', 'Admin\IndexController@changepwd') -> name('admin-pwd');
    Route::any('/admin', 'Admin\IndexController@admin') -> name('admin-admin-list');
    Route::any('/goods', 'Admin\IndexController@goods') -> name('admin-goods');
    Route::any('/changegoods', 'Admin\IndexController@changegoods') -> name('admin-changegoods');
    Route::any('/class', 'Admin\IndexController@class') -> name('admin-class');
    Route::any('/changeclass', 'Admin\IndexController@changeclass') -> name('admin-changeclass');
    Route::any('/addadmin', 'Admin\IndexController@addadmin') -> name('admin-add');
    Route::any('/message', 'Admin\IndexController@message') -> name('admin-message');
    Route::any('/order', 'Admin\IndexController@order') -> name('admin-order');

});
