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
                    <h3 class="card-title">Edit Data Pengguna</h3>
                </div>

                <form action="{{ url('admin/users' . '/' . $user->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Nama Pengguna</label>
                                    <input type="text" value="{{ $user->customer->name }}" id="name" name="name"
                                        class="form-control @error('name') is-invalid @enderror"
                                        placeholder="Masukkan nama pelanggan">
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input id="username" value="{{ $user->username }}" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input id="email" value="{{ $user->email }}" class="form-control" readonly>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="address">Alamat</label>
                                    <input type="text" value="{{ $user->customer->address }}" id="address"
                                        name="address" class="form-control @error('address') is-invalid @enderror"
                                        placeholder="Masukkan alamat pelanggan">
                                    @error('address')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="gender">Jenis Kelamin</label>
                                    <select name="gender" class="form-control @error('gender') is-invalid @enderror"
                                        id="gender">
                                        <option value="">Pilih Jenis Kelamin</option>
                                        <option value="1">Laki-Laki</option>
                                        <option value="2">Perempuan</option>
                                    </select>
                                    @error('gender')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="nomor_hp">Nomor HP</label>
                                    <input type="text" value="{{ $user->customer->nomor_hp }}" id="nomor_hp"
                                        name="nomor_hp" class="form-control @error('nomor_hp') is-invalid @enderror"
                                        placeholder="Masukkan nomor hp pelanggan">
                                    @error('nomor_hp')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="card-footer">
                        <a href="{{ url('admin/users' . '/' . $user->id) }}"
                            class="btn btn-secondary float-left">Batalkan</a>
                        <button type="submit" class="btn btn-success float-right">Ubah Pengguna</button>
                    </div>
                </form>
            </div>

            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
@section('script-app')
@endsection
