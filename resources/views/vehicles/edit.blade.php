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
                        <li class="breadcrumb-item"><a href="{{ route('vehicles.show',$vehicle) }}">{{ $vehicle->plateNo }}</a></li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </div>
                <h4 class="page-title">Vehicles</h4>
            </div>
        </div>
    </div>     
    <!-- end page title --> 

    {{-- my Container --}}
    <div class="container">
        <div class="float-left">
            <a href="{{ route('vehicles.index') }}" class=" text-info mb-2"><i class="mdi mdi-chevron-double-left mr-2"></i>Vehicles</a>
        </div> 
        <br> <hr>
        <form action="{{ route('vehicles.update',$vehicle) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="type">Type</label>
                <select class="form-control {{ $errors->has('type') ? ' is-invalid' : '' }}" name="type" id="type">
                    @foreach (config('bus.type') as $type)
                        <option @if($vehicle->type == $type) selected @endif value="{{ $type }}">{{ $type }}</option> 
                    @endforeach
                </select>
                @if ($errors->has('type'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('type') }}
                    </span>
                @endif
            </div>
    
            <div class="form-group">
                <label for="plateNo">Plate Number</label>
                <input class="form-control {{ $errors->has('plateNo') ? ' is-invalid' : '' }}" id="plateNo" name="plateNo" placeholder="Bus plateNo" value="{{ $vehicle->plateNo }}" type="text">
                @if ($errors->has('plateNo'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('plateNo') }}
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="capacity">Capacity</label>
                <input class="form-control {{ $errors->has('capacity') ? ' is-invalid' : '' }}" id="capacity" name="capacity" placeholder="Bus Capacity" value="{{ $vehicle->capacity }}" type="number">
                @if ($errors->has('capacity'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('capacity') }}
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="driver_id">Driver</label>
                <select class="form-control {{ $errors->has('driver_id') ? ' is-invalid' : '' }}" name="driver_id" id="driver_id">
                    @foreach ($drivers as $driver)
                        <option @if($vehicle->driver->name == $driver->name) selected @endif value="{{ $driver->id }}">{{ $driver->name }}</option> 
                    @endforeach
                </select>
                @if ($errors->has('driver_id'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('driver_id') }}
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="assistant_id">Assistant</label>
                <select class="form-control {{ $errors->has('assistant_id') ? ' is-invalid' : '' }}" name="assistant_id" id="assistant_id">
                    @foreach ($assistants as $assistant)
                        <option @if($vehicle->assistant->name == $assistant->name) selected @endif value="{{ $assistant->id }}">{{ $assistant->name }}</option> 
                    @endforeach
                </select>
                @if ($errors->has('assistant_id'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('assistant_id') }}
                    </span>
                @endif
            </div>
    

            <div class="form-group mb-0 text-center">
                <button class="btn btn-primary btn-block" type="submit">
                    <i class="mdi mdi-content-save"></i> Submit
                </button>
            </div>
        </form>
    </div>      
    
@endsection