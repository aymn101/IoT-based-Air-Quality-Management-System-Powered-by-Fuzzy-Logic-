<?php

use Illuminate\Support\Facades\Route;

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
Route::group(['middleware' => 'auth'], function () {
    // Define your routes here
    Route::get('/route/MQ135_route', 'App\Http\Controllers\dbcontroller@goToMQ135');
    Route::get('/route/MQ7_route', 'App\Http\Controllers\dbcontroller@goToMQ7');
    Route::get('/route/hum_route', 'App\Http\Controllers\dbcontroller@goToHumidity');
    Route::get('/route/Temp_route', 'App\Http\Controllers\dbcontroller@goToTemp');
    Route::get('/route/alarm_route', 'App\Http\Controllers\dbcontroller@goToTelegram');


    
    Route::get('/',function(){
        return view('welcome');

     });
     
     Route::get('/test',function(){
        return view('Dashboard');
    });

    Route::get('/GraphCO2',function(){
        return view('CO2Graph');
    });

    Route::get('/GraphCO',function(){
        return view('COGraph');
    });

    Route::get('/GraphTemp',function(){
        return view('TempGraph');
    });

    Route::get('/GraphHum',function(){
        return view('HumGraph');
    });
    
    Route::get('/systemf',function(){
        return view('system');
    });

    
    
    Route::post('/offfan',function(){
        $message = 'offVentilation';
        event(new App\Events\AirQualityAirSense($message));
        return redirect('test');
    });
    
    Route::post('/onfan',function(){
        $message = 'onVentilation';
        event(new App\Events\AirQualityAirSense($message));
        return redirect('test');
    });
    

    
   
});
    
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
