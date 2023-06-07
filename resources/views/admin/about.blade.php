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

                        <div class="card-body">
                            @if (session('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <div class="form-group">
                                <label for="lead_about">Lead About</label>
                                <textarea class="form-control" id="lead_about" rows="8" readonly>{{ $about->lead_about }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="about_us">Tentang Kami</label>
                                <textarea class="form-control" id="about_us" rows="8" readonly>{{ $about->about_us }}</textarea>
                            </div>

                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <a href="{{ url('admin/abouts') . '/' . $about->id . '/edit' }}" class="btn btn-primary">Edit
                                Tentang Kami
                            </a>
                        </div>

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
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <img class="img-fluid pad" src="{{ $about->image }}" alt="studio-image">
                        </div>
                        <div class="card-footer">
                            <a href="{{ url('admin/abouts') . '/' . $about->id . '/edit-image' }}"
                                class="btn btn-primary">Ganti Gambar</a>
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
@endsection
