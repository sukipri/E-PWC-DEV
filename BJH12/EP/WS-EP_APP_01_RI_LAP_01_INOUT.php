<div class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
  <div class="toast-header">
    <strong class="me-auto">Note</strong>
    <small>11 mins ago</small>
      <span aria-hidden="true"></span>
    </button>
  </div>
  <div class="toast-body">
    Yang tersprtir hanya pengguna Presensi *Masuk <br><i>GPS Method</i>
  </div>
</div>
<br>  
<br>    
<span class="badge bg-info">#Lap *Month IN / OUT</span>
<form method="post">
<div class="input-group mb-3" style="max-width:30rem;">
  <input type="date" class="form-control form-control-sm" required name="ep_ri_tgl01">
  <input type="date" class="form-control form-control-sm" required name="ep_ri_tgl02">
  <div class="input-group-append">
    <button class="btn btn-success btn-sm" name="ep_ri_cari">CARI DATA</button>
  </div>
</div>
</form>
<br>
<div id="" style="overflow:scroll; height:900px;">
<table class="table table-striped table-bordered table-sm">
<tr class="table-dark">
<td width="5%">#</td>
        <td  width="25%">NAMA</td>
        <td  width="20%">Jadwal Masuk  / Pulang</td>
        <td width="20%">Jam Berangkat </td>
        <td width="20%">Jam Pulang </td>
        <td width="20%">Keterlambatan / Lembur</td>
        <td>-</td>
</tr>
<?PHP 
    if(isset($_POST['ep_ri_cari'])){
    $ep_ri_tgl01 = @$_POST['ep_ri_tgl01'];
    $ep_ri_tgl02 = @$_POST['ep_ri_tgl02'];
        include"../EP/WS-EP_APP_01_RI_LAP_01_SCINOUT.php"; 

    }
?>
</table>
</div>