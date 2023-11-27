@extends('layout.main')
@section('content')
    <section class="content home">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Data Penanggung Jawab</h2>
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
                                <th scope="col">Nama</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Jenis Kelamin</th>
                                <th scope="col">No WA</th>
                                <th scope="col">Tanggal Lahir</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        @foreach ($pic as $dt)
                            <tbody>
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $dt->nama_pic }}</td>
                                    <td>{{ $dt->alamat }}</td>
                                    <td>{{ $dt->jenis_kelamin }}</td>
                                    <td>{{ $dt->no_wa }}</td>
                                    <td>{{ $dt->tanggal_lahir }}</td>
                                    <td>
                                        {{-- modal edit --}}
                                        <button type="button" class="btn btn-success " data-toggle="modal"
                                            data-target="#editModal{{ $dt->id_pic }}"><i
                                                class="material-icons">mode_edit</i> </button>
                                        {{-- modal delete --}}
                                        <button type="button" class="btn btn-danger " data-toggle="modal"
                                            data-target="#deleteModal{{ $dt->id_pic }}"><i
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
                    <form action="{{ route('storepic') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <div class="form-line">
                                <label for="nama_pic" class="text-dark">Nama</label>
                                <input type="text" name="nama_pic" class="form-control" placeholder="Enter your nama">
                            </div>
                            <div class="form-line">
                                <label for="alamat" class="text-dark">Alamat</label>
                                <input type="text" name="alamat" class="form-control" placeholder="Enter your Alamat">
                            </div>
                            <label for="jenis_kelamin" class="text-dark">Jenis Kelamin</label>
                            <div class="input-group mb-3">
                                <select class="custom-select" id="inputGroupSelect02" name="jenis_kelamin">
                                    <option selected>--pilih---</option>
                                    <option value="laki-laki">laki-laki</option>
                                    <option value="prempuan">prempuan</option>
                                </select>
                            </div>
                            <div class="form-line">
                                <label for="no_wa" class="text-dark">No Wa</label>
                                <input type="text" name="no_wa" class="form-control" placeholder="Enter your Number">
                            </div>
                            <div class="form-line">
                                <label for="tanggal_lahir" class="text-dark">Tanggal Lahir</label>
                                <input type="date" name="tanggal_lahir" class="form-control">
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
    @foreach ($pic as $dt)
        <div class="modal fade" id="editModal{{ $dt->id_pic }}" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="defaultModalLabel">Edit Data</h4>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('updatepic', $dt->id_pic) }}" method="POST">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <div class="form-line">
                                    <label for="nama_pic" class="text-dark">Nama</label>
                                    <input type="text" name="nama_pic" class="form-control"
                                        value="{{ $dt->nama_pic }}">
                                </div>
                                <div class="form-line">
                                    <label for="alamat" class="text-dark">Alamat</label>
                                    <input type="text" name="alamat" class="form-control"
                                        value="{{ $dt->alamat }}">
                                </div>
                                <label for="jenis_kelamin" class="text-dark">Jenis Kelamin</label>
                                <div class="input-group mb-3">
                                    <select class="custom-select" id="inputGroupSelect02" name="jenis_kelamin">
                                        <option selected>--pilih---</option>
                                        <option value="laki-laki">laki-laki</option>
                                        <option value="prempuan">prempuan</option>
                                    </select>
                                </div>
                                <div class="form-line">
                                    <label for="no_wa" class="text-dark">No Wa</label>
                                    <input type="text" name="no_wa" class="form-control"
                                        value="{{ $dt->no_wa }}">
                                </div>
                                <div class="form-line">
                                    <label for="tanggal_lahir" class="text-dark">Tanggal Lahir</label>
                                    <input type="date" name="tanggal_lahir" class="form-control"
                                        value="{{ $dt->tanggal_lahir }}">
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
    @foreach ($pic as $dt)
        <div class="modal fade" id="deleteModal{{ $dt->id_pic }}" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="defaultModalLabel">Hapus Data</h4>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('deletepic', $dt->id_pic) }}" method="POST">
                            @csrf
                            @method('delete')
                            <div class="form-group">

                                Apakah Anda yankin menghapus {{ $dt->nama_pic }}


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
