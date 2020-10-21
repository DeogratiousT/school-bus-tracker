@extends('layouts.app')

@section('content')

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('pupils.index') }}">Pupils</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('pupils.show',$pupil) }}">{{ $pupil->name }}</a></li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </div>
                <h4 class="page-title">Pupils</h4>
            </div>
        </div>
    </div>     
    <!-- end page title --> 
  
    <!-- Container -->
    <div class="container">
        <!-- Delete Pupil -->
        <div style="float:right">
            <button class="btn btn-danger" data-toggle="modal" data-target="#delete-modal">Delete Pupil</button>
        </div><br> <br>
        <!-- End Delete Pupil -->

        <form action="{{ route('pupils.update',$pupil) }}" method="POST">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="name">Full Name</label>
                <input class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" type="text" id="name" name="name" value="{{ $pupil->name }}" placeholder="Enter the Pupil's name" required>
                @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('name') }}
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="admissionNo">Admission Number</label>
                <input class="form-control {{ $errors->has('admissionNo') ? ' is-invalid' : '' }}" id="admissionNo" name="admissionNo" placeholder="Pupil's admissionNo" value="{{ $pupil->admissionNo }}" type="number">
                @if ($errors->has('admissionNo'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('admissionNo') }}
                    </span>
                @endif
            </div>
            
            <div class="form-group">
                <label for="grade">Grade</label>
                <select class="form-control {{ $errors->has('grade') ? ' is-invalid' : '' }}" name="grade" id="grade">
                    @foreach ($grades as $grade)
                        <option @if($pupil->grade == $grade) selected @endif value="{{ $grade }}">{{ $grade }}</option>
                    @endforeach
                </select>
                @if ($errors->has('grade'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('grade') }}
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="gender">Gender</label>
                <select class="form-control {{ $errors->has('gender') ? ' is-invalid' : '' }}" name="gender" id="gender">
                    @foreach (config('pupil.gender') as $gender)
                        <option @if($pupil->gender == $gender) selected @endif value="{{ $gender }}">{{ $gender }}</option>
                    @endforeach
                </select>
                @if ($errors->has('gender'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('gender') }}
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="age">Age</label>
                <input class="form-control {{ $errors->has('age') ? ' is-invalid' : '' }}" id="age" name="age" placeholder="Pupil's Age" value="{{ $pupil->age }}" type="number">
                @if ($errors->has('age'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('age') }}
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="disabilities">Disabilities</label>
                <input class="form-control {{ $errors->has('disabilities') ? ' is-invalid' : '' }}" id="disabilities" name="disabilities" placeholder="Pupil's Disabilities" value="{{ $pupil->disabilities }}" type="text">
                @if ($errors->has('disabilities'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('disabilities') }}
                    </span>
                @endif
            </div>

            <div class="form-group mb-0 text-center">
                <button class="btn btn-primary btn-block" type="submit">
                    <i class="mdi mdi-content-save"></i> Submit
                </button>
            </div>
        </form>

        <!-- Delete modal -->
        <div id="delete-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="delete-modalLabel">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header modal-colored-header bg-warning">
                        <h4 class="modal-title" id="delete-modalLabel">Delete Pupil</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <div class="text-center">
                            <p>Are you sure that you want to delete <b>{{$pupil->name}}</b> ?</p>
                            <i class="dripicons-warning h1 text-warning"></i> <br> <br> 
                            <p>Deleting this pupil removes all links betweens this pupil and related parents</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-dismiss="modal">No</button>
                        <form action="{{ action('PupilController@destroy',$pupil) }}" method="POST">
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