  <?php
session_start();
$FirstName = $_SESSION['FirstName'];
$role = $_SESSION['role'];
?>
<?php
include '../library/tracking.php';
 ?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<header class="top-bar">
		<ul class="profile">
				<li>
				<div class="main-logo"><img src="../img/arba.png"; height="45px"; style="padding-top:3px ;padding-left:10px";></div>
			</li>
			<li class="mobile-nav">
				<a href="#" onclick="return false;" class="btn-circle btn-sm">
					<i class="pe-7f-menu"></i>
				</a>
			</li>
		</ul>
		<!-- /top-bar Brand and Logoff -->
		<div class="main-brand">
			<div class="main-brand__container">
				<!--<a style = "margin-top:15px;" href="#" class="btn-circle btn-sm"><i class=" pe-7f-bell"></i><span class="badge badge--red">2</span></a>	&nbsp;
				<a style = "margin-top:15px;" href="#" class="btn-circle btn-sm"><i class=" pe-7f-chat"></i><span class="badge badge--blue">8</span></a>	&nbsp;-->
<a style = "margin-top:15px;" href="?page=News_All_Rahmah" class="btn-circle btn-sm"><i class="pe-7s-volume"></i></a>	&nbsp;
				<a style = "margin-top:15px;" href="?page=Halaman-Utama" class="btn-circle btn-sm"><i class=" pe-7f-back"></i></a>	&nbsp;
				<a style = "margin-top:15px;" href="?page=Logout" class="btn-circle btn-sm"><i class=" pe-7f-power"></i></a>
			</div>
		</div>
	</header> <!-- /top-bar -->


	<!-- Side Bar -->
	<div class="wrapper">
		<aside class="sidebar">
			<div class="user-info">
				<figure class="rounded-image profile__img">
					<img class="media-object" src="../img/user4.png" alt="user">
				</figure>
			<h2 class="user-info__name">Hi <?php if ($_SESSION['FirstName'] == 'Sales') {echo 'Business Owner';}
			else echo $_SESSION['FirstName'];?></h2>
				<h3 class="user-info__role">Agent - Umroh Rahmah <?php echo $_SESSION['Travel']; ?></h3>
				<ul class="user-info__numbers">

				</ul>
			</div> <!-- /user-info -->

			<ul class="main-nav">
				<li class="main-nav--active">
					<!-- <a class="main-nav__link" href='?page=Agent' type="submit" name="btnCari" value="search" > -->
					<a class="main-nav__link" href='?page=Rahmah_Agent' >
						<span class="main-nav__icon"><i class="pe-7f-diamond"></i></span>
						Paket
					</a>
				</li>


				<li class="">
					<a class="main-nav__link" href='?page=DataWaiting_rahmah' type="submit" name="btnCari" value="search" >
						<span class="main-nav__icon"><i class="pe-7f-timer"></i></span>
					Daftar Tunggu
					</a>
				</li>


								<li class="">
									<a class="main-nav__link" href='?page=DataJamaahRahmah' type="submit" name="btnCari" value="search" >
										<span class="main-nav__icon"><i class="pe-7f-network"></i></span>
										Data Jamaah
									</a>
								</li>

				<!-- <li class="main-nav--">
				<a class="main-nav__link" href='?page=Document'>
					<span class="main-nav__icon"><i class="pe-7s-cloud-upload"></i></span>
					Document
				</a>
			</li> -->

			<li class="">
				<a class="main-nav__link" href='?page=View_Document_Rahmah' type="submit" name="btnCari" value="search" >
					<span class="main-nav__icon"><i class="pe-7f-cloud-upload"></i></span>
				Dokumen
				</a>
			</li>
			<!-- Website Performance -->
			<!-- <li>
				<a class="main-nav__link" href='?page=DataReport'>
					<span class="main-nav__icon"><i class="pe-7f-graph1"></i></span>
					Data Manifest
				</a>
			</li> -->


			<li class="">
				<a class="main-nav__link" href='?page=Invoice_Rahmah' type="submit" name="btnCari" value="search" >
					<span class="main-nav__icon"><i class="pe-7f-wallet"></i></span>
				Invoice
				</a>
			</li>

      <!-- <li class="">
				<a class="main-nav__link" href='?page=DataManifest_Super' type="submit" name="btnCari" value="search" >
						<span class="main-nav__icon"><i class="pe-7f-graph1"></i></span>
				Manifest
				</a>
			</li> -->

			</ul> <!-- /main-nav -->
		</aside> <!-- /sidebar -->

</body>
</html>
