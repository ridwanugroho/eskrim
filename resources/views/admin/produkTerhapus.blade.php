<!DOCTYPE html>
<html>
<head>
	<title>PRODUK TERHAPUS</title>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script>
		$(document).ready(function(){
			var datas = {!! json_encode($produk) !!};
			console.log(datas);
			if(datas.length == 0){
				window.setTimeout(function(){
					window.location.href = "/produk";
				}, 2000);
			}
		});
	</script>
</head>
<body>
	<div class="container">
		<div class="card mt-5">
			<div class="card-header text-center">
				PRODUK | <a href="/produk">ADAESKRIMENAK</a>
            </div>
            @if (!$produk->isEmpty())
			<div class="card-body">
				<a href="/guru/kembalikan_semua">Kembalikan Semua</a>
				|
				<a href="/guru/hapus_permanen_semua">Hapus Permanen Semua</a>
                <br/>
				<br/>
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Kategori</th>
							<th>Nama</th>
							<th>Kode</th>
							<th width="30%">OPSI</th>
						</tr>
					</thead>
					<tbody>
						@foreach($produk as $p)
						<tr>
							<td>{{ $p->type }}</td>
							<td>{{ $p->name }}</td>
							<td>{{ $p->code }}</td>
							<td>
								<a href="/produk/restore/{{ $p->id }}" class="btn btn-success btn-sm">Restore</a>
								<a href="/produk/hapus_permanen/{{ $p->id }}" class="btn btn-danger btn-sm">Hapus Permanen</a>
							</td>
						</tr>
                        @endforeach
					</tbody>
				</table>
            </div>
            @else
            <h2>TIDAK ADA PRODUK TERHAPUS</h2>
            <a href="/produk">Kembali ke produk</a>
            @endif
		</div>
	</div>
	
</body>
</html>