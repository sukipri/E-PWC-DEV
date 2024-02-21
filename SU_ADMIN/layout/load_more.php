<div class="postList">
    <?php
    // Include the database configuration file
	 $dbh_srv = new PDO('mssql:host=zeus-pc;dbname=Citarum', "sa", "phoseidonathena");
  			$dbh_srv->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    
    // Get records from the database
    $query = $dbh_srv->query("SELECT TOP 2 * FROM TRawatJalan ORDER BY JalanNoReg DESC ");
    
    if($query->rowCount() > 0){ 
        while($row = $query->fetch(PDO::FETCH_ASSOC)){ 
            $postID = $row['JalanNoReg'];
    ?>
    <div class="list_item"><?php echo $row['PasienNama']; ?></div>
    <?php } ?>
    <div class="show_more_main" id="show_more_main<?php echo $postID; ?>">
        <span id="<?php echo $postID; ?>" class="show_more" title="Load more posts">Show more</span>
        <span class="loding" style="display: none;"><span class="loding_txt">Loading...</span></span>
    </div>
    <?php } ?>
</div>

<?php
if(!empty($_POST["id"])){

    // Include the database configuration file

    
    // Count all records except already displayed
    $query = $dbh_srv->query("SELECT COUNT(*) as num_rows FROM TRawatJalan WHERE JalanNoReg < ".$_POST['id']." ORDER BY id DESC");
    $row = $query->fetch_assoc();
    $totalRowCount = $row['num_rows'];
    
    $showLimit = 2;
    
    // Get records from the database
    $query = $dbh_srv->query("SELECT TOP $showLimit * FROM TRawatJalan  WHERE JalanNoReg < ".$_POST['id']." ORDER BY JalanNoReg DESC  ");

    if($query->num_rows > 0){ 
        while($row = $query->fetch_assoc()){
            $postID = $row['JalanNoReg'];
    ?>
        <div class="list_item"><?php echo $row['PasienNama']; ?></div>
    <?php } ?>
    <?php if($totalRowCount > $showLimit){ ?>
        <div class="show_more_main" id="show_more_main<?php echo $postID; ?>">
            <span id="<?php echo $postID; ?>" class="show_more" title="Load more posts">Show more</span>
            <span class="loding" style="display: none;"><span class="loding_txt">Loading...</span></span>
        </div>
    <?php } ?>
<?php
    }
}
?>