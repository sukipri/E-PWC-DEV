<head>

<title>Untitled Document</title>
<script type="text/javascript" src="jquery-1.6.min.js"></script>
<script>
$(document).ready(function() {
    $(".kecamatan").change(function() {
        var kecamatan =$(this).val();
        var dataString = 'kecamatan='+kecamatan;
        $.ajax({
            type: "POST",
            url: "getdata.php",
            data: dataString,
            cache: false,
            success: function(html) {
                $(".des2").html(html);
            }
        });
    });

	
	$(".kab").change(function() {
        var kab =$(this).val();
        var dataString = 'kab='+kab;
        $.ajax({
            type: "POST",
            url: "getdata_02.php",
            data: dataString,
            cache: false,
            success: function(html) {
                $(".des3").html(html);
            }
        });
    });
	});
</script>
</head>
</head>

<body>
<?
  $server = "localhost";
  $username ="root";
  $password ="holihks45";
  $database ="lat";

  mysql_connect ($server,$username,$password);
  mysql_select_db ($database);
?>
<table><tr>
<td >Kecamatan</td><td>
<select name="perkec" id="kecamatan" class="kecamatan">
		<option>--Pilih Kecamatan--</option>
		<?php
		$datakec = mysql_query("SELECT * FROM kecamatan ORDER BY id_kecamatan");
		while($p=mysql_fetch_array($datakec)){
		echo "<option value=\"$p[id_kecamatan]\">$p[nama_kecamatan]</option>\n";
		}
		?>
		</select>		</td>
	
	<tr><td >Desa</td>
		<td >
		<select id="des2" class="des2" name="desper">
            <option value="" selected="selected">- Silahkan Pilih Desa -</option>
      </select></td>	</tr>
	  
	  	<tr><td >kab</td>
		<td >
		<select id="des3" class="des3" name="kab">
            <option value="" selected="selected">- Silahkan Pilih Desa -</option>
      </select></td>	</tr>
</body>
</html>
