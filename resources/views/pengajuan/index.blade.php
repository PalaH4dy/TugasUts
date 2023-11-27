@extends('layout.main')
@section('content')
    <section class="content home">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Data Pengajuan</h2>
                <small class="text-muted">Welcome to Swift application</small>
            </div>

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    {{-- modal tambah --}}
                    <button type="button" class="btn btn-success  mb-3" data-toggle="modal" data-target="#defaultModal">Tambah
                        Data</button>
                    <a href="{{ route('cetak') }}" class="btn btn-info mb-3"><i class="material-icons">print</i> cetak</a>
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Kontak / Wa</th>
                                <th scope="col">Bagian</th>
                                <th scope="col">Jenis Kebutuhan</th>
                                <th scope="col">Kebutuhan Tentang</th>
                                <th scope="col">Kebutuhan deskripsi</th>
                                <th scope="col">deskripsi poto</th>
                                <th scope="col">Urgensi</th>
                                <th scope="col">Katagori</th>
                                <th scope="col">Progres</th>
                                <th scope="col">PIC</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        @foreach ($data as $dt)
                            <tbody>
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $dt->pegawai->nama_pegawai }}</td>
                                    <td>{{ $dt->pegawai->no_wa }}</td>
                                    <td>{{ $dt->pegawai->bagian->nama_bagian }}</td>
                                    <td>{{ $dt->kebutuhan->jenis_kebutuhan }}</td>
                                    <td>{{ $dt->kebutuhan->tentang }}</td>
                                    <td>{{ $dt->kebutuhan->deskripsi }}</td>
                                    <td> <img src="{{ asset('imageKebutuhan/' . $dt->kebutuhan->image) }}" alt=""
                                            style="width: 40px"></td>
                                    </td>
                                    <td>{{ $dt->kebutuhan->level }}</td>
                                    <td>{{ $dt->katagori->nama_katagori }}</td>
                                    <td>{{ $dt->progres->progres }}</td>
                                    <td>{{ $dt->pic->nama_pic }}</td>
                                    {{-- modal edit --}}
                                    <td>
                                        <button type="button" class="btn btn-sm btn-success d-inline " data-toggle="modal"
                                            data-target="#editModal"><i class="material-icons">mode_edit</i> </button>
                                        {{-- modal delete --}}
                                        <button type="button" class="btn btn-sm btn-danger d-inline " data-toggle="modal"
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
                    <form action="{{ route('storepengajuan') }}" method="POST">
                        @csrf
                        <label for="pegawai" class="text-dark">Pegawai</label>
                        <div class="input-group mb-3">
                            <select class="custom-select" id="inputGroupSelect02" name="id_pegawai">
                                <option selected>--pilih---</option>
                                @foreach ($pegawai as $pg)
                                    <option value="{{ $pg->id_pegawai }}">
                                        {{ $pg->nama_pegawai }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <label for="kebutuhan" class="text-dark">Kebutuhan</label>
                        <div class="input-group mb-3">
                            <select class="custom-select" id="inputGroupSelect02" name="id_kebutuhan">
                                <option selected>--pilih---</option>
                                @foreach ($kebutuhan as $kb)
                                    <option value="{{ $kb->id_kebutuhan }}">
                                        {{ $kb->jenis_kebutuhan }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <label for="katagori" class="text-dark">katagori</label>
                        <div class="input-group mb-3">
                            <select class="custom-select" id="inputGroupSelect02" name="id_katagori">
                                <option selected>--pilih---</option>
                                @foreach ($katagori as $kt)
                                    <option value="{{ $kt->id_katagori }}">
                                        {{ $kt->nama_katagori }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <label for="progres" class="text-dark">progres</label>
                        <div class="input-group mb-3">
                            <select class="custom-select" id="inputGroupSelect02" name="id_progres">
                                <option selected>--pilih---</option>
                                @foreach ($progres as $pr)
                                    <option value="{{ $pr->id_progres }}">
                                        {{ $pr->progres }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <label for="pic" class="text-dark">Penanggung jawab</label>
                        <div class="input-group mb-3">
                            <select class="custom-select" id="inputGroupSelect02" name="id_pic">
                                <option selected>--pilih---</option>
                                @foreach ($pic as $p)
                                    <option value="{{ $p->id_pic }}">
                                        {{ $p->nama_pic }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tanggal_lahir">Tanggal pengajuan</label>
                            <input type="date" name="tanggal_pengajuan" class="form-control">
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
    @foreach ($data as $dt)
        <div class="modal fade" id="editModal{{ $dt->id_pengajuan }}" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="defaultModalLabel">Edit Data</h4>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('updatepengajuan', $dt->id_pengajuan) }}" method="POST">
                            @csrf
                            @method('put')
                            <label for="pegawai" class="text-dark">Pegawai</label>
                            <div class="input-group mb-3">
                                <select class="custom-select" id="inputGroupSelect02" name="id_pegawai">
                                    <option selected>{{ $dt->id_pegawai }}</option>
                                    @foreach ($pegawai as $pg)
                                        <option value="{{ $pg->id_pegawai }}">
                                            {{ $pg->nama_pegawai }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <label for="kebutuhan" class="text-dark">Kebutuhan</label>
                            <div class="input-group mb-3">
                                <select class="custom-select" id="inputGroupSelect02" name="id_kebutuhan">
                                    <option selected>{{ $dt->id_kebutuhan }}</option>
                                    @foreach ($kebutuhan as $kb)
                                        <option value="{{ $kb->id_kebutuhan }}">
                                            {{ $kb->jenis_kebutuhan }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <label for="katagori" class="text-dark">katagori</label>
                            <div class="input-group mb-3">
                                <select class="custom-select" id="inputGroupSelect02" name="id_katagori">
                                    <option selected>{{ $dt->katagori }}</option>
                                    @foreach ($katagori as $kt)
                                        <option value="{{ $kt->id_katagori }}">
                                            {{ $kt->nama_katagori }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <label for="progres" class="text-dark">progres</label>
                            <div class="input-group mb-3">
                                <select class="custom-select" id="inputGroupSelect02" name="id_progres">
                                    <option selected>{{ $dt->id_progres }}</option>
                                    @foreach ($progres as $pr)
                                        <option value="{{ $pr->id_progres }}">
                                            {{ $pr->progres }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <label for="pic" class="text-dark">Penanggung jawab</label>
                            <div class="input-group mb-3">
                                <select class="custom-select" id="inputGroupSelect02" name="id_pic">
                                    <option selected>{{ $dt->id_pic }}</option>
                                    @foreach ($pic as $p)
                                        <option value="{{ $p->id_pic }}">
                                            {{ $p->nama_pic }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tanggal_lahir">Tanggal Lahir</label>
                                <input type="date" name="tanggal_lahir" class="form-control"
                                    value="{{ $dt->tanggal_lahir }}">
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
    @foreach ($data as $dt)
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="defaultModalLabel">Hapus</h4>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('deletepengajuan', $dt->id_pengajuan) }}" method="POST">
                            @csrf
                            @method('delete')
                            <div class="form-group">
                                <div class="form-line">
                                    apakah kamu yakin ingin menghapus
                                    {{ $dt->id_pegawai }}">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary waves-effect">hapus</button>
                                <button type="button" class="btn btn-danger waves-effect"
                                    data-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
