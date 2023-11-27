@extends('layout.main')
@section('content')
    <section class="content home">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Data User</h2>
                <small class="text-muted">Welcome to Swift application</small>
            </div>

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    {{-- modal tambah --}}
                    <a href="{{ route('register') }}" class="btn btn-success mb-3">Tambah data</a>
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">email</th>
                                <th scope="col">password</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        @foreach ($pengguna as $user)
                            <tbody>
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->password }}</td>
                                    <td>
                                        <form action="{{ route('deluser', $user->id) }}" method="Post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" onclick="return confirm('Apakah Anda Yakin ?')"
                                                class="btn btn-danger"><i class="material-icons">delete</i></button>
                                        </form>

                                    </td>
                                </tr>
                            </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
