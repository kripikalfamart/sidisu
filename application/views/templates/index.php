<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title><?php $role = $this->session->userdata('level');


    if ($role == "admin") {
        echo $this->session->userdata('username');
    }elseif ($role == "pemilik" ) {
        echo $this->session->userdata('username');
    }
   
    echo $this->session->userdata($role)
    .$title; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <meta name="msapplication-tap-highlight" content="no">
    
<link href="<?php echo base_url('assets/arc/main.css');?>" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?= base_url('assets/datatables/datatables.min.css') ?>">

<script type="text/javascript" src="<?= base_url('assets/js/jquery/jquery-3.6.0.min.js') ?>"></script>
</head>
<body>
     
        <div class="app-main">
              