<?php
require('../config/wiwe360-config.php');


# Tombol Simpan diklik
if(isset($_POST['btnSimpan'])){
  # VALIDASI FORM, jika ada kotak yang kosong, buat pesan error ke dalam kotak $pesanError
  $pesanError = array();
  if (trim($_POST['Time'])=="") {
    $pesanError[] = "Data <b>Time</b> tidak boleh kosong !";    
  }

  # BACA DATA DALAM FORM, masukkan datake variabel
  $Time=$_POST['Time'];
  $Event=$_POST['Event'];
  $cmbDay = $_POST['Day'];
  $Title= $_POST['Title'];
  $Description = $_POST['Description'];
  $URL = $_POST['URL'];


  # JIKA ADA PESAN ERROR DARI VALIDASI
  if (count($pesanError)>=1 ){
    echo "<div class='mssgBox'>";
    echo "<img src='images/attention.png'> <br><hr>";
      $noPesan=0;
      foreach ($pesanError as $indeks=>$pesan_tampil) { 
      $noPesan++;
        echo "&nbsp;&nbsp; $noPesan. $pesan_tampil<br>";  
      } 
    echo "</div> <br>"; 
  }
  else {
    # SIMPAN DATA KE DATABASE. 
    // Jika tidak menemukan error, simpan data ke database
    $mySql    = "INSERT INTO `los3n` (`time`, `day`, `event`, 
                     `title`, `description`, `URL`)
            VALUES ('$Time',
                '$cmbDay', 
                '$Event', 
                '$Title', 
                '$Description', 
                '$URL')";

    $myQry=mysql_query($mySql, $Link) or die ("Gagal query".mysql_error());
    if($myQry){
      echo "<meta http-equiv='refresh' content='0; url=?page=SalesLOS3N'>";
    }
    exit;
  } 
} // Penutup Tombol Simpan

# VARIABEL DATA UNTUK DIBACA FORM
// Supaya saat ada pesan error, data di dalam form tidak hilang. Jadi, tinggal meneruskan/memperbaiki yg salah

$dataTime   = isset($_POST['Time']) ? $_POST['Time'] : '';
$dataDay   = isset($_POST['Day']) ? $_POST['Day'] : '';
$dataEvent = isset($_POST['Event']) ? $_POST['Event'] : '';
$dataTitle    = isset($_POST['Title']) ? $_POST['Title'] : '';
$dataDescription    = isset($_POST['Description']) ? $_POST['Description'] : '';
$dataURL    = isset($_POST['URL']) ? $_POST['URL'] : '';
?>

<!DOCTYPE html>
<html>
<head>
  <title>WiWE 270- Generate</title>
    <link rel="icon" sizes="192x192" href="../img/Icon.png"/>
    <!-- Glazzed & Bootstrap -->  
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../css/main.min.css">
  <!-- Pixeden Icon Fonts -->
  <link rel="stylesheet" type="text/css" href="../css/pe-icon-7-filled.css">
  <link rel="stylesheet" type="text/css" href="../css/pe-icon-7-stroke.css">
  <!-- Tracker Bar Progess --> 
  <link rel="stylesheet" href="../css/progresstraccerstyle.css">




  <style>
   .push-to-bottom {
        position: absolute;
        bottom: 30px;
        width: 100%;
      }

      </style>

</head>
<body>
<div id="loading">
    <div class="loader loader-light loader-large"></div>
  </div>
  <!-- Calling Top Bar & Side Bar --> 
  <?php include "menu.php"; ?>

  <!-- Content --> 
<section class="content">
      <header class = "main-header">
        <div class="main-header__nav">
              <h1 class="main-header__title">
                <i class="pe-7s-cloud"></i>
              <span>Length of Stay Campaign</span>
              </h1>
             <ul class="main-header__breadcrumb">
            <li><a href="?page=SalesMarketingCampaign" onclick="">Marketing Campaign </a></li>
           
          </ul>
        </div>
               <div class ="main-header__date">
                <button onclick="window.location='?page=SalesLOS';">Discard</button>
                <input hidden>
                </div>
  </header>

<article class="widget widget__form">             
  <div class="widget__content">
  <div class="main-container ace-save-state" id="main-container">
      <script type="text/javascript">
        try{ace.settings.loadState('main-container')}catch(e){}
      </script>
  <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" name="form1" target="_self" class="form-horizontal" role="form">
  <div class = "row">
  <div class = "col-md-4"><div>
  <input type="time" name="Time" value="<?php echo "$dataTime";?>"  class="stacked-input" id="input-1" required>
  </div>
  </div>

  <div class = "col-md-4 ">
  <div> 
   <select name="Day" required class="form-control" style=" height: 64px;" >
              <option value="<?php echo "$dataDay";?>"> Select Day</option>
               <option value="1">1 Day</option>
               <option value="2">2 Days</option>
               <option value="3">3 Days</option>
        </select></div></div>

   <div class = "col-md-4 ">
  <div> 
  <input type="text" name="Event" class="stacked-input" value="<?php echo "$dataEvent";?>"  id="input-1" placeholder="Event" required></div></div>
  </div>
  <br>


  <input type="text" name="Title" class="stacked-input" value="<?php echo "$dataTitle";?>"  id="input-1" placeholder="Title" required>

  <input type="text" name="Description" class="stacked-input" value="<?php echo "$dataDescription";?>"  id="input-1" placeholder="Description" required>

  <input type="text" name="URL" class="stacked-input" value="<?php echo "$dataURL";?>"  id="input-1" placeholder="Attach your link to your content here " required>
  
  <button  type="submit" name="btnSimpan" value=" Submit " class="btn btn-info" type="button">Save</button>
  </div>
  </form>
  </article>
  
<script src="../js/bootstrap-timepicker.min.js"></script>
  <script type="text/javascript" src="../js/main.js"></script> <!-- Loading -->
 
  <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>

<!-- script time --> 
      


<!-- end tjme-- >




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

