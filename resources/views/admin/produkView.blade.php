<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet">
    <title>ADAESKRIMENAK - PRODUK</title>
</head>

<body>
    <div class="container">
        <div class="card mt-5">
            <div class="card-header text-center">
                <h2>DAFTAR PRODUK</h2>
            </div>
            <div class="card-body">
                <a href="/produk/tambah" class="btn btn-primary">Tambah produk</a>
                <br/>
                <br/>
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>Kategori</th>
                            <th>Nama</th>
                            <th>Kode</th>
                            <th>Stok</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($produk as $p)
                        <tr>
                            <td>{{ $p->type }}</td>
                            <td>{{ $p->name }}</td>
                            <td>{{ $p->code }}</td>
                            <td>{{ $p->stock }}</td>
                            <td>
                                <a href="/produk/edit/{{ $p->id }}" class="btn btn-warning">Edit</a>
                                <a href="/produk/hapus/{{ $p->id }}" class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <a href="produk/terhapus">Produk terhapus</a>
            </div>
        </div>
    </div>
</body>
</html>