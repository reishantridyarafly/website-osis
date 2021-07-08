<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="utf-8">
     <meta content="width=device-width, initial-scale=1.0" name="viewport">

     <title><?= $pengaturan->nama ?></title>
     <meta content="" name="description">
     <meta content="" name="keywords">

     <!-- Favicons -->
     <link href="<?= base_url() . 'gambar/website/' . $pengaturan->logo ?>" rel="icon">
     <link href="<?= base_url() ?>assets_frontend/img/apple-touch-icon.png" rel="apple-touch-icon">

     <!-- Google Fonts -->
     <link href="https://fonts.googleapis.com/css?family=Rubik:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

     <!-- Vendor CSS Files -->
     <link href="<?= base_url() ?>assets_frontend/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
     <link href="<?= base_url() ?>assets_frontend/vendor/icofont/icofont.min.css" rel="stylesheet">
     <link href="<?= base_url() ?>assets_frontend/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
     <link href="<?= base_url() ?>assets_frontend/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
     <link href="<?= base_url() ?>assets_frontend/vendor/remixicon/remixicon.css" rel="stylesheet">
     <link href="<?= base_url() ?>assets_frontend/vendor/venobox/venobox.css" rel="stylesheet">
     <link href="<?= base_url() ?>assets_frontend/vendor/aos/aos.css" rel="stylesheet">

     <!-- Template Main CSS File -->
     <link href="<?= base_url() ?>assets_frontend/css/style.css" rel="stylesheet">
     <?php
     function limit_words($string, $word_limit)
     {
          $words = explode(" ", $string);
          return implode(" ", array_splice($words, 0, $word_limit));
     }
     ?>

     <!-- =======================================================
  * Template Name: Presento - v1.1.1
  * Template URL: https://bootstrapmade.com/presento-bootstrap-corporate-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
     ======================================================== -->
</head>

<body>