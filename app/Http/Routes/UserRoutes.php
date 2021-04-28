<?php

//Route::get('/vrml', '@index');
//Route::get('/vrml/test', '\App\Http\Controllers\Shop\VrmlController@test');
//$router->get('oa/cmf_accessbank', 'CmfAccessbankController@index');

namespace App\Http\Routes;
 
use Illuminate\Contracts\Routing\Registrar;
 
//用户中心路由

class UserRoutes
{
  public function map(Registrar $router)
  {
  	$router->auth();

  		$router->group(['domain' => '127.0.0.1', 'middleware' => 'web'], function ($router) {
  		$router->get('/user',['user','uses' => '\\App\\Http\\Controllers\\User\\UserIndexController@index']);
  		$router->get('/user/test',['test','uses' => '\\App\\Http\\Controllers\\User\\UserIndexController@test']);
  		});
  }
}
?>