@extends('layouts.app')

@section('content')

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('busoperators.index') }}">Bus Operators</a></li>
                        <li class="breadcrumb-item active">{{ $busoperator->name }}</li>
                    </ol>
                </div>
                <h4 class="page-title">Parents</h4>
            </div>
        </div>
    </div>     
    <!-- end page title --> 
              
    <div class="row">        
        <div class="col-lg-4 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <p>Parent Details</p><hr>
                    <div class="list-group">
                        <span><b>Name</b> : {{$busoperator->name}}</span><br>
                        <span><b>Phone</b> : {{$busoperator->phone}}</span><br>
                        <span><b>Email</b> : {{$busoperator->email}}</span><br>
                        <span><b>National ID</b> : {{$busoperator->nationalId}}</span>
                    </div>
                    <br> <br>
                    <div>
                        <div style="float:left">
                            <a href="{{ route('parents.edit',$busoperator) }}" class="btn btn-secondary">Edit Parent</a>
                        </div>
                        <div style="float:right">
                            <button class="btn btn-danger" data-toggle="modal" data-target="#delete-modal">Delete Parent</button>
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
                            <p>Linked children details</p>
                        </div>

                        <div style="float:right">
                            <a href="" class="btn btn-primary">
                                <span class="mdi mdi-plus-circle"></span>
                                Add Bus
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
                    <h4 class="modal-title" id="delete-modalLabel">Delete Parent</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <p>Are you sure that you want to delete <b>{{$busoperator->name}}</b> ?</p>
                        <i class="dripicons-warning h1 text-warning"></i> <br> <br> 
                        <p>Deleting this parent removes all links betweens this parent and related pupils</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">No</button>
                    <form action="{{ action('BusoperatorController@destroy',$busoperator) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-warning">Confirm Delete</button>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    
@endsection