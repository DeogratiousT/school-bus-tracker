@extends('layouts.app')

@section('content')

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('busoperators.index') }}">Bus Operator</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('busoperators.show', $busoperator) }}">{{ $busoperator->name }}</a></li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </div>
                <h4 class="page-title">Bus Operators</h4>
            </div>
        </div>
    </div>     
    <!-- end page title --> 

    {{-- my Container --}}
    <div class="container">
        <!-- Delete Bus Operator -->
        <div style="float:right">
            <button class="btn btn-danger" data-toggle="modal" data-target="#delete-modal">Delete Bus Operator</button>
        </div><br><br>
        <!-- End Delete Bus Operator -->

        
        <form action="{{ route('busoperators.update',$busoperator) }}" method="POST">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="name">Full Name</label>
                <input class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" type="text" id="name" name="name" placeholder="Enter the Bus Operator's Full Name" value="{{ $busoperator->name }}" required>
                @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('name') }}
                    </span>
                @endif
            </div>
    
            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input class="form-control {{ $errors->has('phone') ? ' is-invalid' : '' }}" id="phone" name="phone" placeholder="Bus Operator's Phone" value="{{ $busoperator->phone }}" type="number">
                @if ($errors->has('phone'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('phone') }}
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" id="email" name="email" placeholder="Bus Operator's Email" value="{{ $busoperator->email }}" type="email">
                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('email') }}
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="nationalId">National ID Number</label>
                <input class="form-control {{ $errors->has('nationalId') ? ' is-invalid' : '' }}" id="nationalId" name="nationalId" placeholder="busoperator's National ID" value="{{ $busoperator->nationalId }}" type="number">
                @if ($errors->has('nationalId'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('nationalId') }}
                    </span>
                @endif
            </div>

            <div class="form-group mb-0 text-center">
                <button class="btn btn-primary btn-block" type="submit">
                    <i class="mdi mdi-content-save"></i> Update 
                </button>
            </div>
        </form>

        <!-- Delete modal -->
        <div id="delete-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="delete-modalLabel">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header modal-colored-header bg-warning">
                        <h4 class="modal-title" id="delete-modalLabel">Delete Bus Operator</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <div class="text-center">
                            <p>Are you sure that you want to delete <b>{{$busoperator->name}}</b> ?</p>
                            <i class="dripicons-warning h1 text-warning"></i> <br> <br> 
                            <p>Deleting this Bus Operator removes all links betweens this Bus Operator and related Buses</p>
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


    </div>      
        
@endsection