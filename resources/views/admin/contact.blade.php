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
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="whatsapp">Whatsapp</label>
                                <input value="{{ $contact->whatsapp }}" class="form-control" id="whatsapp" readonly>
                            </div>
                            <div class="form-group">
                                <label for="facebook">Facebook</label>
                                <input value="{{ $contact->facebook }}" class="form-control" id="facebook" readonly>
                            </div>
                            <div class="form-group">
                                <label for="instagram">Instagram</label>
                                <input value="{{ $contact->instagram }}" class="form-control" id="instagram" readonly>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="norek">Nomor Rekening</label>
                                <input value="{{ $contact->account_number }}" class="form-control" id="norek" readonly>
                            </div>
                            <div class="form-group">
                                <label for="name_on_account">Nama di Rekening</label>
                                <input value="{{ $contact->name_on_account }}" class="form-control" id="name_on_account"
                                    readonly>
                            </div>
                            <div class="form-group">
                                <label for="bank_name">Nama Bank</label>
                                <input value="{{ $contact->bank_name }}" class="form-control" id="bank_name" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label id="method_order">Cara Pesan</label>
                                <textarea class="form-control" rows="3" id="method_order" readonly>{{ $contact->method_order }}</textarea>
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
