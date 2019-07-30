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
        var image = document.getElementById('myImage');
        image.src = "http://localhost/webmonitoring/grafik/datagetar.php?" + new Date().getTime();
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
    <!--<p>Grafik Getar : <span id="cdown" style="color:blue; font-size:20px"></span></p>-->
    <img id="myImage" src="http://localhost/webmonitoring/grafik/datagetar.php?" width="1200" height="500" />
    
 <!-- Accordion -->
<div id="accordion">
<?php  
  $sqlc="select distinct(tgl) from `$tbmonitoring` order by `tgl` desc";
	$arrc=getData($conn,$sqlc);
		foreach($arrc as $dc) {							
				$tgl=$dc["tgl"];
				?>
  <h3>Data Getar <?php echo $tgl;?></h3>
  <div>
<br />
<!-- Accordion -->
 
		<table width="100%" class="table table-striped table-bordered table-hover">
  <tr bgcolor="#CCCCCC">
    <th width="3%">no</th>
    <th width="10%">Tanggal</th>
	<th width="10%">Jam</th>
    <th width="10%">Getar</th>
	<th width="10%">menu</th>
  </tr>
<?php  
  $sql="select * from `$tbmonitoring` order by `id_monitoring` desc";
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
				$getar=$d["getar"];
					$color="#dddddd";	
					if($no %2==0){$color="#eeeeee";}
echo"<tr bgcolor='$color'>
				<td>$no</td>
				<td>$tgl</td>
				<td>$jam</td>
				<td>$getar</td>
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
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$prev&mnu=getar'>« Prev</a></span> ";
	}
	else{echo "<span class=disabled>« Prev</span> ";}

	// Tampilkan link page 1,2,3 ...
	for($i=1;$i<=$jmlhal;$i++)
	if ($i != $page){echo "<a href='$_SERVER[PHP_SELF]?page=$i&mnu=getar'>$i</a> ";}
	else{echo " <span class=current>$i</span> ";}

	// Link kepage berikutnya (Next)
	if($page < $jmlhal){
		$next=$page+1;
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$next&mnu=getar'>Next »</a></span>";
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