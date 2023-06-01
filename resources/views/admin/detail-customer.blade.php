@extends('admin_templates/app')
@section('title-app', $titleApp)
@section('css-app')
@endsection
@section('main-content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Detail Data Pelanggan</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nama Pelanggan</label>
                                <input value="{{ $customer->name }}" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Username</label>
                                <input value="{{ $customer->user->username }}" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input value="{{ $customer->user->email }}" class="form-control" readonly>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Alamat</label>
                                <input value="{{ $customer->address }}" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Jenis Kelamin</label>
                                <input value="{{ $customer->gender }}" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label for="nomor_hp">Nomor HP</label>
                                <input value="{{ $customer->nomor_hp }}" class="form-control" readonly>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="card-footer">
                    <a href="{{ url('admin/customers') }}" class="btn btn-secondary float-left">Tutup</a>
                </div>

            </div>

            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
@section('script-app')
@endsection
