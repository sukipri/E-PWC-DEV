<a class="badge bg-dark"><i class="fas fa-folder-open"></i>Logtifitas Lembur Realtime timeline</a>
<hr>
<?PHP 
    $pl_log_ls_vlog01_sw = mysqli_query($CONN01,"select * from pl_log_01.log_lembur order by log_tgl desc limit 400");
    while($pl_log_ls_vlog01_sww = mysqli_fetch_assoc($pl_log_ls_vlog01_sw)){

        echo"<div class='alert alert-dismissible alert-info'>
            <i class='fas fa-pen'></i> $pl_log_ls_vlog01_sww[log_ket]
            <br>
            <i class='far fa-calendar'></i> $pl_log_ls_vlog01_sww[log_tgl] - $pl_log_ls_vlog01_sww[log_jam]
      </div>";
    }


?>
