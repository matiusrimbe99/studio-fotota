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
                                        class="form-control" placeholder="Masukkan nama pelanggan">
                                </div>
                                <div class="form-group">
                                    <label for="">Username</label>
                                    <input value="{{ $user->username }}" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input value="{{ $user->email }}" class="form-control" readonly>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="address">Alamat</label>
                                    <input type="text" value="{{ $user->customer->address }}" id="address"
                                        name="address" class="form-control" placeholder="Masukkan alamat pelanggan">
                                </div>
                                <div class="form-group">
                                    <label for="gender">Jenis Kelamin</label>
                                    <select name="gender" class="form-control" id="gender">
                                        <option disabled>Pilih Jenis Kelamin</option>
                                        <option value="1">Laki-Laki</option>
                                        <option value="2">Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="nomor_hp">Nomor HP</label>
                                    <input type="text" value="{{ $user->customer->nomor_hp }}" id="nomor_hp"
                                        name="nomor_hp" class="form-control" placeholder="Masukkan nomor hp pelanggan">
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
