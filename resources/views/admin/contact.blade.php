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
                    <h3 class="card-title">Data Kontak & Rekening</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Whatsapp</label>
                                <input value="{{ $contact->whatsapp }}" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Facebook</label>
                                <input value="{{ $contact->facebook }}" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Instagram</label>
                                <input value="{{ $contact->instagram }}" class="form-control" readonly>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nomor Rekening</label>
                                <input value="{{ $contact->account_number }}" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Nama di Rekening</label>
                                <input value="{{ $contact->name_on_account }}" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label for="nomor_hp">Nama Bank</label>
                                <input value="{{ $contact->bank_name }}" class="form-control" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Cara Pesan</label>
                                <textarea class="form-control" rows="3" readonly>{{ $contact->method_order }}</textarea>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="card-footer">
                    <a href="{{ url('admin/contacts/edit') }}" class="btn btn-success float-left">Edit
                        Kontak & Rekening</a>
                </div>

            </div>

            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
@section('script-app')
@endsection
