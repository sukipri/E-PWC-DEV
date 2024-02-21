<form method="post">
<select name="thn" required>
    <option value="">TAHUN</option>
<?PHP 
    $thn_no = "2022";
        while($thn_no <= 2030){
            echo"<option value=$thn_no>$thn_no</option>";
        $thn_no++; }
?>
</select>
<select name="bln" required>
<option value="">Bulan</option>
<?PHP 
    // $bln_no = "01";
    //     while($bln_no <= 12){           
    // $bln_zero = sprintf('%02d',$bln_no);
    //         echo"<option value=$bln_zero> $bln_zero</option>";
    //     $bln_no++; }
    echo"<option value=01>01</option>";
    echo"<option value=02>02</option>";
    echo"<option value=03>03</option>";
?>
</select>
<button class="waves-effect green darken-2 waves-light btn" name="go">GO</button>
</form>
<?PHP 
    if(isset($_POST['go'])){
        $thn = @$_POST['thn'];
        $bln = @$_POST['bln'];
?>
        <iframe width="400" height="700" src="<?PHP echo $vkryy['URLGajiYakkum']."/$thn/$bln/04"; ?>" frameborder="0" allowfullscreen></iframe>
        <textarea><?PHP echo"SOURCE:"; echo $vkryy['URLGajiYakkum']."$thn/$bln/04"; ?></textarea>
        <!-- https://upah.yakkum.org/index.php/slipurl/webslip/ff328be2f8736ee3709a537622dc4f90/2023/01/04
        https://upah.yakkum.org/index.php/slipurl/webslip/cef5524641d35342a138832d05ffe4e9/2023/01/04 -->
<?PHP } ?>