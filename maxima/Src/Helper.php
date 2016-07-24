<?php namespace Maxima\Src;

use Auth;
use App\User;

class Helper
{
	public function setMenus()
	{
		return [
		
			url('vehicle')	=> 'Vehicle',
		
		];
	}

	public function getMenus()
	{
		$generateHtmlMenu = "";

		if(Auth::check())
		{
			foreach($this->setMenus() as $url => $label)
			{
				$generateHtmlMenu .= '<li><a href = "'.$url.'">'.$label.'</a></li>';
			}
		}

		return 	$generateHtmlMenu;
	}
}