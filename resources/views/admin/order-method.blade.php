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
                    <h3 class="card-title">Data Cara Pesan</h3>
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
                                <label id="first">Langkah 1</label>
                                <textarea class="form-control" rows="6" id="first" readonly>{{ $orderMethod->first }}</textarea>
                            </div>
                            <div class="form-group">
                                <label id="third">Langkah 3</label>
                                <textarea class="form-control" rows="6" id="third" readonly>{{ $orderMethod->third }}</textarea>
                            </div>

                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label id="second">Langkah 2</label>
                                <textarea class="form-control" rows="6" id="second" readonly>{{ $orderMethod->second }}</textarea>
                            </div>
                            <div class="form-group">
                                <label id="fourth">Langkah 4</label>
                                <textarea class="form-control" rows="6" id="fourth" readonly>{{ $orderMethod->fourth }}</textarea>
                            </div>

                        </div>
                    </div>


                </div>

                <div class="card-footer">
                    <a href="{{ url('admin/order-methods/edit') }}" class="btn btn-success float-left">Edit
                        Cara Pesan</a>
                </div>

            </div>

            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
@section('script-app')
@endsection
