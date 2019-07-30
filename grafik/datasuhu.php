<?php // content="text/plain; charset=utf-8"
 
 
require_once"../koneksivar.php";

$conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);
if ($conn->connect_error) {
  trigger_error('Database connection failed: '  . $conn->connect_error, E_USER_ERROR);
}



define('__ROOT__', dirname(dirname(__FILE__))); 
require_once ('jpgraph.php');
require_once ('jpgraph_line.php');
require_once ('jpgraph_error.php');
 
$y_axis = array();




 $i=0;
 $max=40;
 $kolom="suhu";
  $sql="select `$kolom` from `$tbmonitoring` order by `id_monitoring` desc limit 0,$max";
  	$arr=getData($conn,$sql);
		foreach($arr as $d) {							
				/*
				$id_monitoring=$d["id_monitoring"];
				$tgl=$d["tgl"];
				$jam=$d["jam"];
				$suhu=$d["suhu"];
				$kelembapan=$d["kelembapan"];
				$gas=$d["gas"];,.
				$api=$d["api"];
				$getar=$d["getar"];
				$gerak=$d["gerak"];
				$fan=$d["fan"];
				$motor_air=$d["motor_air"];
				$buzzer=$d["buzzer"];
				$kelembapan=$d["kelembapan"];
				*/
				$y_axis[$i]=$d["$kolom"];
				
				$i++;			
		}
		
		$y_axis = array_reverse($y_axis);
		
/*	
for($j=0;$j<$i;$j++){
	$G=$j;
	$k=$max-$G;
	$M[$j]=$y_axis[$k];
}	
*/
$graph = new Graph(1200,500);
$graph->img->SetMargin(40,40,40,40);  
$graph->img->SetAntiAliasing();
$graph->SetScale("textlin");
$graph->SetShadow();
$graph->title->Set("Example of line centered plot");
$graph->title->SetFont(FF_FONT1,FS_BOLD);
 
 
 
$p1 = new LinePlot($y_axis);//y_axis
$p1->mark->SetType(MARK_FILLEDCIRCLE);
$p1->mark->SetFillColor("red");
$p1->mark->SetWidth(4);
$p1->SetColor("blue");
$p1->SetCenter();
$graph->Add($p1);
 
$graph->Stroke();
 
 
 
 function getData($conn,$sql){
	$rs=$conn->query($sql);
	$rs->data_seek(0);
	$arr = $rs->fetch_all(MYSQLI_ASSOC);
	//foreach($arr as $row) {
	//  echo $row['nama_kelas'] . '*<br>';
	//}
	
	$rs->free();
	return $arr;
}

?>