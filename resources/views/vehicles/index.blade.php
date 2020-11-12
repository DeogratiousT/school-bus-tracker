@extends('layouts.app')

@section('content')
            
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">Vehicles</li>
                    </ol>
                </div>
                <h4 class="page-title">Vehicles</h4>
            </div>
        </div>
    </div>     
    <!-- end page title --> 

    {{-- my Container --}}
    <div class="container">
        <div class="float-right">
            <a href="{{ route('vehicles.create') }}" class="btn btn-info"><i class="mdi mdi-plus-circle mr-2"></i> Add Vehicle</a>
        </div> 
        <br><br><hr>
        <table id="vehicle-laratable" class="table table-centered w-100 dt-responsive nowrap">
            <thead class="thead-light">
                <tr>
                    <th>Type</th>
                    <th>Plate No.</th>
                    <th>Capacity</th>
                    <th>Driver</th>
                    <th>Bus Assistant</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
    </div>
    
    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        $(document).ready(function(){
            $("#vehicle-laratable").DataTable({
                serverSide: true,
                ajax: "{{ route('vehicles.index') }}",
                columns: [
                    { name: 'type' },
                    { name: 'plateNo' },
                    { name: 'capacity'},
                    { name: 'driver'},
                    { name: 'assistant'},
                    { name: 'action' , orderable: false, searchable: false }                                
                ]
            });
        });
    </script>
   
@endsection

