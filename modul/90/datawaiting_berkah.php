<!DOCTYPE html>

<?php
session_start();
if($_SESSION['FirstName'] == '90') {header('Location: ?page=90');} ;
include_once "../library/inc.library.php";
include_once "../library/inc.pilihan.php";
include_once "../library/inc.tanggal.php";

require('../config/travel-config.php'); //Load DB(mysql) config parameter

$Travel= $_SESSION['Travel'];




?>

<html>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta charset="utf-8">
    <title>Umroh - Safwa</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="icon" sizes="192x192" href="../img/Icon.png"/>
    <!-- Glazzed & Bootstrap -->
    <link rel="stylesheet" type="text/css" href="../css/main.min.css">
    <!-- Pixeden Icon Fonts -->
    <link rel="stylesheet" type="text/css" href="../css/pe-icon-7-filled.css">
    <link rel="stylesheet" type="text/css" href="../css/pe-icon-7-stroke.css">
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all">




</head>
<body>
<style type="text/css">
tr:nth-child(even){background-color: #f2f2f2}

    table, th, td {
 border: 1px solid black    ;
  padding-top: 12px;
  padding-left: 10px;
  padding-right: 10px;
  padding-bottom: 10px;
  border-radius: 5px;
    font-family: 'Raleway', sans-serif;
  }

.table-number {

  font-family: 'Roboto', sans-serif;
}

#grad1 {
height: 50px;
background: -webkit-linear-gradient(left, #1ac5fb , #1d72f1); /* For Safari 5.1 to 6.0 */
background: -o-linear-gradient(right, #1ac5fb, #1d72f1); /* For Opera 11.1 to 12.0 */
background: -moz-linear-gradient(right, #1ac5fb, #1d72f1); /* For Firefox 3.6 to 15 */
background: linear-gradient(to right, #1ac5fb , #1d72f1); /* Standard syntax (must be last) */
}

#grad2 {
                height: 50px;
                background: #fff; /* For Safari 5.1 to 6.0 */

}

th {
    background-color: #1ac5fb;
    color: white;
}

</style>


<?php
# UNTUK PAGING (PEMBAGIAN HALAMAN)
$row = 10;
$hal = isset($_GET['hal']) ? $_GET['hal'] : 0;
$pageSql = "SELECT * FROM jamaah WHERE packages_program='Safwa' ";
$pageQry = mysql_query($pageSql, $Link) or die ("error paging: ".mysql_error());
$jml   = mysql_num_rows($pageQry);
$max   = ceil($jml/$row);

// Jika tombol Cari diklik
if(isset($_POST['btnCari'])){
  if($_POST) {
    // Cari berdasarkan Nomor RM dan Nama Pasien yang mirip
    $txtKataKunci = $_POST['txtKataKunci'];
    $mySql = "SELECT * FROM jamaah WHERE  first_name LIKE '%$txtKataKunci%' and packages_program='Safwa'
          ORDER BY nomor_id ASC LIMIT $hal, $row";
  }
}
else {
  $mySql = "SELECT * FROM jamaah WHERE packages_program='Safwa' ORDER by nomor_id ASC LIMIT $hal, $row";
}

// Membaca variabel form
$dataKataKunci  = isset($_POST['txtKataKunci']) ? $_POST['txtKataKunci'] : '';
?>



    <div id="loading">
        <div class="loader loader-light loader-large"></div>
    </div>
    <!-- Calling Top Bar & Side Bar -->
    <?php include "menu.php"; ?>


    <!-- Content -->

<section class="content">
            <header class="main-header">
                <div class="main-header__nav">
                    <h1 class="main-header__title">
                        <i class="pe-7f-users"></i>
                        <span>Jamaah Safwa (Belum ada pembayaran)</span>
                    </h1>
                    <ul class="main-header__breadcrumb">
                        <li><a href="?page=90" onclick="return false;"></a></li>

                    </ul>
                </div>


    <div class="row">

                    <div class="col-md-12">
                        <article class="widget">
                          <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" name="form1" target="_self" id="form1"  class="form-horizontal" role="form">
                                           <select name="txtKataKunci" bgcolor="blue" class="btn blue ">
                                              <option value="">--Pilih Jamaah--</option>
                                             <?php
                  $bacaSql = "SELECT * FROM jamaah WHERE packages_program='Safwa'";
                  $bacaQry = mysql_query($bacaSql, $Link) or die ("Gagal Query".mysql_error());
                  while ($bacaData = mysql_fetch_array($bacaQry)) {
                  if ($bacaData['nomor_id'] == $dataType) {
                    $cek = " selected";
                  } else { $cek=""; }

                  echo "<option value='$bacaData[first_name]' $cek>[ $bacaData[nomor_id] ]  $bacaData[first_name]  $bacaData[last_name]  $bacaData[surname]</option>";
                  }
                  ?>
                                              </select>
                       <button  type="submit" name="btnCari" value="search"  class="btn blue" type="submit">
                                      Pilih
                                    </button>
                          </form>

                        </article><!-- /widget -->
                    </div>

                </div> <!-- /row -->


    <div class="row">

    <div class="col-md-12">
    <article class="widget">

        <table width="100%" height="100%" >

        <tr>
            <th>No</th>
            <th>Title</th>
            <th>Nama Jamaah</th>
            <th>Email</th>
            <th>Paket</th>
             <th>Depart</th>
             <th>Arrival</th>
             <th>Status</th>
             <th>Tool</th>

            </tr>

<?php
  // Query SQL ada di bagian atas, kolom tombol Cari (btnCari)
  $myQry = mysql_query($mySql, $Link)  or die ("Query salah : ".mysql_error());
  $nomor = 0;
  while ($myData = mysql_fetch_array($myQry)) {
    $nomor++;

    $Kode = $myData['nomor_id'];
  ?>


        <tr>
        <td><?php echo $nomor; ?></td>
        <td><?php echo $myData['title']; ?></td>
        <td><?php echo $myData['first_name']; ?>&nbsp;<?php echo $myData['last_name']; ?>&nbsp;<?php echo $myData['surname']; ?></td>
        <td><?php echo $myData['email']; ?></td>
        <td><?php echo $myData['packages_program']; ?></td>
        <td><?php echo IndonesiaTgl($myData['depart']); ?></td>
         <td><?php echo $myData['arrival']; ?></td>
          <td><font style="color:red"><?php echo $myData['metode_status']; ?></font></td>
        <td>
      <a href="90/jamaah_print.php?NomorJamaah=<?php echo $myData['nomor_id']; ?>" target="_self" alt="Detail Data" class='btn btn-xs btn-info  ' title="Detail"> Detail</a>&nbsp;
       <a href="?page=input_jamaah_booking&NomorJamaah=<?php echo $myData['nomor_id']; ?>" target="_self" alt="Edit Data" onclick="return confirm('ARE YOU SURE BOOKING THIS DATA  ... ? Data akan hilang dan masuk ke jamaah register klik Ok untuk melanjutkan ke pembayaran , klik cancel untuk kembali ')" id="kuota"  class='btn btn-xs btn-success '> Register</a>&nbsp;
         <!-- <a href="?page=WaitingDeleteSafwa&Kode=<?php echo $Kode; ?>" target="_self" alt="Delete Data" onclick="return confirm('ARE YOU SURE REMOVING THIS DATA  ... ?')" target="_self" alt="Delete Data" class='btn btn-xs btn-danger ace-icon fa fa-trash-o bigger-120'> Delete</a> -->
     </td>
         </tr>
        <?php } ?>

         </table>

            <ul class="pagination pull-left no-margin">
<li class="" >
<strong style="font-weight: bold;">Total Records :</strong>
                                <?php echo $jml; ?>
</ul>

<?php

        $prev = $hal - $row;
        if ($prev <= -$row) { $prev = 0;}
        $next = $hal + $row;
        $Selisih = $jml - $row;
        if ($Selisih <= 0) {$Selisih = 0;}

        if ($next >= $jml) { $next =  $Selisih;}
?>

        <ul class="pagination pull-right no-margin">
            <li class="prev">
        <?php
        echo "
            <a href='?page=DataWaiting_Safwa&hal=$prev'>
            <i style='font-size:15px;' class='pe-7s-prev'></i>
            </a>";
            ?>
            </li>
        <li class="">
            <?php
            for ($h = 1; $h <= $max; $h++) {
                $list[$h] = $row * $h - $row;
                echo " <a href='?page=DataWaiting_Safwa&hal=$list[$h]'>$h</a> ";
            }
            ?>
        </li>
        <li class="next">
                <?php
        echo "
            <a href='?page=DataWaiting_Safwa&hal=$next'>
            <i style='font-size:15px;' class='pe-7s-next'></i>
            </a>";
            ?>
        </li>
            </ul>

                        </article><!-- /widget -->
                    </div>

                </div> <!-- /row -->


             </header> <!-- /main-header -->
            <footer class="footer-brand">
                    <?php include "footer.php"; ?>
            </footer>

        </section> <!-- /content -->

    <script src="http://d3js.org/d3.v3.min.js" language="JavaScript"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="../js/main.js"></script> <!-- Loading -->


</body>
</html>


<?php
if(isset($_SESSION["role"])) {
  exit;
}
else {
  echo "<meta http-equiv='refresh' content='0; url=../modul/logout.php'>";
}
?>
