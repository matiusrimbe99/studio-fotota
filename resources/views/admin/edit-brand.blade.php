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
                            <h3 class="card-title">Data Profil Studio</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ url('admin/brands') . '/' . $brand->id }}" method="POST">
                            @csrf
                            @method('PATCH')

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="">Nama Brand</label>
                                    <input type="text" name="brand_name" class="form-control"
                                        value="{{ $brand->brand_name }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Alamat Brand</label>
                                    <input type="text" name="address" class="form-control" value="{{ $brand->address }}">
                                </div>
                                <div class="form-group">
                                    <label>Deskripsi</label>
                                    <textarea class="form-control" name="description" rows="3">{{ $brand->description }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label>Tentang Kami</label>
                                    <textarea class="form-control" name="about" rows="8">{{ $brand->about }}</textarea>
                                </div>

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Ubah Data
                                    Profil</button>
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
                            <h3 class="card-title">Gambar Profil Studio</h3>
                        </div>
                        <div class="card-body">
                            <img class="img-fluid pad" src="{{ $brand->image }}" alt="studio-image">
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
