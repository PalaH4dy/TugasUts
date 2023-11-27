<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <h1 class="text-center mb-4 mt-3">Pangajuan</h1>
    <table class="table table-bordered border-dark">
        <thead>
            <tr class="fs-5">
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">No/Wa</th>
                <th scope="col">Bagian</th>
                <th scope="col">Kebutuhan</th>
                <th scope="col">Tentang</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Foto</th>
                <th scope="col">Urgensi</th>
                <th scope="col">Katagori</th>
                <th scope="col">Progres</th>
                <th scope="col">Pic</th>
            </tr>
        </thead>
        @foreach ($data as $dt)
            <tbody>
                <tr>

                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $dt->pegawai->nama_pegawai }}</td>
                    <td>{{ $dt->pegawai->no_wa }}</td>
                    <td>{{ $dt->pegawai->bagian->nama_bagian }}</td>
                    <td>{{ $dt->kebutuhan->jenis_kebutuhan }}</td>
                    <td>{{ $dt->kebutuhan->tentang }}</td>
                    <td>{{ $dt->kebutuhan->deskripsi }}</td>
                    <td> <img src="{{ asset('imageKebutuhan/' . $dt->kebutuhan->image) }}" alt=""
                            style="width: 40px">
                    </td>
                    <td>{{ $dt->kebutuhan->level }}</td>
                    <td>{{ $dt->katagori->nama_katagori }}</td>
                    <td>{{ $dt->progres->progres }}</td>
                    <td>{{ $dt->pic->nama_pic }}</td>

                </tr>
                <script type="text/javascript">
                    window.print();
                </script>
            </tbody>
        @endforeach
    </table>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
