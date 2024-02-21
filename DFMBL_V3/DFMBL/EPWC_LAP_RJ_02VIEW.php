
<h5>PELAYANAN POLI RAWAT JALAN RS PWC</h5>
<hr>
<!--  -->

    <?php
            $epwc02_vrj01poli_sw = $CL_Q("$SL DISTINCT Poli FROM  Citarum.dbo.VLapRawatJalan WHERE JalanRMTanggal BETWEEN '$tg01' AND '$tg02 23:59'   ");
                while($epwc02_vrj01poli_sww = $CL_FAS($epwc02_vrj01poli_sw)){
                    $epwc02_vrj01poli_sw02 = $CL_Q("$SL JalanNoReg,Poli,PrshNama,Poli FROM  Citarum.dbo.VLapRawatJalan WHERE JalanRMTanggal BETWEEN '$tg01' AND '$tg02 23:59' AND Poli='$epwc02_vrj01poli_sww[Poli]'  ");
                          $epwc02_nr_vrj01poli_sww02 = $CL_NR($epwc02_vrj01poli_sw02);
                          $epwc02_vrj01poli_sww02 = $CL_FAS($epwc02_vrj01poli_sw02);
                    ?>

            <?PHP echo  "<b>".$epwc02_vrj01poli_sww02['Poli']."</b>";  ?>
            <div class="progress">
                    <div class="progress-bar progress-bar-striped bg-success progress-bar-animated" role="progressbar" aria-valuenow="<?PHP echo  $epwc02_nr_vrj01poli_sww02; ?>" aria-valuemin="0" aria-valuemax="8000" style="width:  <?PHP echo  $NF($epwc02_nr_vrj01poli_sww02)."%"; ?>;"></div>
                    <?PHP echo  "<span class='badge bg-dark'>".$epwc02_nr_vrj01poli_sww02."</span>"; ?>
        </div>
       

        <?PHP } ?>


    <!--  -->


    <!--  -->