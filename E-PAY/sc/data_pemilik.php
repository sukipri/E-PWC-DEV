<?php 
include"css.php";
	//$json_data=file_get_contents("http://localhost:8080/sbs/json_pemilik.php");
	//$obj = json_decode($json_data);
 ?>
<html>
<head>  
<title>Aplikasi SAMSAT On-Line</title></head>
<body>  

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">SAMSAT</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
     <li class="active"><a href="#">Data Pemilik</a></li>
        <li><a href="#">Data kendaraaan</a></li>
        <li><a href="#">Data Pajak</a></li>
       </ul>
        </li>
      </ul>
      <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Masukan ID pemilik">
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Link</a></li>
      </ul>
    </div>
  </div>
</nav>


<div class="container">
<h1>Data Pemilik</h1>  
<table class="table table-bordered">  
<tr>    
<th>ID Pemilik</th> 
<th>ID Pajak</th> 
<th>Nopol</th> 
<th>Nama</th>    
<th>email</th>    
<th>Telepon</th>    
<th>Alamat</th>    
</tr>  
<?php  
// Load file koneksi.php  
include "koneksi.php";    
$json_data=@file_get_contents("http://localhost:8080/sbs/json_pemilik.php");
					$obj = json_decode($json_data);
					foreach($obj as $ob){// Ambil semua data dari hasil eksekusi $sql    
echo "<tr>";    
echo "<td>".@$ob->id_pemilik."</td>";
echo "<td>".@$ob->id_pajak."</td>";  
echo "<td>".@$ob->nopol."</td>";    
echo "<td>".@$ob->nama."</td>";    
echo "<td>".@$ob->email."</td>";    
echo "<td>".@$ob->telp."</td>";    
echo "<td>".@$ob->alamat."</td>"; 
echo "</tr>";  
}  
?>  
 </table>
 </div>
 </body>
 </html>