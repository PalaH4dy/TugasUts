@extends('layout.main')
@section('content')
    <section class="content home">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Data Kebutuhan</h2>
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
                                <th scope="col">Jenis Kebutuhan</th>
                                <th scope="col">Tentang</th>
                                <th scope="col">Deskripsi</th>
                                <th scope="col">level</th>
                                <th scope="col">Image</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        @foreach ($kebutuhan as $dt)
                            <tbody>
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $dt->jenis_kebutuhan }}</td>
                                    <td>{{ $dt->tentang }}</td>
                                    <td>{{ $dt->deskripsi }}</td>
                                    <td>{{ $dt->level }}</td>
                                    <td> <img src="{{ asset('imageKebutuhan/' . $dt->image) }}" alt=""
                                            style="width: 40px"></td>
                                    <td>
                                        {{-- modal edit --}}
                                        <button type="button" class="btn btn-success " data-toggle="modal"
                                            data-target="#editkebutuhan {{ $dt->id_kebutuhan }}"><i
                                                class="material-icons">mode_edit</i> </button>
                                        {{-- modal delete --}}
                                        <button type="button" class="btn btn-danger " data-toggle="modal"
                                            data-target="#deleteModal"><i class="material-icons">delete</i> </button>
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
                    <form action="{{ route('storekebutuhan') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <div class="form-line">
                                <label for="jenis_kebutuhan" class="text-dark">Jenis Kebutuhan</label>
                                <div class="input-group mb-3">
                                    <select class="custom-select" id="inputGroupSelect02" name="jenis_kebutuhan">
                                        <option selected>--pilih---</option>
                                        <option value="SIMRS">SIMRS</option>
                                        <option value="NonSIMRS">NonSIMRS</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-line">
                                <label for="tentang" class="text-dark">Tenteng</label>
                                <input type="text" name="tentang" class="form-control" placeholder="input data">
                            </div>
                            <div class="form-line">
                                <label for="deskripsi" class="text-dark">Deskripsi</label>
                                <input type="text" name="deskripsi" class="form-control" placeholder="input data">
                            </div>
                            <div class="form-line">
                                <label for="level" class="text-dark">Level</label>
                                <div class="input-group mb-3">
                                    <select class="custom-select" id="inputGroupSelect02" name="level">
                                        <option selected>--pilih---</option>
                                        <option value="urgent">urgent</option>
                                        <option value="medium">medium</option>
                                        <option value="low">low</option>
                                    </select>
                                </div>
                                <label for="image" class="mt-3">Upload Image</label>
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input type="file" name="image" class="custom-file-input">
                                        <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
                                    </div>
                                </div>
                            </div>
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
    @foreach ($kebutuhan as $dt)
        <div class="modal fade" id="editkebutuhan{{ $dt->id_kebutuhan }}" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="defaultModalLabel">Edit Data</h4>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('updatekebutuhan', $dt->id_kebutuhan) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <div class="form-line">
                                    <label for="jenis_kebutuhan" class="text-dark">Jenis Kebutuhan</label>
                                    <div class="input-group mb-3">
                                        <select class="custom-select" id="inputGroupSelect02" name="jenis_kebutuhan">
                                            <option selected>{{ $dt->jenis_kebutuhan }}</option>
                                            <option value="SIMRS">SIMRS</option>
                                            <option value="NonSIMRS">NonSIMRS</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-line">
                                    <label for="tentang" class="text-dark">Tenteng</label>
                                    <input type="text" name="tentang" class="form-control"
                                        value="{{ $dt->tentang }}">
                                </div>
                                <div class="form-line">
                                    <label for="deskripsi" class="text-dark">Deskripsi</label>
                                    <input type="text" name="deskripsi" class="form-control"
                                        value="{{ $dt->deskripsi }}">
                                </div>
                                <div class="form-line">
                                    <label for="level" class="text-dark">Level</label>
                                    <div class="input-group mb-3">
                                        <select class="custom-select" id="inputGroupSelect02" name="level">
                                            <option selected>{{ $dt->level }}</option>
                                            <option value="urgent">urgent</option>
                                            <option value="medium">medium</option>
                                            <option value="low">low</option>
                                        </select>
                                    </div>
                                    <label for="image" class="mt-3">Upload Image</label>
                                    @if ($dt->image)
                                        <img src="{{ asset('imageKebutuhan/' . $dt->image) }}" alt=""
                                            style="width: 40px"></td>
                                    @else
                                        gakada
                                    @endif
                                    <div class="input-group mb-3">
                                        <div class="custom-file">
                                            <input type="file" name="image" class="custom-file-input"
                                                value="{{ $dt->image }}">
                                            <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
                                        </div>
                                    </div>
                                </div>
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
    @endforeach
    {{--
    {{-- modal delete --}}
    @foreach ($kebutuhan as $dt)
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="defaultModalLabel">Hapus</h4>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('deletekebutuhan', $dt->id_kebutuhan) }}" method="POST">
                            @csrf
                            @method('delete')
                            <div class="form-group">
                                <div class="form-line">
                                    apakah kamu yakin ingin menghapus
                                    {{ $dt->jenis_kebutuhan }}">
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
