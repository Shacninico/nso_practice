@extends('admin.admin_dashboard')
@section('admin')
    <!-- Plugin css for this page -->


    <div class="page-content">

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Tables</a></li>
                <li class="breadcrumb-item" aria-current="page">Main List</li>
                <li class="breadcrumb-item active"><a href="#">Tables</a></li>
            </ol>
        </nav>

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
                                        <th>NAME</th>
                                        <th>SEX</th>
                                        <th>BIRTHDAY</th>
                                        <th>EMAIL</th>
                                        <th>CONTACT NUMBER</th>
                                        <th>ADDRESS</th>
                                        <th>STATUS</th>
                                        <th>ACTION</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Tiger Nixon</td>
                                        <td>System Architect</td>
                                        <td>Edinburgh</td>
                                        <td>61</td>
                                        <td>2011/04/25</td>
                                        <td>$320,800</td>
                                        <td>$320,800</td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
