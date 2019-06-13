<?Php
@$cat_id=$_GET['cat_id'];
//$cat_id=2;
/// Preventing injection attack //// 
if(!is_numeric($cat_id)){
echo "Data Error";
exit;
 }
/// end of checking injection attack ////
include('connect.php');
//////// Do not Edit below /////////
try {
$dbo = new PDO('mysql:host='.$hab_dbhost_name.';dbname='.$hab_database, $hab_username, $hab_password);
} catch (PDOException $e) {
print "Error!: " . $e->getMessage() . "<br/>";
die();
}

$sql="select subcategory,subcat_id from query_subcategory where cat_id='$cat_id'";
$row=$dbo->prepare($sql);
$row->execute();
$result=$row->fetchAll(PDO::FETCH_ASSOC);

$main = array('data'=>$result);
echo json_encode($main);
?>