<?php namespace Maxima\Src;

use Auth;
use App\User;

class Helper
{
	public function setMenusOwner()
	{
		return [
		
			'vehicle'	=> 'Vehicle',
		
		];
	}

	public function setMenusRenter()
	{
		return [
			'booking-vehicle'	=> 'Booking Vehicle',
		];
	}

	public function getMenus()
	{
		$generateHtmlMenu = "";

		$user = Auth::user();

		if(Auth::check())
		{
			if($user->status == 'owner')
			{
				foreach($this->setMenusOwner() as $url => $label)
				{
					$generateHtmlMenu .= '<li><a href = "'.url($url).'">'.$label.'</a></li>';
				}
			}else{
				foreach($this->setMenusRenter() as $url => $label)
				{
					$generateHtmlMenu .= '<li><a href = "'.url($url).'">'.$label.'</a></li>';
				}
			}
		}

		return 	$generateHtmlMenu;
	}
}