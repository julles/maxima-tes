<?php namespace Maxima\Src;

use Illuminate\Support\ServiceProvider;

use Maxima\Src\Helper;

class HelperServiceProvider extends ServiceProvider
{
	public function boot()
	{
		//
	}

	public function register()
	{
		$this->app->bind('register-helper' ,  function(){
			return new Helper;
		});
	}
}