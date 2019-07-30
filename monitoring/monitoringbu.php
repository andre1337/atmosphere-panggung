<?php
$pro="simpan";
$tgl=WKT(date("Y-m-d"));
?>
<link type="text/css" href="<?php echo "$PATH/base/";?>ui.all.css" rel="stylesheet" />   
<script type="text/javascript" src="<?php echo "$PATH/";?>jquery-1.3.2.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/";?>ui/ui.core.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/";?>ui/ui.datepicker.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/";?>ui/i18n/ui.datepicker-id.js"></script>
    
  <script type="text/javascript"> 
      $(document).ready(function(){
        $("#tgl").datepicker({
					dateFormat  : "dd MM yy",        
          changeMonth : true,
          changeYear  : true					
        });
      });
    </script>    

<script type="text/javascript"> 
function PRINT(){ 
win=window.open('siswa/siswa_print.php','win','width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, status=0'); } 
</script>
<script language="JavaScript">
function buka(url) {window.open(url, 'window_baru', 'width=800,height=600,left=320,top=100,resizable=1,scrollbars=1');}
</script>



<?php
if($_GET["pro"]=="ubah"){
	$id_monitoring=$_GET["kode"];
	$sql="select * from `$tbmonitoring` where `id_monitoring`='$id_monitoring'";
	$d=getField($conn,$sql);
				$id_monitoring=$d["id_monitoring"];
				$id_monitoring0=$d["id_monitoring"];
				$tgl=WKT($d["tgl"]);
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
				$pro="ubah";		
}
?>

<form action="" method="post" enctype="multipart/form-data">
<table width="60%" class="table table-striped table-bordered table-hover">
<tr>
<td width="21%"><label for="tgl">tgl</label>
<td width="1%">:
<td width="78%" colspan="2"><input name="tgl" type="text" id="tgl" value="<?php echo $tgl;?>" size="30" /></td>
</tr>

<tr>
<td height="24"><label for="jam">jam</label>
<td>:<td colspan="2"><input name="jam" type="text" id="jam" value="<?php echo $jam;?>" size="15" />
</td>
</tr>

<tr>
<td height="24"><label for="suhu">suhu</label>
<td>:
<td><input name="suhu" type="text" id="suhu" value="<?php echo $suhu;?>" size="30" />
  <label for="kode_barang"></label></td>
</tr>

<tr>
<td height="24"><label for="kelembapan">kelembapan</label>
<td>:<td colspan="2"><input name="kelembapan" type="text" id="kelembapan" value="<?php echo $kelembapan;?>" size="25" />
</td>
</tr>

<tr>
<td><label for="gas">gas</label>
<td>:<td colspan="2"><input name="gas" type="text" id="gas" value="<?php echo $gas;?>" size="15" /></td></tr>

<tr>
<td height="24"><label for="api">api</label>
<td>:<td colspan="2"><input name="api" type="text" id="api" value="<?php echo $api;?>" size="25" />
</td>
</tr>

<tr>
<td height="24"><label for="getar">getar</label>
<td>:<td colspan="2"><input name="getar" type="text" id="getar" value="<?php echo $getar;?>" size="25" />
</td>
</tr>

<tr>
<td height="24"><label for="gerak">gerak</label>
<td>:<td colspan="2"><input name="gerak" type="text" id="gerak" value="<?php echo $gerak;?>" size="25" />
</td>
</tr>

<tr>
<td height="24"><label for="fan">fan</label>
<td>:<td colspan="2"><input name="fan" type="text" id="fan" value="<?php echo $fan;?>" size="25" />
</td>
</tr>

<tr>
<td height="24"><label for="motor_air">motor_air</label>
<td>:<td colspan="2"><input name="motor_air" type="text" id="motor_air" value="<?php echo $motor_air;?>" size="25" />
</td>
</tr>

<tr>
<td height="24"><label for="keterangan">keterangan</label>
<td>:<td colspan="2"><input name="keterangan" type="text" id="keterangan" value="<?php echo $keterangan;?>" size="25" />
</td>
</tr>

<tr>
<td height="24"><label for="buzzer">buzzer</label>
<td>:<td colspan="2"><input name="buzzer" type="text" id="buzzer" value="<?php echo $buzzer;?>" size="25" />
</td>
</tr>

<tr>
<td>
<td>
<td colspan="2">	
        <input name="Simpan" type="submit" id="Simpan" value="Simpan" />
        <input name="pro" type="hidden" id="pro" value="<?php echo $pro;?>" />
        <input name="id_monitoring" type="hidden" id="id_monitoring" value="<?php echo $id_monitoring;?>" />
        <a href="?mnu=monitoring"><input name="Batal" type="button" id="Batal" value="Batal" /></a>
</td></tr>
</table>
</form>

Data Sensor: 
|| <img src='ypathicon/print.png' alt='PRINT' OnClick="PRINT()"> |
<a href="siswa/siswa_pdf.php"><img src='ypathicon/pdf.png' alt='PDF'></a> 
| <a href="siswa/siswa_xls.php"><img src='ypathicon/xls.png' alt='XLS'></a> 

<br>

<table width="100%" class="table table-striped table-bordered table-hover">
  <tr bgcolor="#CCCCCC">
    <th width="3%">no</th>
    <th width="10%">Id</th>
    <th width="20%">tgl</th>
    <th width="10%">jam</th>
    <th width="30%">suhu</th>
    <th width="15%">kelembapan</th>
    <th width="10%">gas</th>
	<th width="10%">api</th>
	<th width="10%">getar</th>
	<th width="10%">gerak</th>
	<th width="10%">fan</th>
	<th width="10%">motor_air</th>
	<th width="10%">keterangan</th>
	<th width="10%">buzzer</th>
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
				<td>$id_monitoring</td>
				<td>$tgl</td>
				<td>$jam</td>
				<td>$suhu</td>
				<td>$kelembapan</td>
				<td>$gas</td>
				<td>$api</td>
				<td>$getar</td>
				<td>$gerak</td>
				<td>$fan</td>
				<td>$motor_air</td>
				<td>$keterangan</td>
				<td>$buzzer</td>
				<td align='center'>
<a href='?mnu=monitoring&pro=ubah&kode=$id_monitoring'><img src='ypathicon/ub.png' alt='ubah'></a>
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


