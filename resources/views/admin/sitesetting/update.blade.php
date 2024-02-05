@extends('admin.layouts.master')

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <form id="quickForm" method="POST" action="{{ route('admin.sitesetting.update') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $sitesetting->id }}">
                
                <div class="form-group">
                    <label for="govn_name">Government Name</label>
                    <input type="text" name="govn_name" class="form-control" value="{{ $sitesetting->govn_name ?? '' }}" placeholder="Government Name">
                </div>

                <div class="form-group">
                    <label for="ministry_name">Ministry Name</label>
                    <input type="text" name="ministry_name" class="form-control" value="{{ $sitesetting->ministry_name ?? '' }}" placeholder="Ministry Name">
                </div>

                <div class="form-group">
                    <label for="department_name">Department Name</label>
                    <input type="text" name="department_name" class="form-control" value="{{ $sitesetting->department_name ?? '' }}" placeholder="Department Name">
                </div>

                <div class="form-group">
                    <label for="office_name">Office Name</label>
                    <input type="text" name="office_name" class="form-control" value="{{ $sitesetting->office_name ?? '' }}" placeholder="Office Name">
                </div>

                <div class="form-group">
                    <label for="office_address">Office Address</label>
                    <input type="text" name="office_address" class="form-control" value="{{ $sitesetting->office_address ?? '' }}" placeholder="Address">
                </div>

                <div class="form-group">
                    <label for="office_contact">Office Contact</label>
                    <input type="text" name="office_contact" class="form-control" value="{{ $sitesetting->office_contact ?? '' }}" placeholder="Office Contact">
                </div>

                <div class="form-group">
                    <label for="office_mail">Office Email</label>
                    <input type="email" name="office_mail" class="form-control" value="{{ $sitesetting->office_mail ?? '' }}" placeholder="Email">
                </div>

                <div class="form-group">
                    <label for="slogan">Slogan</label>
                    <input type="text" name="slogan" class="form-control" value="{{ $sitesetting->slogan ?? '' }}" placeholder="Slogan">
                </div>

                <div class="form-group">
                    <label for="main_logo">Main Logo</label>
                    <input type="file" name="main_logo" class="form-control" placeholder="Main Logo">
                </div>

                <div class="form-group">
                    <label for="side_logo">Side Logo</label>
                    <input type="file" name="side_logo" class="form-control" placeholder="Side Logo">
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </section>
    <!-- /.content -->

    <script>
        const previewImage = (e,id) => {
            const reader = new FileReader();
            reader.readAsDataURL(e.target.files[0]);
            reader.onload = () => {
                const preview = document.getElementById('preview');
                preview.src = reader.result;
            };
        };
    </script>
@endsection
