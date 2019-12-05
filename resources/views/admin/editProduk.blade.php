<!DOCTYPE html>
<html>
	<head>
		<title>ADAESKRIMENAK</title>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
		<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<style>
			html, body {
				min-height: 100%;
			}
			body, div, form, input, select, p { 
				padding: 0;
				margin: 0;
				outline: none;
				font-family: Roboto, Arial, sans-serif;
				font-size: 16px;
				color: #eee;
			}
			body {
				background: url("/uploads/media/default/0001/01/b5edc1bad4dc8c20291c8394527cb2c5b43ee13c.jpeg") no-repeat center;
				background-size: cover;
			}
			h1, h2 {
				text-transform: uppercase;
				font-weight: 400;
			}
			h2 {
				margin: 0 0 0 8px;
			}
			.main-block {
				display: flex;
				flex-direction: column;
				justify-content: center;
				align-items: center;
				height: 100%;
				padding: 25px;
				background: rgba(0, 0, 0, 0.5); 
			}
			.left-part, form {
				padding: 25px;
			}
			.left-part {
				text-align: center;
			}
			.fa-feather-alt {
				/* font-size: 72px; */
				color: #bfbfbf;
			}
			form {
				background: rgba(0, 0, 0, 0.7); 
			}
			.title {
				display: flex;
				align-items: center;
				margin-bottom: 20px;
			}
			.info {
				display: flex;
				flex-direction: column;
			}
			input, select {
				padding: 5px;
				margin-bottom: 30px;
				background: transparent;
				border: none;
				border-bottom: 1px solid #eee;
			}
			input::placeholder {
				color: #eee;
			}
			option:focus {
				border: none;
			}
			option {
				background: black; 
				border: none;
			}
			.checkbox input {
				margin: 0 10px 0 0;
				vertical-align: middle;
			}
			.checkbox a {
				color: #26a9e0;
			}
			.checkbox a:hover {
				color: #85d6de;
			}
			.btn-item, button {
				padding: 10px 5px;
				margin-top: 20px;
				border-radius: 5px; 
				border: none;
				background: #26a9e0; 
				text-decoration: none;
				font-size: 15px;
				font-weight: 400;
				color: #fff;
			}
			.btn-item {
				display: inline-block;
				margin: 20px 5px 0;
			}
			button {
				width: 100%;
			}
			button:hover, .btn-item:hover {
				background: #85d6de;
			}
			@media (min-width: 568px) {
				html, body {
					height: 100%;
				}
				.main-block {
					flex-direction: row;
					height: calc(100% - 50px);
				}
				.left-part, form {
					flex: 1;
					height: auto;
				}
			}
		</style>
		<script type="text/javascript">
			$(document).ready(function(){
				

				$('select#po_').change(function(){
					if($(this).children('option:selected').val() == 'null'){
						$("input[name='po_duration']").attr('disabled', 'disabled');
						$("input[name='po_duration']").val("0");
					}

					else
						$("input[name='po_duration']").removeAttr('disabled');
				});
			})
		</script>
	</head>
	<body>
		<div class="main-block">
			<div class="left-part">
				<!-- <i class="fas fa-graduation-cap"></i> -->
				<i class="fas fa-feather-alt fa-10x"></i>
			</div>
			<form action="/produk/simpan/{{$dataEdit->id}}" method="post">
			{{ csrf_field() }}
				<input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
				<div class="title">
					<i class="fas fa-pencil-alt"></i> 
					<h2>Tambah Produk</h2>
				</div>
				@if (count($errors) > 0)
				<div class="alert alert-danger">
					<ul>
						@foreach($errors->all() as $e)
							<li>{{$e}}</li>
						@endforeach
					</ul>
				</div>
				@endif
				<div class="info">
					<input class="fname" type="text" name="name" placeholder="Nama Produk" value="{{$dataEdit->name}}">
					<select name="type" id="type">
						<option value="" selected>Kategori</option>
						<option value='0'>Buket Bunga</option>
						<option value='1'>Buket Snack</option>
						<option value='2'>Buket Flanel</option>
					</select>
					<input type="text" name="code" placeholder="Kode produk" value="{{$dataEdit->code}}">
					<input type="text" name="stock" placeholder="Jumlah stock" value="{{$dataEdit->stock}}">
					<input type="text" name="sold" placeholder="Terjual" value="{{$dataEdit->sold}}">
                    <select name="po_status" id="po_" value="{{$dataEdit->po_status}}">
						<option value="null">Pre order?</option>
						<option value="po">Ya</option>
						<option value="null">Tidak</option>
					</select>
					<input type="text" name="po_duration" placeholder="Durasi PO" value="{{$dataEdit->po_duration}}">
				</div>
				<button type="submit">Submit</button>
			</form>
		</div>
	</body>
</html>