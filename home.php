<!DOCTYPE html>
<html>
<body>

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
	<table>
	<th width="25%">Suhu</th>
    <th width="25%">Kelembapan</th>
	</tr>
	<td>
    <!--<p>Grafik Suhu: <span id="cdown" style="color:blue; font-size:20px"></span></p>-->
    <img id="myImage3" src="http://localhost/webmonitoring/grafik/datagerak.php?" width="100%" height="50%" />
        </div>
         
        <div class="cleaner"></div>
	</td>
	<td>
    <!--<p>Grafik Suhu: <span id="cdown" style="color:blue; font-size:20px"></span></p>-->
    <img id="myImage4" src="http://localhost/webmonitoring/grafik/datagetar.php?" width="100%" height="50%" />
        </div>
         
        <div class="cleaner"></div>
	</td>
	</table>
 

 
 
	 <!-- Accordion -->
<div id="accordion">
<?php  
  $sqlc="select distinct(tgl) from `$tbmonitoring` order by `tgl` desc";
	$arrc=getData($conn,$sqlc);
		foreach($arrc as $dc) {							
				$tgl=$dc["tgl"];
				?>
  <h3>Data Tanggal <?php echo $tgl;?></h3>
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
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$prev&mnu=home'>« Prev</a></span> ";
	}
	else{echo "<span class=disabled>« Prev</span> ";}

	// Tampilkan link page 1,2,3 ...
	for($i=1;$i<=$jmlhal;$i++)
	if ($i != $page){echo "<a href='$_SERVER[PHP_SELF]?page=$i&mnu=home'>$i</a> ";}
	else{echo " <span class=current>$i</span> ";}

	// Link kepage berikutnya (Next)
	if($page < $jmlhal){
		$next=$page+1;
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$next&mnu=home'>Next »</a></span>";
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
</html>
