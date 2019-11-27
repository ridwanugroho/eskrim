<!DOCTYPE html>
<html>
<head>
    <title>COBA || Menampilkan isi dari database</title>
</head>

<body>
    <ul>
        @foreach($produk as $p)
            <li>{{ "Nama produk : ". $p->name . ' | ID : ' . $p->code }}</li>
        @endforeach
    </ul>
</body>

</html>