<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html class="no-js">
<head>
  <?php include "includes/meta.php";?>

</head>
<body class="">
  <section id="container">
    <?php $opt="rec_index";?>
    <?php include "includes/nav_bar_header.php";?>
    <?php include "includes/menus/".$user_data['menu']?>

    <!--main content start-->
    <section class="main-content-wrapper">
      <section id="main-content">
        <div class="row">
        </div>
      </section>
    </section>
    <!--main content end-->
  </section>
  <?php include "includes/footer.php"?>

</body>
</html>
