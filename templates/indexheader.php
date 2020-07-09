<?php
  session_start();
  if (!isset($_SESSION['username'])) {
    
  } else {
    $customerfile = file_get_contents('./database/customers.json');
    $customers = json_decode($customerfile,true);
    $jumlah['records'] = count($customers["records"]);

    for($i=0; $i < $jumlah['records']; $i++) {
      if($customers['records'][$i]['username'] == $_SESSION['username']) {
        $username = $customers['records'][$i]['username'];
        $email = $customers['records'][$i]['email'];
        $phonenumber = $customers['records'][$i]['phonenumber'];
      }
    }
  }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>IWD Express</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/cover/">

    <!-- Bootstrap core CSS -->
  <link href="./assets/dist/css/bootstrap.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="./css/cover.css" rel="stylesheet">
  </head>
  <body class="text-center">
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
      <header class="masthead mb-auto">
        <div class="inner">
          <h3 class="masthead-brand">IWD Express</h3>
          <nav class="nav nav-masthead justify-content-center">