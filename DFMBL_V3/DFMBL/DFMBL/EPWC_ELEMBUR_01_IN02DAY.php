<?PHP $IDKRY02 = @$_GET['IDKRY02']; $epwc_sub_vkry01_sw = substr($IDKRY02,1);  ?>
<b class="mx-2 badge bg-info"><?PHP echo"Entri Lembur Harian /List Bulan"; ?></b>
<span class="mx-2"><b><?PHP echo "<span class='badge bg-dark'><i class='fas fa-id-card-alt'></i> ".$epwc_vw_vkry01_sww['KaryNama']."</span>"; ?> </b></span>
<br>
<div class="alert alert-dismissible alert-info mx-2">
  <p class="mx-2"><b>1.</b> Lakukan Pemilihan  Bulan Lembur</p>
  <p class="mx-2"><b>2.</b> Klik <b>Entri Lembur</b> Sesuai dengan Tanggal Lembur</p>
</div>
<form method="post">
    <div class="input-group mb-3 mx-2 input-group-sm" style="max-width:20rem;">
        <select name="slc_jdwbulan" class="form-control form-control-sm" required>
            <option value="">Bulan Lembur</option>
        <?PHP 
             $tj_sl_vjdw01_sw = $CL_Q("$SL TOP 12 Bulan  FROM TJ_Main_Data.dbo.TJadwal WHERE NIK='$epwc_sub_vkry01_sw'  order by Bulan Desc");
             while($tj_sl_vjdw01_sww = $CL_FAS($tj_sl_vjdw01_sw)){
                if($IDJBULAN01==$tj_sl_vjdw01_sww['Bulan']){
                    echo"<option value=$tj_sl_vjdw01_sww[Bulan] selected>$tj_sl_vjdw01_sww[Bulan]</option>";
                }else{
                    echo"<option value=$tj_sl_vjdw01_sww[Bulan]>$tj_sl_vjdw01_sww[Bulan]</option>";    
                }
                
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
                echo "<META HTTP-EQUIV='Refresh' Content='0; URL=?NAVI=EPWC_ELEMBUR_01&PG_SA=EPWC_ELEMBUR_01_IN02DAY&IDKRY=$IDKRY&IDKRY02=$IDKRY02&LEMBULAN01=LEMBULAN01&IDJBULAN01=$slc_jdwbulan'>";
            }

        ?>
            <?PHP if(isset($_GET['LEMBULAN01'])){ 
                     #DATA KALKULASI LEMBUR
                     $tj_ls_vjdw01_sw = $CL_Q("$SL Bulan,NIK FROM TJ_Main_Data.dbo.TJadwal WHERE NIK='$epwc_sub_vkry01_sw' AND Bulan='$IDJBULAN01'  order by Bulan Desc");
                     $tj_ls_vjdw01_sww = $CL_FAS($tj_ls_vjdw01_sw); #M X Y
                     $epwc_bulan_jdw = substr($tj_ls_vjdw01_sww['Bulan'],4); #Get Bulan
                     $epwc_bulan_jdw02 = substr($tj_ls_vjdw01_sww['Bulan'],0,4); #Get Tahun
                     $epwc_datekon01_sw = "$epwc_bulan_jdw-$epwc_bulan_jdw02";
                ?>
                
    <table class="table table-striped table-bordered table-sm mx-2">
        <tr class="table-dark">
            <td width="15%">Tanggal Lembur</td>
            <td width="15%">-</td>
            <td>Keterangan Lembur</td>
        </tr>
        <?PHP 
            $no_day = 1;
            while($no_day <= 31){
                $sp_day = sprintf("%'.02d",$no_day);
                $sp_dayint = (int)$sp_day;  
                $sp_daytxt = "$sp_day-$epwc_datekon01_sw";
                #$new_txt_date01  = strtotime("$sp_dayint-$epwc_datekon01_sw");
                #$new_date01 = DATE("d-m-Y",$new_txt_date01);     
        ?>
        <tr>
            <td><?PHP echo FS_DATE($sp_daytxt); ?></td>
            
            <td align="center">
                <a href="<?PHP echo"?NAVI=EPWC_ELEMBUR_01&PG_SA=EPWC_ELEMBUR_01_IN02&IDKRY=$IDKRY&IDHARI=$sp_day&IDBULAN=$epwc_bulan_jdw&IDTAHUN=$epwc_bulan_jdw02&INDAY=INDAY&IDJBULAN01=$IDJBULAN01"; ?>" class="btn btn-success btn-sm"><i class='fas fa-pen'></i> Entri Lembur</a>
            </td>
            <td>
                <!--  -->
                <?PHP 
                    $epwc_ls_vlem01_sw = $CL_Q("$SL LemburID,KaryNomor,LemburBiasa,LemburTanggal,LemburUraian,LemburAlasan FROM Citarum.dbo.TKaryLemburHari WHERE KaryNomor='$IDKRY' AND YEAR(LemburTanggal)=' $epwc_bulan_jdw02' AND MONTH(LemburTanggal)='$epwc_bulan_jdw' AND DAY(LemburTanggal)='$sp_day' ");
                        while($epwc_ls_vlem01_sww = $CL_FAS($epwc_ls_vlem01_sw)){
                            echo"<a href='?NAVI=EPWC_ELEMBUR_01&PG_SA=EPWC_ELEMBUR_01_IN02&IDKRY=$IDKRY&IDLBR01=$epwc_ls_vlem01_sww[LemburID]&UPLMBR01=UPLMBR01'>";
                            echo"
                                <div class='alert alert-dismissible alert-primary'>
                                <b>Total Jam</b> : $epwc_ls_vlem01_sww[LemburBiasa]<br>
                                <b>Uraian : </b> $epwc_ls_vlem01_sww[LemburUraian]<br>
                                <b>Alasan : </b> $epwc_ls_vlem01_sww[LemburAlasan]
                                </div>";
                            echo"</a>";
                        }
                ?>  
                <!--  -->
            </td>
        </tr>
        <?PHP $no_day++; } ?>
    </table>
    <?PHP } ?>