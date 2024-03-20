<a class="badge bg-dark"><i class="fas fa-folder-open"></i>Cetak Gaji *Personal</a>
<form method="post">
<div class="input-group mb-3" style="max-width:35rem;">
<!-- <select name="txt_thn" class="form-control form-control-sm"> -->

        <select name="txt_nik_01" class="form-control form-control-sm" required style="max-width:20rem;">
        <option value=""></option>
        <?PHP 
                $epwc_sl_vkry01_sw = $ms_q("$sl KaryNomor,KaryNomorYakkum,KaryNama FROM Citarum.dbo.TKaryawan WHERE (KaryStatus='10' OR KaryStatus='22')  order by KaryNama asc");
                while($epwc_sl_vkry01_sww = $ms_fas($epwc_sl_vkry01_sw)){
                    echo"<option value=$epwc_sl_vkry01_sww[KaryNomorYakkum]>$epwc_sl_vkry01_sww[KaryNama]</option>";
                }
            ?>
        </select>
        <select name="slc_bln" class="form-control form-control" required style="max-width:10rem;">
<?PHP 
    $epwc_ls_vgj01_sw = $ms_q("SELECT DISTINCT GajiBulan FROM Citarum.dbo.TGajiYakkum order by GajiBulan desc");
    echo"<option value=>";
        while($epwc_ls_vgj01_sww = $ms_fas($epwc_ls_vgj01_sw)){
            echo"<option value=$epwc_ls_vgj01_sww[GajiBulan]>$epwc_ls_vgj01_sww[GajiBulan]</option>";
        }
?>
</select>
        <button class="btn btn-success btn-sm" name="btn_cari_01">CARI DATA</button>
        </div>
</div>
    </form>
    <?PHP 
        #VARIABLE
        $txt_nik_01 = @$sql_slash($_POST['txt_nik_01']);
        $slc_bulan = @$sql_slash($_POST['slc_bln']);
        if(isset($_POST['btn_cari_01'])){ #PROCCSSING SEARCHING
            $pl_ls_vkry01_sw = $ms_q("$sl KaryNomor,KaryNomorYakkum,KaryNama FROM Citarum.dbo.TKaryawan WHERE KaryNomorYakkum='$txt_nik_01'");
            $pl_ls_vkry01_sww = $ms_fas($pl_ls_vkry01_sw);
    ?>
    <div class="card border-primary mb-3" style="max-width: 20rem;">
        <div class="card-header"><?PHP echo $pl_ls_vkry01_sww['KaryNama'] ?></div>
        <div class="card-body">
          <?PHP 
                    echo"<a href='http://103.164.114.138/E-PWC/E-PAY/SU_KRY/CTK_GAJI_YAKKUM.php?idkry=$txt_nik_01&thn=$slc_bulan' class='btn btn-info btn-sm' target='_blank'>CETAK SLIP BESAR</a>";
                    echo"&nbsp";
                    echo"<a href='http://103.164.114.138/E-PWC/E-PAY/SU_KRY/CTK_GAJI_YAKKUM02.php?idkry=$txt_nik_01&thn=$slc_bulan' class='btn btn-primary btn-sm' target='_blank'>CETAK SLIP KECIL</a>";
          ?>
        </div>
    </div>
    <?PHP 
             }

        ?>