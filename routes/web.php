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

use App\Address;
use App\User;
//Route::get('/contact','King@ingiza');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/insert', function () {
    $user = User::findOrFail(1);

    $address = new Address(['name'=>'king@gmail.com']);

    $insert = $user->address()->save($address);
    if ($insert){
        echo "Iserted";
    }else{
        echo "Failed";
    }

});

Route::get('/update', function () {
    $address = Address::whereUserId(1)->first();
    $address->name = "New Address kingmimi@gmail.com";
    $update = $address->save();
    if ($update){
        echo "Updated";
    }else{
        echo "Update failed";
    }

});



Route::get('/read', function () {
    $user = User::findOrFail(1);
     return $user->address->name;
});

Route::get('/delete', function () {
    $user = User::findOrFail(1);
    $user->address()->delete();
    if ($user){
        echo "Soft deleted";
    }else{
        echo "Soft delete failed";
    }
});





?>