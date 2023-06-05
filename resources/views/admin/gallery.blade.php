@extends('admin_templates.app')
@section('title-app', $titleApp)
@section('css-app')
    <!-- Ekko Lightbox -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/ekko-lightbox/ekko-lightbox.css') }}">
@endsection
@section('main-content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4 class="card-title">Daftar Galeri Foto</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="btn-group mb-5 float-right">
                                        <a href="{{ url('admin/galleries/create') }}" class="btn btn-success ">Tambah</a>
                                        <a href="{{ url('admin/galleries/delete') }}" class="btn btn-warning ">Hapus</a>
                                        <a class="btn btn-danger float-right" data-toggle="modal"
                                            data-target="#modal-delete-galleries">Hapus
                                            Semua</a>


                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                @foreach ($galleries as $gallery)
                                    <div class="col-sm-2">
                                        <a href="{{ $gallery->image }}" data-toggle="lightbox"
                                            data-title="{{ $gallery->description }}" data-gallery="gallery">
                                            <img src="{{ $gallery->image }}" class="img-fluid mb-2" alt="white sample" />
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Modal -->
    <div class="modal fade" id="modal-delete-galleries" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Hapus Semua Galeri</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda yakin ingin menghapus?</p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <form action="{{ url('admin/galleries') }}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-success float-right">Ya, Hapus</button>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@endsection
@section('script-app')
    <!-- Ekko Lightbox -->
    <script src="{{ asset('admin/plugins/ekko-lightbox/ekko-lightbox.min.js') }}"></script>

    <!-- Page specific script -->
    <script>
        $(function() {
            $(document).on('click', '[data-toggle="lightbox"]', function(event) {
                event.preventDefault();
                $(this).ekkoLightbox({
                    alwaysShowClose: true
                });
            });
        })
    </script>
@endsection
