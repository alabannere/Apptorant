<?php
include '../config-site.php';

$uid = $_POST['uid'];
$code = $_POST['code'];

global $conn;	
$data= array();
$q = "SELECT * FROM users WHERE ID = '".$uid."' AND user_code = '".$code."'";		

$query = $conn->query($q);
if($query->num_rows>0){
    $res = 'ok';
}else{
    $res = 'error';
}
echo $res;
?>