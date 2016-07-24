<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Table;
use App\BookingVehicle;
use App\Vehicle;

class BookingVehicleController extends Controller
{
    public $model;

	public $url;

	public function __construct(BookingVehicle $model,Vehicle $vehicle)
	{
		$this->model = $model;
		$this->url = 'booking-vehicle';
		$this->vehicle = $vehicle;
	}

	public function getData()
	{
		$query = $this->vehicle
			->select('vehicles.id','vehicle_no','description','name')
			->join('users','users.id','=','vehicles.user_id')
			->where('vehicles.status','avaliable');

		$table = Table::of($query)
			->addColumn('action' , function($model){
				$book = '<a href = "'.url($this->url.'/book/'.$model->id).'")">Book</a>';
				return $book;
			})
			->make(true);

		return $table;
	}

    public function getIndex()
    {
    	return view('booking_vehicle.index');
    }

    public function getBook($id)
    {
    	return view('booking_vehicle._form' , [
    		'model'	=> $this->vehicle->findOrFail($id),
    		'cek'=> $this->cek($id),
    	]);
    }

    public function postBook(Requests\BookingVehicleRequest $request,$id)
    {
    	$vehicle = $this->vehicle->findOrFail($id);

    	$cek = $this->cek($vehicle->id);

    	if(!empty($cek->id))
    	{
    		$cek->update($request->all());
    		return redirect($this->url)->withSuccess('Data has been updated!');
    	}else{
    		$this->model->create($request->all());
    		return redirect($this->url)->withSuccess('Data has been booked!');
    	}
    }

    public function cek($vehicleId)
    {
    	$cek = $this->model
    		->where('user_id',auth()->user()->id)
    		->where('vehicle_id',$vehicleId)
    		->first();

    	return $cek;
    }

}
