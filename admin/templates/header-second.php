<?php
 
$title = $this->title;
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />	
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<title><?php echo $title ;?></title>
	<?php include 'site-location.php'; ?>
	<link rel="stylesheet" type="text/css" href="<?php echo URL ?>assets/bootstrapv3/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo URL ?>assets/bootstrapv3/css/bootstrap-theme.min.css">
	
	<link rel="stylesheet" type="text/css" href="<?php echo URL ?>assets/css/webarch.css">
	<link rel="stylesheet" type="text/css" href="<?php echo URL ?>assets/css/jquery.scrollbar.css">
	<link rel="stylesheet" type="text/css" href="<?php echo URL ?>assets/css/zebra_pagination.css">
	<style type="text/css">
		body{
		background-color: #fff;
		}
	</style>
</head>

<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="<?php echo $body_class; ?>">