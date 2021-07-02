<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Employeecontroller;
use App\Models\Employeemodel;
use App\Http\Middleware\Emplogin;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::get('/test',function(){
    return "This is test";
});

Route::resource('Employeemodel',Employeecontroller::class);

Route::get('/mytest',function(){
})->middleware(Emplogin::class);

Route::get('/checkadmin',function(){
    $user = Auth::user();
   // $emp = Employeemodel::all();
    return $user;
});

Route::get('/testmiddleware',function(){
    
})->middleware(Emplogin::class);

Route::get('/password',function(){
    
    $encrypted = Crypt::encryptString('Bhavin');
    echo $encrypted;
    echo "<br>";
    $decrypted = Crypt::decryptString($encrypted);
    echo $decrypted;

    // $pwd = Hash::make('password');
    // echo $pwd;
    // echo "<br>";

    // $pwdnew = Hash::needsRehash($pwd);
    // echo "sdasd";
    // echo "This is   ".$pwdnew;
});

Route::get('/session',function(Request $request){
    // $request->session()->put(['name'=>'admin']);

     session(['test'=>'data','demo'=>'content']);

     $request->session()->forget(['demo','key']);
     return $request->session()->all();

    // session(['key'=>'value']);
    // return session('key');


});

Route::get('/dsppwd/{id}',function($id){
    $emptable = Employeemodel::all();
    $emptable=Employeemodel::findorFail($id);
    echo $emptable->password;
    echo "<br><br>";
    echo crypt::decryptString($emptable->password);
    // foreach ($emptable as $emp) {
    //     $a = $emp->password;
    //     $b = Crypt::decryptString($a);
    //     echo $b;
    //     echo "<br><br>";
    // }
});

Route::get('/checkpwd/{id}',function($id){
    $emp = Employeemodel::findorFail($id);
    echo Crypt::decryptString($emp->password);
});

Route::get('/send-mail',function(){
    $details = [
        'title' => 'Mail from ItSolutionStuff.com',
        'body' => 'This is for testing email using smtp'
    ];
    \Mail::to('bhavingediya123@gmail.com')->send(new \App\Mail\MyTestMail($details));
    dd("Email is Sent.");
});