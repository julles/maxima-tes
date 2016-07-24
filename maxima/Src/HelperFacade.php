<?php namespace Maxima\Src;

use Illuminate\Support\Facades\Facade;

class HelperFacade extends Facade
{

	public function static getFacadeAccessor()
	{
		return 'register helper';
	}

}