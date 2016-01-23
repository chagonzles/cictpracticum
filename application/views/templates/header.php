<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en" ng-app="app">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?php echo $title ?></title>

		<!-- Bootstrap CSS -->
		
	<!-- 	<link rel="stylesheet" href="<?= base_url(); ?>assets/css/bootstrap-bpsu.css"> -->
		<link rel="stylesheet" href="<?= base_url(); ?>assets/css/bootstrap.min.css">
		<link href="<?= base_url(); ?>assets/css/font-awesome/font-awesome.min.css" rel="stylesheet">
		<link rel="stylesheet" href="<?= base_url(); ?>assets/css/student/home.css">
		<link rel="stylesheet" href="<?= base_url(); ?>assets/css/student/announcements.css">
		<link rel="stylesheet" href="<?= base_url(); ?>assets/css/student/forms.css">
		<link rel="stylesheet" href="<?= base_url(); ?>assets/css/app.css">
	
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body ng-controller="cictPracticum">
		