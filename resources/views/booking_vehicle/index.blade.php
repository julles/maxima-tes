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

                    <table id = 'table'>
                        
                        <thead>
                            <th>Vehicle NO</th>
                            <th>Description</th>
                            <th>Owner</th>
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
     $.fn.dataTable.ext.errMode = 'none';
        $('#table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! url('booking-vehicle/data') !!}',
            columns: [
                { data: 'vehicle_no', name: 'vehicle_no'},
                { data: 'description', name: 'description'},
                { data: 'name', name: 'name'},
                { data: 'action', name: 'action',searchable : false,orderable:false,},
            ]
        });
    });

</script>
@endpush