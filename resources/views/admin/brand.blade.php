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

                        <div class="card-body">
                            @if (session('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <div class="form-group">
                                <label for="brand_name">Nama Brand</label>
                                <input type="text" class="form-control" id="brand_name" value="{{ $brand->brand_name }}"
                                    readonly>
                            </div>
                            <div class="form-group">
                                <label for="address">Alamat Brand</label>
                                <input type="text" id="address" class="form-control" value="{{ $brand->address }}"
                                    readonly>
                            </div>
                            <div class="form-group">
                                <label for="description">Deskripsi</label>
                                <textarea class="form-control" id="description" rows="3" readonly>{{ $brand->description }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="about">Tentang Kami</label>
                                <textarea class="form-control" id="about" rows="8" readonly>{{ $brand->about }}</textarea>
                            </div>

                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <a href="{{ url('admin/brands') . '/' . $brand->id . '/edit' }}" class="btn btn-primary">Edit
                                Data
                                Profil</a>
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
                            <h3 class="card-title">Gambar Profil Studio</h3>
                        </div>
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <img class="img-fluid pad" src="{{ $brand->image }}" alt="studio-image">
                        </div>
                        <div class="card-footer">
                            <a href="{{ url('admin/brands') . '/' . $brand->id . '/edit-image' }}"
                                class="btn btn-primary">Ganti Gambar Profil</a>
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
