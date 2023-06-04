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
                                        class="form-control @error('whatsapp') is-invalid @enderror"
                                        placeholder="Masukkan nomor whatsapp">
                                    @error('whatsapp')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="facebook">Facebook</label>
                                    <input type="text" value="{{ $contact->facebook }}"
                                        class="form-control @error('facebook') is-invalid @enderror" id="facebook"
                                        name="facebook" class="form-control" placeholder="Masukkan akun facebook">
                                    @error('facebook')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="instagram">Instagram</label>
                                    <input type="text" id="instagram" value="{{ $contact->instagram }}"
                                        class="form-control @error('instagram') is-invalid @enderror" name="instagram"
                                        placeholder="Masukkan akun instagram">
                                    @error('instagram')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="account_number">Nomor Rekening</label>
                                    <input type="text" value="{{ $contact->account_number }}" id="account_number"
                                        name="account_number"
                                        class="form-control @error('account_number') is-invalid @enderror"
                                        placeholder="Masukkan nomor rekening">
                                    @error('account_number')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="name_on_account">Nama di Rekening</label>
                                    <input type="text" value="{{ $contact->name_on_account }}" id="name_on_account"
                                        name="name_on_account"
                                        class="form-control @error('name_on_account') is-invalid @enderror"
                                        placeholder="Masukkan nama di rekening">
                                    @error('name_on_account')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="bank_name">Nama Bank</label>
                                    <input type="text" value="{{ $contact->bank_name }}" id="bank_name" name="bank_name"
                                        class="form-control @error('bank_name') is-invalid @enderror"
                                        placeholder="Masukkan nama bank">
                                    @error('bank_name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="method_order">Cara Pesan</label>
                                    <textarea name="method_order" id="method_order" class="form-control @error('method_order') is-invalid @enderror"
                                        rows="3" placeholder="Masukkan cara pesan">{{ $contact->method_order }}</textarea>
                                    @error('method_order')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
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
