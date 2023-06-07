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

                        <div class="card-body">
                            <div class="form-group">
                                <label for="lead_about">Lead About</label>
                                <textarea class="form-control" id="lead_about" rows="8" readonly>{{ $about->lead_about }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="about_us">Tentang Kami</label>
                                <textarea class="form-control" rows="8" id="about_us" readonly>{{ $about->about_us }}</textarea>
                            </div>

                        </div>
                        <!-- /.card-body -->

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
                        <form enctype="multipart/form-data"
                            action="{{ url('admin/abouts') . '/' . $about->id . '/update-image' }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="card-body">
                                <img class="img-fluid pad" src="{{ $about->image }}" alt="studio-image">
                                <div class="form-group">
                                    <label for="customFile">File Gambar</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input @error('image') is-invalid @enderror"
                                            id="customFile" name="image">
                                        <label class="custom-file-label" for="customFile">Pilih file gambar</label>
                                    </div>
                                    @error('image')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Ubah Gambar</button>
                                </div>
                                <!-- /.card-body -->
                        </form>
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
