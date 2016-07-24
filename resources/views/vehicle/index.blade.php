@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">

            @if(Session::has('success'))

                <div class="alert alert-success">
                    <b>{!! Session::get('success') !!}</b>
                </div>

            @endif

            <div class="panel panel-default">
                <div class="panel-heading">Listing Vehicle</div>
                <div class="panel-body">

                    <a style="margin-bottom:10px;" href = "{{ url('vehicle/create') }}" class="btn btn-primary btn-sm">Add New</a>
                    
                    <table id = 'table'>
                        
                        <thead>
                            <th>Vehicle No</th>
                            <th>Description</th>
                            <th>Action</th>
                        </thead>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script type="text/javascript">
    
    $(function() {
        $('#table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! url('vehicle/data') !!}',
            columns: [
                { data: 'vehicle_no', name: 'vehicle_no'},
                { data: 'description', name: 'description'},
                { data: 'action', name: 'action'},
            ]
        });
    });

</script>
@endpush