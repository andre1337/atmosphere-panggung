
<?php
$gambar0="avatar.jpg";
require_once"konmysqli.php";
date_default_timezone_set("Asia/Jakarta");

	$tgl=date("Y-m-d");
	$jam=date("H:i:s");

	$suhu=strip_tags($_GET["suhu"]);
	
	
 $sql=" INSERT INTO `$tbmonitoring` (
`id_monitoring` ,
`tgl` ,
`jam` ,
`suhu` 
) VALUES (
'', 
'$tgl', 
'$jam',
'$suhu'
)";
	
$simpan=process($conn,$sql);

//INSERT INTO `tb_monitoring` ( `id_monitoring` , `tgl` , `jam` , `suhu` , `kelembapan` , `gas` , `api` , `getar`, `gerak`, `fan`, `motor_air` , `keterangan`, `buzzer` ) VALUES ( '', '2019-05-06', '14:59:42', '30', '80', '5' '1' '5' '6' '1' '1' '' '2' )
//============================================

function process($conn,$sql){
$s=false;
$conn->autocommit(FALSE);
try {
  $rs = $conn->query($sql);
  if($rs){
	    $conn->commit();
	    $last_inserted_id = $conn->insert_id;
 		$affected_rows = $conn->affected_rows;
  		$s=true;
  }
} 
catch (Exception $e) {
	echo 'fail: ' . $e->getMessage();
  	$conn->rollback();
}
$conn->autocommit(TRUE);
return $s;
}

?>