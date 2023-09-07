@extends('admin.admin_dashboard')
@section('admin')
    <!-- Plugin css for this page -->


    <div class="page-content">

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.scholars') }}">Main List</a></li>
                
            </ol>
        </nav>
        <div id="row">
            <form action="{{ route('scholars.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="form-control">
                <br>
                <button class="btn btn-success">Import Scholars Data</button>
                <a class="btn btn-warning" href="{{ route('scholars.export') }}">Export Scholar Data</a>
                <a class="btn btn-error" href="{{ route('scholars.delete.all') }}">Delete All Data</a>
            </form>
        <hr>          
        </div>

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">DOST1 Scholars</h6>
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                    <tr>
                                        <th>SPAS ID</th>
                                        <th>YEAR</th>
                                        <th>PROGRAM</th>
                                        <th>NAME</th>
                                        <th>SEX</th>
                                        <th>BIRTHDAY</th>
                                        <th>EMAIL</th>
                                        <th>Number</th>
                                        <th>ADDRESS</th>
                                        <th>STATUS</th>
                                        <th>ACTION</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($scholarsProfile as $scho)
                                        <tr>
                                            <td> {{ $scho->spas_id }}</td>
                                            <td>{{ $scho->year_of_award }}</td>
                                            <td>{{ $scho->program }}</td>
                                            <td>{{ $scho->fullname }}</td>
                                            <td>{{ $scho->sex }}</td>
                                            <td>{{ $scho->birthday }}</td>
                                            <td>{{ $scho->email }}</td>
                                            <td>{{ $scho->contact_number }}</td>
                                            <td>{{ $scho->address }}</td>
                                            <td>{{ $scho->status }}</td>
                                            <td>
                                                <button type="button" class="btn btn-success btn-icon">
                                                    <i data-feather="eye"></i>
                                                </button>
                                                <button type="button" class="btn btn-primary btn-icon">
                                                    <i data-feather="edit"></i>
                                                </button>
                                                <button type="button" class="btn btn-danger btn-icon">
                                                    <i data-feather="trash"></i>
                                                </button>
                                            </td>

                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
