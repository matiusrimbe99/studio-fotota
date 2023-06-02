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
                    <h3 class="card-title">Edit Kontak & Rekening</h3>
                </div>

                <form action="{{ url('admin/contacts') }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="whatsapp">Whatsapp</label>
                                    <input type="text" value="{{ $contact->whatsapp }}" id="whatsapp" name="whatsapp"
                                        class="form-control" placeholder="Masukkan nomor whatsapp">
                                </div>
                                <div class="form-group">
                                    <label for="facebook">Facebook</label>
                                    <input type="text" value="{{ $contact->facebook }}" class="form-control"
                                        id="facebook" name="facebook" class="form-control"
                                        placeholder="Masukkan akun facebook">
                                </div>
                                <div class="form-group">
                                    <label for="instagram">Instagram</label>
                                    <input type="text" id="instagram" value="{{ $contact->instagram }}"
                                        class="form-control" name="instagram" class="form-control"
                                        placeholder="Masukkan akun instagram">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="account_number">Nomor Rekening</label>
                                    <input type="text" value="{{ $contact->account_number }}" id="account_number"
                                        name="account_number" class="form-control" placeholder="Masukkan nomor rekening">
                                </div>
                                <div class="form-group">
                                    <label for="name_on_account">Nama di Rekening</label>
                                    <input type="text" value="{{ $contact->name_on_account }}" id="name_on_account"
                                        name="name_on_account" class="form-control" placeholder="Masukkan nama di rekening">
                                </div>
                                <div class="form-group">
                                    <label for="bank_name">Nama Bank</label>
                                    <input type="text" value="{{ $contact->bank_name }}" id="bank_name" name="bank_name"
                                        class="form-control" placeholder="Masukkan nama bank">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Cara Pesan</label>
                                    <textarea name="method_order" class="form-control" rows="3" placeholder="Masukkan cara pesan">{{ $contact->method_order }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <a href="{{ url('admin/contacts') }}" class="btn btn-secondary float-left">Batalkan</a>
                        <button type="submit" class="btn btn-success float-right">Ubah Kontak & Rekening</button>
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
