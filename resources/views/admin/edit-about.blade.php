@extends('admin_templates.app')
@section('title-app', $title)
@section('css-app')
@endsection
@section('main-content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Data Tentang Kami</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ url('admin/abouts') . '/' . $about->id }}" method="POST">
                            @csrf
                            @method('PATCH')

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="lead_about">Lead About</label>
                                    <textarea class="form-control @error('lead_about') is-invalid @enderror" id="lead_about" name="lead_about"
                                        rows="8">{{ $about->lead_about }}</textarea>
                                    @error('lead_about')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="about_us">Tentang Kami</label>
                                    <textarea class="form-control @error('about_us') is-invalid @enderror" id="about_us" name="about_us" rows="8">{{ $about->about_us }}</textarea>
                                    @error('about_us')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Ubah Tentang Kami</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (left) -->
                <!-- right column -->
                <div class="col-md-6">
                    <!-- Form Element sizes -->
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Gambar Tentang Kami</h3>
                        </div>
                        <div class="card-body">
                            <img class="img-fluid pad" src="{{ $about->image }}" alt="studio-image">
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
@section('script-app')
    <!-- bs-custom-file-input -->
    <script src="{{ asset('admin/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <!-- Page specific script -->
    <script>
        $(function() {
            bsCustomFileInput.init();
        });
    </script>
@endsection
