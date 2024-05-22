<b class="mx-2 badge bg-info"><?PHP echo"Entri Lembur Harian /List Bulan"; ?></b>
<br>
<div class="alert alert-dismissible alert-danger mx-2">
  <p class="mx-2"><i class="fas fa-file-alt"></i> Lakukan Pemilihan  Bulan Lembur</p>
</div>
<form method="post">
    <div class="input-group mb-3 mx-2 input-group-sm" style="max-width:20rem;">
        <select name="slc_jdwbulan" class="form-control form-control-sm" required>
        <?PHP 
             $tj_sl_vjdw01_sw = $CL_Q("$SL TOP 2 Bulan  FROM TJ_Main_Data.dbo.TJadwal WHERE NIK='$epwc_sub_vkry01_sw'  order by Bulan Desc");
             while($tj_sl_vjdw01_sww = $CL_FAS($tj_sl_vjdw01_sw)){
                echo"<option value=$tj_sl_vjdw01_sww[Bulan]>$tj_sl_vjdw01_sww[Bulan]</option>";
             }
        ?>
        </select>
        <button class="btn btn-success btn-sm" name="btn_jdwbulan">Pilih</button>
    </div>
</form>
    <?PHP 
            #VARIABLE
            $slc_jdwbulan = @$SQL_SL($_POST['slc_jdwbulan']);
            if(isset($_POST['btn_jdwbulan'])){
                echo "<META HTTP-EQUIV='Refresh' Content='0; URL=?NAVI=EPWC_ELEMBUR_01&PG_SA=EPWC_ELEMBUR_01_IN02DAY&IDKRY=$IDKRY'>";
            }

        ?>
    <table class="table table-striped table-bordered table-sm mx-2">
        <tr class="table-dark">
            <td>Tanggal</td>
            <td>-</td>
            <td>-</td>
            <td>-</td>
        </tr>
        <?PHP 
            $no_day = 1;
            
            while($no_day <= 31){
                $sp_day = sprintf("%'.02d\n",$no_day);  
                $day_date = "";         
        ?>
        <tr>
            <td><?PHP echo $sp_day; ?></td>
            <td>-</td>
            <td>-</td>
            <td>-</td>
        </tr>
        <?PHP $no_day++; } ?>
    </table>