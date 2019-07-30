<?php

$tanggal=WKT(date("Y-m-d"));
$pro="simpan";
$status="Aktif";
//$PATH="ypathcss";
?>
<link type="text/css" href="<?php echo "$PATH/base/";?>ui.all.css" rel="stylesheet" />   
<script type="text/javascript" src="<?php echo "$PATH/";?>jquery-1.3.2.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/";?>ui/ui.core.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/";?>ui/ui.datepicker.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/";?>ui/i18n/ui.datepicker-id.js"></script>
    
  <script type="text/javascript"> 
      $(document).ready(function(){
        $("#tanggal").datepicker({
					dateFormat  : "dd MM yy",        
          changeMonth : true,
          changeYear  : true					
        });
      });
    </script>    

<script type="text/javascript"> 
function PRINT(){ 
win=window.open('admin/print.php','win','width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, password=0'); } 
</script>
<script language="JavaScript">
function buka(url) {window.open(url, 'window_baru', 'width=800,height=600,left=320,top=100,resizable=1,scrollbars=1');}
</script>

<?php
  $sql="select `id_admin` from `$tbadmin` order by `id_admin` desc";
  $q=mysqli_query($conn, $sql);
  $jum=mysqli_num_rows($q);
  $th=date("y");
  $bl=date("m")+0;if($bl<10){$bl="0".$bl;}

  $kd="ADM".$th.$bl;//KEG1610001
  if($jum > 0){
   $d=mysqli_fetch_array($q);
   $idmax=$d["id_admin"];
   
   $bul=substr($idmax,5,2);
   $tah=substr($idmax,3,2);
    if($bul==$bl && $tah==$th){
     $urut=substr($idmax,7,3)+1;
     if($urut<10){$idmax="$kd"."00".$urut;}
     else if($urut<100){$idmax="$kd"."0".$urut;}
     else{$idmax="$kd".$urut;}
    }//==
    else{
     $idmax="$kd"."001";
     }   
   }//jum>0
  else{$idmax="$kd"."001";}
  $id_admin=$idmax;
?>
<?php
if($_GET["pro"]=="ubah"){
	$id_admin=$_GET["kode"];
	$sql="select * from `$tbadmin` where `id_admin`='$id_admin'";
	$d=getField($conn,$sql);
				$id_admin=$d["id_admin"];
				$nama_admin=$d["nama_admin"];
				$username=$d["username"];
				$telepon=$d["telepon"];
				$username=$d["username"];
				$password=$d["password"];
				$status=$d["status"];
				$gambar=$d["gambar"];
				$gambar0=$d["gambar"];
				$keterangan=$d["keterangan"];
				$pro="ubah";		
}
?>

<form action="" method="post" enctype="multipart/form-data">
<table width="40%" class="table table-striped table-bordered table-hover" >
<tr>
<th width="66"><label for="id_admin">id_admin</label>
<th width="9">:
<th colspan="2"><b><?php echo $id_admin;?></b></tr>
<tr>
<td><label for="nama_admin">nama_admin</label>
<td>:<td width="213"><input name="nama_admin" type="text" id="nama_admin" value="<?php echo $nama_admin;?>" size="20" />
</td>
</tr>


<tr>
<td height="24"><label for="email">email</label>
<td>:<td><input name="email" type="text" id="email" value="<?php echo $email;?>" size="25" />
</td>
</tr>

<tr>
<td height="24"><label for="telepon">telepon</label>
<td>:<td><input name="telepon" type="text" id="telepon" value="<?php echo $telepon;?>" size="15" />
</td>
</tr>

<tr>
<td height="24"><label for="username">username</label>
<td>:<td><input name="username" type="text" id="username" value="<?php echo $username;?>" size="25" />
</td>
</tr>

<tr>
<td height="24"><label for="password">password</label>
<td>:<td><input name="password" type="text" id="password" value="<?php echo $password;?>" size="25" />
</td>
</tr>

<tr>
  <td height="24">gambar
    <td>:<td colspan="2"><label for="gambar"></label>
        <input name="gambar" type="file" id="gambar" size="20" /> 
      => <a href='#' onclick='buka("admin/zoom.php?id=<?php echo $kode_admin;?>")'><?php echo $gambar0;?></a></td>
</tr>

<tr>
<td><label for="status">status</label>
<td>:<td colspan="2">
<input type="radio" name="status" id="status"  checked="checked" value="Aktif" <?php if($status=="Aktif"){echo"checked";}?>/>Aktif 
<input type="radio" name="status" id="status" value="Tidak Aktif" <?php if($status=="Tidak Aktif"){echo"checked";}?>/>Tidak Aktif
</td></tr>

<tr>
<td height="24"><label for="keterangan">keterangan</label>
<td>:<td><input name="keterangan" type="text" id="keterangan" value="<?php echo $keterangan;?>" size="25" />
</td>
</tr>

<tr>
<td>
<td>
<td colspan="2"><input name="Simpan" type="submit" id="Simpan" value="Simpan" />
        <input name="pro" type="hidden" id="pro" value="<?php echo $pro;?>" />
        <input name="status0" type="hidden" id="status0" value="<?php echo $status0;?>" />
        <input name="id_admin" type="hidden" id="id_admin" value="<?php echo $id_admin;?>" />
        <input name="id_admin0" type="hidden" id="id_admin0" value="<?php echo $id_admin0;?>" />
		<input name="gambar0" type="hidden" id="gambar0" value="<?php echo $gambar0;?>" />
        <a href="?mnu=admin"><input name="Batal" type="button" id="Batal" value="Batal" /></a>
</td></tr>
</table>
</form>
<br />
Data Admin: 
| <a href="admin/pdf.php"><img src='ypathicon/pdf.png' alt='PDF'></a> 
| <a href="admin/xml.php"><img src='ypathicon/xml.png' alt='XML'></a> 
| <a href="admin/xls.php"><img src='ypathicon/xls.png' alt='XLS'></a> 
| <img src='ypathicon/print.png' alt='PRINT' OnClick="PRINT()"> |
<br>

<table width="100%" class="table table-striped table-bordered table-hover">
  <tr bgcolor="#CCCCCC">
    <th width="3%">No</td>
    <th width="10%">id_admin</td>
    <th width="20%">nama_admin</td>
	<th width="30%">email</td>
    <th width="30%">username</td>
    <th width="20%">telepon</td>
	<th width="30%">password</td>
    <th width="10%">status</td>
	<th width="10%">keterangan</td>
    <th width="15%">Menu</td>
  </tr>
<?php  
  $sql="select * from `$tbadmin` order by `id_admin` desc";
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
				$id_admin=$d["id_admin"];
				$nama_admin=$d["nama_admin"];
				$username=$d["username"];
				$telepon=$d["telepon"];
				$email=$d["email"];
				$username=$d["username"];
				$password=$d["password"];
				$gambar=$d["gambar"];
				$gambar0=$d["gambar"];
				$status=$d["status"];
				$keterangan=$d["keterangan"];
				$color="#dddddd";		
					if($no %2==0){$color="#eeeeee";}
echo"<tr bgcolor='$color'>
				<td>$no</td>
				<td>$id_admin</td>
				<td>$nama_admin</td>
				<td>$email</td>
				<td>$username</td>
				<td>$telepon</td>
				<td>$password</td>
				<td>$status</td>
				<td>$keterangan</td>
				<td><div align='center'>
<a href='?mnu=admin&pro=ubah&kode=$id_admin'><img src='ypathicon/ub.png' alt='ubah'></a>
<a href='?mnu=admin&pro=hapus&kode=$id_admin'><img src='ypathicon/ha.png' alt='hapus' 
onClick='return confirm(\"Apakah Anda benar-benar akan menghapus $nama pada data admin ?..\")'></a></div></td>
				</tr>";
				
			$no++;
			}//while
		}//if
		else{echo"<tr><td colspan='6'><blink>Maaf, Data admin belum tersedia...</blink></td></tr>";}
?>
</table>

<?php
$jmldata = $jum;
if($jmldata>0){
	if($batas<1){$batas=1;}
	$jmlhal  = ceil($jmldata/$batas);
	echo "<div class=paging>";
	if($page > 1){
		$prev=$page-1;
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$prev&mnu=admin'>« Prev</a></span> ";
	}
	else{echo "<span class=disabled>« Prev</span> ";}

	for($i=1;$i<=$jmlhal;$i++)
	if ($i != $page){echo "<a href='$_SERVER[PHP_SELF]?page=$i&mnu=admin'>$i</a> ";}
	else{echo " <span class=current>$i</span> ";}

	if($page < $jmlhal){
		$next=$page+1;
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$next&mnu=admin'>Next »</a></span>";
	}
	else{ echo "<span class=disabled>Next »</span>";}
	echo "</div>";
	}//if jmldata

$jmldata = $jum;
echo "<p align=center>Total data <b>$jmldata</b> item</p>";
?>
<?php
if(isset($_POST["Simpan"])){
	$pro=strip_tags($_POST["pro"]);
	$id_admin=strip_tags($_POST["id_admin"]);
	$id_admin0=strip_tags($_POST["id_admin"]);
	$nama_admin=strip_tags($_POST["nama_admin"]);
	$username=strip_tags($_POST["username"]);
	$telepon=strip_tags($_POST["telepon"]);
	$username=strip_tags($_POST["username"]);
	$password=strip_tags($_POST["password"]);
	$keterangan=strip_tags($_POST["keterangan"]);
	$status=strip_tags($_POST["status"]);
	$gambar0=strip_tags($_POST["gambar0"]);
	if ($_FILES["gambar"] != "") {
		@copy($_FILES["gambar"]["tmp_name"],"$YPATH/".$_FILES["gambar"]["name"]);
		$gambar=$_FILES["gambar"]["name"];
		} 
	else {$gambar=$gambar0;}
	if(strlen($gambar)<1){$gambar=$gambar0;}
	
if($pro=="simpan"){
echo $sql="INSERT INTO `tb_admin` (`id_admin`, `nama_admin`, `email`, `telepon`, `username`,`gambar`, `password`, `status`, `keterangan`) 
VALUES ('$id_admin', '$nama_admin', '$email', '$telepon', '$username', '$password', '$gambar', '$status', '$keterangan')";
	
$simpan=process($conn,$sql);
if($simpan) {echo "<script>alert('Data $id_admin berhasil disimpan !');document.location.href='?mnu=admin';</script>";}
		else{echo"<script>alert('Data $id_admin gagal disimpan...');document.location.href='?mnu=admin';</script>";}
	}
	else{
	$sql="update `$tbadmin` set `nama_admin`='$nama_admin',`username`='$username',`telepon`='$telepon',`gambar`='$gambar' ,`username`='$username',`password`='$password',
	`status`='$status'  where `id_admin`='$id_admin0'";
	$ubah=process($conn,$sql);
		if($ubah) {echo "<script>alert('Data $id_admin berhasil diubah !');document.location.href='?mnu=admin';</script>";}
		else{echo"<script>alert('Data $id_admin gagal diubah...');document.location.href='?mnu=admin';</script>";}
	}//else simpan
}
?>

<?php
if($_GET["pro"]=="hapus"){
$id_admin=$_GET["kode"];
$sql="delete from `$tbadmin` where `id_admin`='$id_admin'";
$hapus=process($conn,$sql);
	if($hapus) {echo "<script>alert('Data $id_admin berhasil dihapus !');document.location.href='?mnu=admin';</script>";}
	else{echo"<script>alert('Data $id_admin gagal dihapus...');document.location.href='?mnu=admin';</script>";}
}
?>

