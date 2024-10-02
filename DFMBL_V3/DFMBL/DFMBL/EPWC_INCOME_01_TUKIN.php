<b class="mx-2">Tunjangan Kinerja</b>
<hr class="mx-2">
<form method="post">
<div class="input-group mb-3 mx-2" style="max-width:30rem;">
  <select name="slc_tukin" class="form-control" required>
    <?PHP 
        $pl_slc_vtukin01_sw = $CL_Q("$SL DISTINCT GajiBulan FROM Citarum.dbo.TGajiTukinYakkum order by GajiBulan desc");
        echo"<option value>Pilih Bulan</option>";
        while($pl_slc_vtukin01_sww = $CL_FAS($pl_slc_vtukin01_sw)){
            echo"<option value=$pl_slc_vtukin01_sww[GajiBulan]>$pl_slc_vtukin01_sww[GajiBulan]</option>";
        }
    ?>
    </select>
  <button class="btn btn-success" name="btn_caritukin">Pilih</button>
</div>
    </form>

        <?PHP 
            $slc_tukin = @$SQL_SL($_POST['slc_tukin']);
                if(isset($_POST['btn_caritukin'])){
                    echo "<META HTTP-EQUIV='Refresh' Content='0; URL=?NAVI=EPWC_INCOME_01&PG_SA=EPWC_INCOME_01_TUKIN&IDBTUKIN=$slc_tukin&GETTUKIN=GETTUKIN'>";
            }

            $pl_ls_vtukin01_sw = $CL_Q("$CL_SL Citarum.dbo.TGajiTukinYakkum WHERE GajiBulan='$IDBTUKIN' AND KaryNomorYakkum='$epwc_vkry01_sww[KaryNomorYakkum]'");
            $pl_ls_vtukin01_sww = $CL_FAS($pl_ls_vtukin01_sw);

            #Casting
            $nom_vnomtukin = @$NF($pl_ls_vtukin01_sww[GajiDiterima]);

            if(isset($_GET['GETTUKIN'])){
            echo"<table class='table table-sm table-bordered  mx-2' style='max-width:35rem;'>
            <tr>
                <td class=''>Bulan</td>
                <td>$pl_ls_vtukin01_sww[GajiBulan]</td>
            </tr>
             <tr>
                <td class=''>Nominal Tukin</td>
                <td>Rp.$nom_vnomtukin</td>
            </tr>
        </table>";

            }

        ?>