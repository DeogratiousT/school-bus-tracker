@extends('layouts.app')

@section('content')

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('vehicles.index') }}">Vehicles</a></li>
                        <li class="breadcrumb-item active">{{ $vehicle->plateNo }}</li>
                    </ol>
                </div>
                <h4 class="page-title">Vehicles</h4>
            </div>
        </div>
    </div>     
    <!-- end page title --> 
              
    <div class="row">        
        <div class="col-lg-4 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <p>Vehicles Details</p><hr>
                    <div class="list-group">
                        <span><b>Type</b> : {{$vehicle->type}}</span><br>
                        <span><b>Plate No.</b> : {{$vehicle->plateNo}}</span><br>
                        <span><b>Capacity</b> : {{$vehicle->Capacity}}</span><br>
                        <span><b>Driver</b> : {{$vehicle->driver->name}}</span><br>
                        <span><b>Assistant</b> : {{$vehicle->Assistant->name}}</span>
                    </div>
                    <br> <br>
                    <div>
                        <div style="float:left">
                            <a href="{{ route('vehicles.edit',$vehicle) }}" class="btn btn-secondary">Edit Bus</a>
                        </div>
                        <div style="float:right">
                            <button class="btn btn-danger" data-toggle="modal" data-target="#delete-modal">Delete Bus</button>
                        </div> 
                    </div>
                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div> <!-- end col -->

        <div class="col-lg-8 col-xl-3">
            <div class="card">
                <div class="card-body"> 
                    <div>
                        <div class="mt-2" style="float:left">
                            <p>Linked Operators details</p>
                        </div>

                        <div style="float:right">
                            <a href="" class="btn btn-primary">
                                <span class="mdi mdi-plus-circle"></span>
                                Add Operator
                            </a>
                        </div>
                    </div>   <br><br><br>


                        
                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div> <!-- end col -->
    </div>
    
    <!-- Delete modal -->
    <div id="delete-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="delete-modalLabel">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-colored-header bg-warning">
                    <h4 class="modal-title" id="delete-modalLabel">Delete Vehicle</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <p>Are you sure that you want to delete <b>{{$vehicle->plateNo}}</b> ?</p>
                        <i class="dripicons-warning h1 text-warning"></i> <br> <br> 
                        <p>Deleting this Bus removes all links betweens this Bus and related Bus Operators</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">No</button>
                    <form action="{{ action('VehicleController@destroy',$vehicle) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-warning">Confirm Delete</button>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    
@endsection