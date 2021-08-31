<?php
include 'conn.php';

$queryResult=$connect->query("SELECT * FROM `tbl_mr` WHERE status_permintaan='pending'");

$result=array();

while($fetchData=$queryResult->fetch_assoc()){
	$result[]=$fetchData;
}

echo json_encode($result);

?>