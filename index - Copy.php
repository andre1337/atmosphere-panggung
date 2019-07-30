<?php
if (version_compare(phpversion(), "5.3.0", ">=")  == 1)
  error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
else
  error_reporting(E_ALL & ~E_NOTICE);  
  ?>
<?php
$gambar0="avatar.jpg";
session_start();
//error_reporting(0);
require_once"konmysqli.php";

if(!isset($_SESSION["cid"])){
die("<script>location.href='login.php';</script>");
}

$mnu=$_GET["mnu"];
date_default_timezone_set("Asia/Jakarta");

?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Deteksi & Monitoring GAS</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">


    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">

    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
</head>

<body>
    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./"><img src="images/logotulisan.png" alt="Logo"></a>
				<br>
				<img class="user-avatar rounded-circle" src="ypathfile/<?php echo $_SESSION["cgambar"]; ?>" width="150px" height="150px">
				<br>
				<br>
                <a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <?php
if($_SESSION["cstatus"]=="Administrator"){	
      echo"
		<li><a href='index.php?mnu=home'><i class='menu-icon fa fa-home'></i>Home</a></li>
		<!--<li><a href='index.php?mnu=admin'><i class='menu-icon fa fa-dashboard'></i>Admin</a></li>-->
		<li><a href='index.php?mnu=api'><i class='menu-icon fa fa-puzzle-piece'></i>Api</a></li>
		<li><a href='index.php?mnu=gas'><i class='menu-icon fa fa-id-badge'></i>Gas</a></li>
		<li><a href='index.php?mnu=suhu'><i class='menu-icon fa fa-bars'></i>Suhu</a></li>
		<li><a href='index.php?mnu=kelembapan'><i class='menu-icon fa fa-share-square-o'></i>Kelembapan</a></li>
		<li><a href='index.php?mnu=gerak'><i class='menu-icon fa fa-id-card-o'></i>Gerak</a></li>
		<li><a href='index.php?mnu=getar'><i class='menu-icon fa fa-exclamation-triangle'></i>Getar</a></li>
                     <!--<li class='menu-item-has-children dropdown'>
                        <a href='#' class='dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'> 
						<i class='menu-icon fa fa-laptop'></i>Sensor</a>
                     
                        <ul class='sub-menu children dropdown-menu'>
                            <li><i class='fa fa-puzzle-piece'></i><a href='index.php?mnu=api'>Api</a></li>
                            <li><i class='fa fa-id-badge'></i><a href='index.php?mnu=gas'>Gas</a></li>
                            <li><i class='fa fa-bars'></i><a href='index.php?mnu=suhu'>Suhu</a></li>
                            <li><i class='fa fa-share-square-o'></i><a href='index.php?mnu=kelembapan'>Kelembapan</a></li>
                            <li><i class='fa fa-id-card-o'></i><a href='index.php?mnu=gerak'>Gerak</a></li>
                            <li><i class='fa fa-exclamation-triangle'></i><a href='index.php?mnu=getar'>Getar</a></li>
                        </ul>
                    </li>-->
      <li><a href='index.php?mnu=logout'><i class='menu-icon fa fa-sign-out'></i>Logout</a></li>";
}

else{
	 echo"<li><a href='index.php?mnu=home'><i class='menu-icon fa fa-home'></i>Home</a></li>";
	 echo"<li><a href='index.php?mnu=login'><i class='menu-icon fa fa-sign-in'></i>Login</a></li>";	 
	}
      ?>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                
                <div class="col-sm-12">
					<div class="user-area dropdown float-left">
						DETEKSI & MONITORING
					</div>
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           HI, <?php echo $_SESSION["cnama"]; ?> &nbsp;&nbsp; <img class="user-avatar rounded-circle" src="ypathfile/<?php echo $_SESSION["cgambar"]; ?>">
                        </a>

                        
                    </div>

                    
                </div>
            </div>

        </header><!-- /header -->
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <!--<div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Table</a></li>
                            <li class="active">Data table</li>
                        </ol>
                    </div>
                </div>
            </div>-->
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Data Table</strong>
                            </div>
                            <div class="card-body">
                                <?php	
     echo"<h2> ".strtoupper($mnu)."</h2><br>"; 
       
if($mnu=="admin"){require_once"admin/admin.php";}
else if($mnu=="monitoring"){require_once"monitoring/monitoring.php";}
else if($mnu=="api"){require_once"grafik/indexapi.php";}
else if($mnu=="suhu"){require_once"grafik/indexsuhu.php";}
else if($mnu=="kelembapan"){require_once"grafik/indexkelembapan.php";}
else if($mnu=="gas"){require_once"grafik/indexgas.php";}
else if($mnu=="gerak"){require_once"grafik/indexgerak.php";}
else if($mnu=="getar"){require_once"grafik/indexgetar.php";}
else if($mnu=="login"){require_once"login.php";}
else if($mnu=="logout"){require_once"logout.php";}
else {require_once"home.php";}


?> 
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->

    <!-- Right Panel -->


    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
	<script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <?php
	 echo'<script src="assets/js/main.js"></script>'; ?>
		
    <script src="vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
	
    <script src="vendors/jszip/dist/jszip.min.js"></script>
    <script src="vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="vendors/pdfmake/build/vfs_fonts.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.colVis.min.js"></script>
    <script src="assets/js/init-scripts/data-table/datatables-init.js"></script>


</body>

</html>

<?php function RP($rupiah){return number_format($rupiah,"2",",",".");}?>
<?php
function WKT($sekarang){
$tanggal = substr($sekarang,8,2)+0;
$bulan = substr($sekarang,5,2);
$tahun = substr($sekarang,0,4);

$judul_bln=array(1=> "Januari", "Februari", "Maret", "April", "Mei","Juni", "Juli", "Agustus", "September","Oktober", "November", "Desember");
$wk=$tanggal." ".$judul_bln[(int)$bulan]." ".$tahun;
return $wk;
}
?>
<?php
function WKTP($sekarang){
$tanggal = substr($sekarang,8,2)+0;
$bulan = substr($sekarang,5,2);
$tahun = substr($sekarang,2,2);

$judul_bln=array(1=> "Jan", "Feb", "Mar", "Apr", "Mei","Jun", "Jul", "Agu", "Sep","Okt", "Nov", "Des");
$wk=$tanggal." ".$judul_bln[(int)$bulan]."'".$tahun;
return $wk;
}
?>
<?php
function BAL($tanggal){
	$arr=explode(" ",$tanggal);
	if($arr[1]=="Januari"||$arr[1]=="January"){$bul="01";}
	else if($arr[1]=="Februari"||$arr[1]=="February"){$bul="02";}
	else if($arr[1]=="Maret"||$arr[1]=="March"){$bul="03";}
	else if($arr[1]=="April"){$bul="04";}
	else if($arr[1]=="Mei"||$arr[1]=="May"){$bul="05";}
	else if($arr[1]=="Juni"||$arr[1]=="June"){$bul="06";}
	else if($arr[1]=="Juli"||$arr[1]=="July"){$bul="07";}
	else if($arr[1]=="Agustus"||$arr[1]=="August"){$bul="08";}
	else if($arr[1]=="September"){$bul="09";}
	else if($arr[1]=="Oktober"||$arr[1]=="October"){$bul="10";}
	else if($arr[1]=="November"){$bul="11";}
	else if($arr[1]=="Nopember"){$bul="11";}
	else if($arr[1]=="Desember"||$arr[1]=="December"){$bul="12";}
return "$arr[2]-$bul-$arr[0]";	
}
?>	


<?php
function BALP($tanggal){
	$arr=split(" ",$tanggal);
	if($arr[1]=="Jan"){$bul="01";}
	else if($arr[1]=="Feb"){$bul="02";}
	else if($arr[1]=="Mar"){$bul="03";}
	else if($arr[1]=="Apr"){$bul="04";}
	else if($arr[1]=="Mei"){$bul="05";}
	else if($arr[1]=="Jun"){$bul="06";}
	else if($arr[1]=="Jul"){$bul="07";}
	else if($arr[1]=="Agu"){$bul="08";}
	else if($arr[1]=="Sep"){$bul="09";}
	else if($arr[1]=="Okt"){$bul="10";}
	else if($arr[1]=="Nov"){$bul="11";}
	else if($arr[1]=="Nop"){$bul="11";}
	else if($arr[1]=="Des"){$bul="12";}
return "$arr[2]-$bul-$arr[0]";	
}
?>


<?php
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

function getJum($conn,$sql){
  $rs=$conn->query($sql);
  $jum= $rs->num_rows;
	$rs->free();
	return $jum;
}

function getField($conn,$sql){
	$rs=$conn->query($sql);
	$rs->data_seek(0);
	$d= $rs->fetch_assoc();
	$rs->free();
	return $d;
}

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

function getAdmin($conn,$kode){
$field="username";
$sql="SELECT `$field` FROM `tb_admin` where `kode_admin`='$kode'";
$rs=$conn->query($sql);	
	$rs->data_seek(0);
	$row = $rs->fetch_assoc();
	$rs->free();
    return $row[$field];
	}

function getCustomer($conn,$kode){
$field="nama_customer";
$sql="SELECT `$field` FROM `tb_customer` where `id_customer`='$kode'";
$rs=$conn->query($sql);	
	$rs->data_seek(0);
	$row = $rs->fetch_assoc();
	$rs->free();
    return $row[$field];
	}

function getProduct($conn,$kode){
$field="nama_product";
$sql="SELECT `$field` FROM `tb_product` where `id_product`='$kode'";
$rs=$conn->query($sql);	
	$rs->data_seek(0);
	$row = $rs->fetch_assoc();
	$rs->free();
    return $row[$field];
	}

?>
