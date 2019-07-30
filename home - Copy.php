
<div class="col_w900_last">
    	 <div class="col_w420 lp_box float_l">
 <html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sufee Admin - HTML5 Admin Template</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="vendors/jqvmap/dist/jqvmap.min.css">


    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

<!-- Accordion -->
    <link rel="stylesheet" href="js/jquery-ui.css">
  <link rel="stylesheet" href="resources/demos/style.css">
<script src="js/jquery-1.12.4.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#accordion" ).accordion({
      collapsible: true
    });
  } );
  </script>
  <!-- Accordion --> 
 
	
</head>

<body>

    <script>
    function changeImage() {
        var image = document.getElementById('myImage1');
		var image = document.getElementById('myImage2');
		var image = document.getElementById('myImage3');
		var image = document.getElementById('myImage4');
        image1.src = "http://localhost/webmonitoring/grafik/datasuhu.php?" + new Date().getTime();
		image2.src = "http://localhost/webmonitoring/grafik/datakelembapan.php?" + new Date().getTime();
		image3.src = "http://localhost/webmonitoring/grafik/datagerak.php?" + new Date().getTime();
		image4.src = "http://localhost/webmonitoring/grafik/datagetar.php?" + new Date().getTime();
    }
    
    
    function countdown() {
    // your code goes here
    var count = 1;
    var timerId = setInterval(function() {
        count--;
       // console.log(count);
    //   document.getElementById("cdown").innerHTML = count.toString();
 
        if(count == 0) {
            changeImage();
            count = 1;
        }
    }, 1000);
}
 
countdown();
 
    </script>
	
	<!-- Accordion -->
<div id="accordion">
  <h3>Input Data Siswa</h3>
  <div>
<!-- Accordion -->
	 <div class="col-xl-15">
	<table>
	<tr>
	<th width="25%">Suhu</th>
    <th width="25%">Kelembapan</th>
	</tr>
	<td>
    <!--<p>Grafik Suhu: <span id="cdown" style="color:blue; font-size:20px"></span></p>-->
    <img id="myImage1" src="http://localhost/webmonitoring/grafik/datasuhu.php?" width="100%" height="50%" />
        </div>
         
        <div class="cleaner"></div>
	</td>
	<td>
    <!--<p>Grafik Suhu: <span id="cdown" style="color:blue; font-size:20px"></span></p>-->
    <img id="myImage2" src="http://localhost/webmonitoring/grafik/datakelembapan.php?" width="100%" height="50%" />
        </div>
         
        <div class="cleaner"></div>
	</td>
	</table>
    </div>
</br>
	
<!-- Accordion -->
</div>
<?php  
  $sqlc="select distinct(tgl) from `$tbmonitoring` order by `tgl` asc";
	$arrc=getData($conn,$sqlc);
		foreach($arrc as $dc) {							
				$tgl=$dc["tgl"];
				?>
  <h3>Data Api <?php echo $tgl;?></h3>
  <div>
<br />
<!-- Accordion -->
<table width="100%" class="table table-striped table-bordered table-hover">
  <tr bgcolor="#CCCCCC">
    <th width="3%">no</th>
    <th width="10%">Waktu</th>
    <th width="10%">Suhu</th>
    <th width="10%">Kelembapan</th>
    <th width="10%">Gas</th>
	<th width="10%">Api</th>
	<th width="10%">Getar</th>
	<th width="10%">Gerak</th>
	<th width="10%">Fan</th>
	<th width="10%">Motor_Air</th>
	<th width="10%">Buzzer</th>
    <th width="10%">menu</th>
  </tr>
<?php  
  $sql="select * from `$tbmonitoring` where tgl='$tgl' order by `id_monitoring` desc";
  $jum=getJum($conn,$sql);
		if($jum > 0){
	//--------------------------------------------------------------------------------------------
	$batas   = 10;
	$page = $_GET['page'];
	if(empty($page)){$posawal  = 0;$page = 1;}
	else{$posawal = ($page-1) * $batas;}
	
	$sql2 = $sql." LIMIT $posawal,$batas";
	$no = $posawal+1;
	//--------------------------------------------------------------------------------------------									
	$arr=getData($conn,$sql2);
		foreach($arr as $d) {							
				$id_monitoring=$d["id_monitoring"];
				$tgl=$d["tgl"];
				$jam=$d["jam"];
				$suhu=$d["suhu"];
				$kelembapan=$d["kelembapan"];
				$gas=$d["gas"];
				$api=$d["api"];
				$getar=$d["getar"];
				$gerak=$d["gerak"];
				$fan=$d["fan"];
				$motor_air=$d["motor_air"];
				$buzzer=$d["buzzer"];
				$kelembapan=$d["kelembapan"];
					$color="#dddddd";	
					if($no %2==0){$color="#eeeeee";}
echo"<tr bgcolor='$color'>
				<td>$no</td>
				<td>$tgl $jam</td>
				<td>$suhu</td>
				<td>$kelembapan</td>
				<td>$gas</td>
				<td>$api</td>
				<td>$getar</td>
				<td>$gerak</td>
				<td>$fan</td>
				<td>$motor_air</td>
				<td>$buzzer</td>
				<td align='center'>
<a href='?mnu=monitoring&pro=hapus&kode=$id_monitoring'><img src='ypathicon/ha.png' alt='hapus' 
onClick='return confirm(\"Apakah Anda benar-benar akan menghapus $tgl pada data monitoring ?..\")'></a></td>
				</tr>";
			
			$no++;
			}//while
		}//if
		else{echo"<tr><td colspan='7'><blink>Maaf, Data monitoring belum tersedia...</blink></td></tr>";}
?>
</table>

<?php
//Langkah 3: Hitung total data dan page 
$jmldata = $jum;
if($jmldata>0){
	if($batas<1){$batas=1;}
	$jmlhal  = ceil($jmldata/$batas);
	echo "<div class=paging>";
	if($page > 1){
		$prev=$page-1;
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$prev&mnu=monitoring'>« Prev</a></span> ";
	}
	else{echo "<span class=disabled>« Prev</span> ";}

	// Tampilkan link page 1,2,3 ...
	for($i=1;$i<=$jmlhal;$i++)
	if ($i != $page){echo "<a href='$_SERVER[PHP_SELF]?page=$i&mnu=monitoring'>$i</a> ";}
	else{echo " <span class=current>$i</span> ";}

	// Link kepage berikutnya (Next)
	if($page < $jmlhal){
		$next=$page+1;
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$next&mnu=monitoring'>Next »</a></span>";
	}
	else{ echo "<span class=disabled>Next »</span>";}
	echo "</div>";
	}//if jmldata

$jmldata = $jum;
	echo "<p align=center>Total Data <b>$jmldata</b> Item</p>";
?>
<!-- Accordion -->
</div>
<?php 
		}
		?>
</div>

</body>
<!-- Accordion -->
<?php
if(isset($_POST["Simpan"])){
	$pro=strip_tags($_POST["pro"]);
	$id_monitoring=strip_tags($_POST["id_monitoring"]);
	$id_monitoring0=strip_tags($_POST["id_monitoring0"]);
	$tgl=strip_tags($_POST["tgl"]);
	$jam=strip_tags($_POST["jam"]);
	$suhu=strip_tags($_POST["suhu"]);
	$kelembapan=strip_tags($_POST["kelembapan"]);
	$gas=strip_tags($_POST["gas"]);
	$gas=strip_tags($_POST["api"]);
	$gas=strip_tags($_POST["getar"]);
	$gas=strip_tags($_POST["gerak"]);
	$gas=strip_tags($_POST["fan"]);
	$gas=strip_tags($_POST["motor_air"]);
	$gas=strip_tags($_POST["keterangan"]);
	$gas=strip_tags($_POST["buzzer"]);
	
if($pro=="simpan"){
$sql=" INSERT INTO `$tbmonitoring` (
`id_monitoring` ,
`tgl` ,
`jam` ,
`suhu` ,
`kelembapan` ,
`gas` ,
`api` ,
`getar`,
`gerak`, 
`fan`,
`motor_air` ,
`keterangan`, 
`buzzer` 
) VALUES (
'', 
'$tgl', 
'$jam',
'$suhu',
'$kelembapan',
'$gas'
'$api' 
'$getar' 
'$gerak' 
'$fan' 
'$motor_air' 
'$keterangan' 
'$buzzer' 
)";
	
$simpan=process($conn,$sql);
		if($simpan) {echo "<script>alert('Data $id_monitoring berhasil disimpan !');document.location.href='?mnu=monitoring';</script>";}
		else{echo"<script>alert('Data $id_monitoring gagal disimpan...');document.location.href='?mnu=monitoring';</script>";}
	}
	else{
$sql="update `$tbmonitoring` set 
`tgl`='$tgl',
`jam`='$jam' ,
`suhu`='$suhu',
`gas`='$gas',
`kelembapan`='$kelembapan'
`api`='$api' 
`getar`='$getar' 
`gerak`='$gerak' 
`fan`='$fan' 
`motor_air`='$motor_air' 
`keterangan`='$keterangan' 
`buzzer`='$buzzer'  
where `id_monitoring`='$id_monitoring0'";
$ubah=process($conn,$sql);
	if($ubah) {echo "<script>alert('Data $id_monitoring berhasil diubah !');document.location.href='?mnu=monitoring';</script>";}
	else{echo"<script>alert('Data $id_monitoring gagal diubah...');document.location.href='?mnu=monitoring';</script>";}
	}//else simpan
}
?>

<?php
if($_GET["pro"]=="hapus"){
$id_monitoring=$_GET["kode"];
$sql="delete from `$tbmonitoring` where `id_monitoring`='$id_monitoring'";
$hapus=process($conn,$sql);
if($hapus) {echo "<script>alert('Data monitoring $id_monitoring berhasil dihapus !');document.location.href='?mnu=monitoring';</script>";}
else{echo"<script>alert('Data monitoring $id_monitoring gagal dihapus...');document.location.href='?mnu=monitoring';</script>";}
}
?>

	<!-- Right Panel -->

    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>


    <script src="vendors/chart.js/dist/Chart.bundle.min.js"></script>
    <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/widgets.js"></script>
    <script src="vendors/jqvmap/dist/jquery.vmap.min.js"></script>
    <script src="vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <script src="vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script>