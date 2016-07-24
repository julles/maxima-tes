<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Vehicle;
use Table;

class VehicleController extends Controller
{
	public $model;

	public $url;

	public function __construct(Vehicle $model)
	{
		$this->model = $model;
		$this->url = 'vehicle';
	}

	public function getData()
	{
		$query = $this->model
			->select('id','vehicle_no','description','status');

		$table = Table::of($query)
			->addColumn('action' , function($model){
				$delete = '<a href = "'.url($this->url.'/delete/'.$model->id).'" onclick = "return confirm(\'are you sure want to delete this item ?\')">Delete</a>';
				$update = '<a href = "'.url($this->url.'/update/'.$model->id).'")">Update</a>';
				
				return $update.' | '.$delete;
			})
			->make(true);

		return $table;
	}

    public function getIndex()
    {
    	return view('vehicle.index');
    }

    public function getCreate()
    {
    	return view('vehicle._form',[
    		'model'	=> $this->model,
    	]);
    }

    public function postCreate(Requests\VehicleRequest $request)
    {
    	$this->model->create($request->all());

    	return redirect('vehicle')->withSuccess('Data has been saved!');
    }

    public function getUpdate($id)
    {
    	return view('vehicle._form',[
    		'model'	=> $this->model->findOrFail($id),
    	]);
    }

    public function postUpdate(Requests\VehicleRequest $request,$id)
    {
    	$this->model->findOrFail($id)->update($request->all());

    	return redirect('vehicle')->withSuccess('Data has been updated!');
    }

    public function getDelete($id)
    {
    	$model = $this->model->findOrFail($id);

    	try
    	{
    		$model->delete();
    		return redirect('vehicle')->withSuccess('Data has been saved!');
    	}catch(\Exception $e){
    		return redirect('vehicle')->withSuccess('Data has cannot be deleted!');
    	}
    }
}
