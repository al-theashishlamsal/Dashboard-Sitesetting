@extends('admin.layouts.master')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Site Settings List</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Government Name</th>
                                <th>Ministry Name</th>
                                <th>Department Name</th>
                                <th>Office Name</th>
                                <th>Office Address</th>
                                <th>Phone Number</th>
                                <th>Email</th>
                                <th>Slogan</th>
                                <th>Main Logo</th>
                                <th>Side Logo</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($siteSettings as $setting)
                                <tr>
                                    <td>{{ $setting->govn_name }}</td>
                                    <td>{{ $setting->ministry_name }}</td>
                                    <td>{{ $setting->department_name }}</td>
                                    <td>{{ $setting->office_name }}</td>
                                    <td>{{ $setting->office_address }}</td>
                                    <td>{{ $setting->office_contact }}</td>
                                    <td>{{ $setting->office_mail }}</td>
                                    <td>{{ $setting->slogan }}</td>

                                    <td>
                                        <img src="{{ asset("uploads/sitesetting/" . $setting->main_logo) }}" alt="Main Logo" style="width: 50px; height: 50px;">
                                    </td>
                                    <td>
                                        <img src="{{ asset("uploads/sitesetting/" . $setting->side_logo) }}" alt="Side Logo" style="width: 50px; height: 50px;">
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.sitesetting.edit', $setting->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                        <!-- Add delete button or other actions if needed -->
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </section>
@endsection
