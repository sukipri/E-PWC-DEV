 <?php
$kt = @mysql_real_escape_string($_GET['address']); 
$query = "SELECT * from user_mhs  order by idmahasiswa asc limit 50 ";
$result = mysql_query($query) or die(mysql_error());
 
$arr = array();
while ($row = mysql_fetch_assoc($result)) {
    $temp = array(
  "idmahasiswa" => $row["idmahasiswa"],
    "username" => $row["username"],
    "passuser" => $row["passuser"], 
    "email" => $row["email"],
    "app" => $row["app"]);
   
    array_push($arr, $temp);
    
}
 
$data = json_encode($arr);
 
echo "{\"data\":" . $data . "}";
?>