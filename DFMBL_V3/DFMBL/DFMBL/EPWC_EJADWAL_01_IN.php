<span class="badge bg-success mx-2"><b>Entri Presensi</b></span>
<hr>


<div class="input-group mb-3 mx-2">
  <span class="input-group-text" id="basic-addon1">@BULAN KODE</span>
  <input type="text" class="form-control form-control-sm" name="#" style="max-width:13rem;" value="<?PHP echo"$DATE_Y$DATE_m"; ?>">
</div>
<table class="table table-sm table-bordered table-striped mx-2">
<tr class="table-dark">
    <td>NAMA</td>
    <td>1</td>
    <td>2</td>
    <td>3</td>
    <td>4</td>
    <td>5</td>
    <td>6</td>
    <td>7</td>
    <td>8</td>
    <td>9</td>
    <td>10</td>
    <td>11</td>
    <td>12</td>
    <td>13</td>
    <td>14</td>
    <td>15</td>
    <td>16</td>
    <td>17</td>
    <td>18</td>
    <td>19</td>
    <td>20</td>
    <td>21</td>
    <td>22</td>
    <td>23</td>
    <td>24</td>
    <td>25</td>
    <td>26</td>
    <td>27</td>
    <td>28</td>
    <td>29</td>
    <td>30</td>
    <td>31</td>  
</tr>
<?PHP 
    #DATA KARYAWAN EPWC
    $epwc_ls_vkry01_sw = $CL_Q("$SL KaryNomor,KaryNomorYakkum,KaryNama FROM Citarum.dbo.TKaryawan WHERE (UnitKode='$epwc_vkry01_sww[UnitKode]' OR UnitKode='$epwc_vkry01_sww[UnitKode01]' ) AND (KaryStatus='10' OR KaryStatus='22')");
        while($epwc_ls_vkry01_sww = $CL_FAS($epwc_ls_vkry01_sw)){
?>
<tr>
    <td><?PHP echo $epwc_ls_vkry01_sww['KaryNama'] ?></td>
    <td>
        <select name="#" required class="form-control form-control-sm">
            <option value=""></option>
        <?PHP 
            $epwc_tj_sl_vsf01_sw = $CL_Q("$SL Kode,Ket FROM TJ_Main_Data.dbo.tShif order by Kode asc");
                while($epwc_tj_sl_vsf01_sww = $CL_FAS($epwc_tj_sl_vsf01_sw)){
                    echo"<option value=$epwc_tj_sl_vsf01_sww[Kode]>$epwc_tj_sl_vsf01_sww[Kode]</option>";
                }
        ?>
        </select>
    </td>
    <td>
    <select name="#" required class="form-control form-control-sm">
            <option value=""></option>
        <?PHP 
            $epwc_tj_sl_vsf01_sw = $CL_Q("$SL Kode,Ket FROM TJ_Main_Data.dbo.tShif order by Kode asc");
                while($epwc_tj_sl_vsf01_sww = $CL_FAS($epwc_tj_sl_vsf01_sw)){
                    echo"<option value=$epwc_tj_sl_vsf01_sww[Kode]>$epwc_tj_sl_vsf01_sww[Kode]</option>";
                }
        ?>
        </select>
    </td>
    <td>3</td>
    <td>4</td>
    <td>5</td>
    <td>6</td>
    <td>7</td>
    <td>8</td>
    <td>9</td>
    <td>10</td>
    <td>11</td>
    <td>12</td>
    <td>13</td>
    <td>14</td>
    <td>15</td>
    <td>16</td>
    <td>17</td>
    <td>18</td>
    <td>19</td>
    <td>20</td>
    <td>21</td>
    <td>22</td>
    <td>23</td>
    <td>24</td>
    <td>25</td>
    <td>26</td>
    <td>27</td>
    <td>28</td>
    <td>29</td>
    <td>30</td>
    <td>31</td>  
</tr>
<?PHP } ?>
</table>