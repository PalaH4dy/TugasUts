@extends('layout.main')
@section('content')
    <section class="content home">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Data Proges</h2>
                <small class="text-muted">Welcome to Swift application</small>
            </div>

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    {{-- modal tambah --}}
                    <button type="button" class="btn btn-success waves-effect m-r-20 mb-3" data-toggle="modal"
                        data-target="#defaultModal">Tambah Data</button>
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Progres</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        @foreach ($progres as $dt)
                            <tbody>
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $dt->progres }}</td>
                                    <td>
                                        {{-- modal edit --}}
                                        <button type="button" class="btn btn-success " data-toggle="modal"
                                            data-target="#editModal{{ $dt->id_progres }}"><i
                                                class="material-icons">mode_edit</i> </button>
                                        {{-- modal delete --}}
                                        <button type="button" class="btn btn-danger " data-toggle="modal"
                                            data-target="#deleteModal{{ $dt->id_progres }}"><i
                                                class="material-icons">delete</i> </button>
                                    </td>
                                </tr>
                            </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </section>
    {{-- modal tambah --}}
    <div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">Tambah Data</h4>
                </div>
                <div class="modal-body">
                    <form action="{{ route('storeprogres') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <div class="form-line">
                                <label for="progres" class="text-dark">Bagian</label>
                                <input type="text" name="progres" class="form-control" placeholder="input data">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary waves-effect">Simpan</button>
                            <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- modal update --}}
    @foreach ($progres as $dt)
        <div class="modal fade" id="editModal{{ $dt->id_progres }}" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="defaultModalLabel">Edit Data</h4>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('updateprogres', $dt->id_progres) }}" method="POST">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <div class="form-line">
                                    <label for="progres" class="text-dark">Bagian</label>
                                    <input type="text" name="progres" class="form-control" value="{{ $dt->progres }}">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary waves-effect">Simpan</button>
                                <button type="button" class="btn btn-danger waves-effect"
                                    data-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    {{-- modal delete --}}
    @foreach ($progres as $dt)
        <div class="modal fade" id="deleteModal{{ $dt->id_progres }}" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="defaultModalLabel">Hapus</h4>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('deleteprogres', $dt->id_progres) }}" method="POST">
                            @csrf
                            @method('delete')
                            <div class="form-group">
                                <div class="form-line">
                                    <label for="progres" class="text-dark">Bagian</label>
                                    <input type="text" name="progres" class="form-control" value="{{ $dt->progres }}">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-danger waves-effect">Hapus</button>
                                <button type="button" class="btn btn-primary waves-effect"
                                    data-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
