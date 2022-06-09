<!DOCTYPE html>
<html lang="<?php echo LNG_CONTENT ?>">

<head>
    <!-- Required meta tags-->
    <meta charset="<?php echo FORMAT_CONTENT ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title Page-->
    <title>Activos - <?php echo $this->Title = $this->Title ?? "Error";?></title>

    <!-- Fontfaces CSS-->
    <link href="<?php echo PUBLIC_HTML ?>css/font-face.css" rel="stylesheet" media="all">
    <link href="<?php echo ASSETS ?>font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="<?php echo ASSETS ?>font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="<?php echo ASSETS ?>mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="<?php echo ASSETS ?>bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="<?php echo ASSETS ?>animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="<?php echo ASSETS ?>bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="<?php echo ASSETS ?>wow/animate.css" rel="stylesheet" media="all">
    <link href="<?php echo ASSETS ?>css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="<?php echo ASSETS ?>slick/slick.css" rel="stylesheet" media="all">
    <link href="<?php echo ASSETS ?>select2/select2.min.css" rel="stylesheet" media="all">
    <link href="<?php echo ASSETS ?>perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="<?php echo PUBLIC_HTML ?>css/theme.css" rel="stylesheet" media="all">

</head>
<body class="animsition">
  <?php echo $this->AddBody = $this->AddBody ?? "";?>

  <!-- Jquery JS-->
  <script src="<?php echo ASSETS ?>jquery-3.2.1.min.js"></script>
  <!-- Bootstrap JS-->
  <script src="<?php echo ASSETS ?>bootstrap-4.1/popper.min.js"></script>
  <script src="<?php echo ASSETS ?>bootstrap-4.1/bootstrap.min.js"></script>
  <!-- Vendor JS       -->
  <script src="<?php echo ASSETS ?>slick/slick.min.js">
  </script>
  <script src="<?php echo ASSETS ?>wow/wow.min.js"></script>
  <script src="<?php echo ASSETS ?>animsition/animsition.min.js"></script>
  <script src="<?php echo ASSETS ?>bootstrap-progressbar/bootstrap-progressbar.min.js">
  </script>
  <script src="<?php echo ASSETS ?>counter-up/jquery.waypoints.min.js"></script>
  <script src="<?php echo ASSETS ?>counter-up/jquery.counterup.min.js">
  </script>
  <script src="<?php echo ASSETS ?>circle-progress/circle-progress.min.js"></script>
  <script src="<?php echo ASSETS ?>perfect-scrollbar/perfect-scrollbar.js"></script>
  <script src="<?php echo ASSETS ?>chartjs/Chart.bundle.min.js"></script>
  <script src="<?php echo ASSETS ?>select2/select2.min.js">
  </script>

  <!-- Main JS-->
  <script src="<?php echo PUBLIC_HTML ?>js/main.js"></script>
  <script src="<?php echo PUBLIC_HTML ?>js/ingreso.js"></script>

</body>
</html>