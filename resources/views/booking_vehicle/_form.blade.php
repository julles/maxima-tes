@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">{{ !empty($model->id) ? 'Update' : 'Add New' }} Vehicle</div>
                <div class="panel-body">

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div> 
                    @endif

                    {!! Form::model($model , ['class' => 'form-horizontal']) !!}   
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">Vehicle No</label>

                            <div class="col-md-6">
                                {!! Form::text('vehicle_no' ,  null , ['class'=>'form-control','readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">Origin</label>

                            <div class="col-md-6">
                                {!! Form::text('origin' ,  !empty($cek->id) ? $cek->origin : '', ['class'=>'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">Destination</label>

                            <div class="col-md-6">
                                {!! Form::text('destination' ,  !empty($cek->id) ? $cek->destination : '', ['class'=>'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Book
                                </button>

                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
