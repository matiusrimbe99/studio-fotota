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
                    <h3 class="card-title">Edit Cara Pesan</h3>
                </div>

                <form action="{{ url('admin/order-methods') }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="first">Langkah 1</label>
                                    <textarea name="first" id="first" class="form-control @error('first') is-invalid @enderror" rows="6"
                                        placeholder="Masukkan langkah pertama">{{ $orderMethod->first }}</textarea>
                                    @error('first')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="third">Langkah 3</label>
                                    <textarea name="third" id="third" class="form-control @error('third') is-invalid @enderror" rows="6"
                                        placeholder="Masukkan langkah ketiga">{{ $orderMethod->third }}</textarea>
                                    @error('third')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="second">Langkah 2</label>
                                    <textarea name="second" id="second" class="form-control @error('second') is-invalid @enderror" rows="6"
                                        placeholder="Masukkan langkah kedua">{{ $orderMethod->second }}</textarea>
                                    @error('second')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="fourth">Langkah 4</label>
                                    <textarea name="fourth" id="fourth" class="form-control @error('fourth') is-invalid @enderror" rows="6"
                                        placeholder="Masukkan langkah keempat">{{ $orderMethod->fourth }}</textarea>
                                    @error('fourth')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="card-footer">
                        <a href="{{ url('admin/order-methods') }}" class="btn btn-secondary float-left">Batalkan</a>
                        <button type="submit" class="btn btn-success float-right">Ubah Cara Pesan</button>
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
