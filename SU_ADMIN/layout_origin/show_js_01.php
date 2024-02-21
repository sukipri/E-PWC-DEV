<html>
<head>
</head>
<body>
	<h3><i class="fa fa-puzzle-piece"></i>&nbsp;Javascript</h3>
	
    <div class="wrap">
	<form method="post" class="form-user">		
		<table>
			<tr>
				<td>Code</td>
				<td><input type="text" name="nim" class="form-control" required></td>
			</tr>
			<tr>
				<td>Name</td>
				<td><input type="text" name="nama" class="form-control"  required></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><input type="email" name="email" class="form-control"  required></td>
			</tr>
			<tr>
				<td></td>
				<td><a class="tombol-simpan btn btn-success">Simpan</a></td>
			</tr>
		</table>
	</form>

	<div class="tampildata"></div>
 	</div>
 
	<script type="text/javascript">
	$(document).ready(function(){
		$(".tombol-simpan").click(function(){
			var data = $('.form-user').serialize();
			$.ajax({
				type: 'POST',
				url: "save_data_js_01.php",
				data: data,
				success: function() {
					$('.tampildata').load("tampil.php");
				}
			});
		});
	});
	</script>
</body>
</html>