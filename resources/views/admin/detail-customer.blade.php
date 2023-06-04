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
                                <label for="name">Nama Pelanggan</label>
                                <input id="name" value="{{ $customer->name }}" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input id="username" value="{{ $customer->user->username }}" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" value="{{ $customer->user->email }}" class="form-control" readonly>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="address">Alamat</label>
                                <input id="address" value="{{ $customer->address }}" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label for="gender">Jenis Kelamin</label>
                                <input id="gender" value="{{ $customer->gender }}" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label for="nomor_hp">Nomor HP</label>
                                <input id="nomor_hp" value="{{ $customer->nomor_hp }}" class="form-control" readonly>
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
