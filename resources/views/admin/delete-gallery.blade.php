@extends('admin_templates.app')
@section('title-app', $titleApp)
@section('css-app')
@endsection
@section('main-content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Daftar Galeri Foto</h3>
                        </div>
                        <div class="card-body p-0">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No. Urut</th>
                                        <th>Deskripsi</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $nomor = 1; ?>
                                    @foreach ($galleries as $gallery)
                                        <tr>
                                            <td>{{ $nomor++ }}</td>
                                            <td>{{ $gallery->description }}</td>
                                            <td class="text-right py-0 align-middle">
                                                <div class="btn-group">
                                                    <form action="{{ url('admin/galleries') . '/' . $gallery->id }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <a href="{{ $gallery->image }}" target="_blank"
                                                            class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
                                                        <button type="submit" class="btn btn-danger btn-sm float-right"><i
                                                                class="fas fa-trash"></i></button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <div class="col-md-1"></div>
            </div>
            <div class="row pb-3">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <a href="{{ url('admin/galleries') }}" class="btn btn-secondary float-right">Batalkan</a>
                </div>
                <div class="col-md-1"></div>
            </div>
        </div>
    </section>
@endsection
@section('script-app')
@endsection
