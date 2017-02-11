<?php
use App\User;
use App\Address;
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

Route::get('/', function () {
    return view('welcome');
});
/*
|--------------------------------------------------------------------------
| Updating
|--------------------------------------------------------------------------
*/

Route::get('updateAddress',function(){

    $address = Address::where('user_id',1)->first(); // this will return the first obj , get ( ) would return an array
    $address-> name = 'this is the updated address ';
    $address -> save ();

});


/*
|--------------------------------------------------------------------------
| Deleting and Reading the data
|--------------------------------------------------------------------------
*/
Route::get('delete',function(){

        $user = user::findOrFail(1);

        $user->address()-> delete();
        return 'done' ;
});


/*
|--------------------------------------------------------------------------
| Inserting and creating
|--------------------------------------------------------------------------
*/

// insert to a related table
Route::get('/insertAddress',function (){

   $user=User::findOrFail(1);

    $address= new Address([ 'name' => 'this is the address num 1 ' ]);


    $user->address()->save($address);
});



Route::get('/makeUser',function (){

    $user= new User() ;

   $user->name = 'mohamed';
    $user->email = 'asdsa@sfsd ';
    $user->password = '123';
    $user->save();
});


Route::get('/makeUserWithCreate',function (){

    User::create(['name'=>'ali','email'=>'kasf@sdg.com' , 'password'=> '123']) ;

});

