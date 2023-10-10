<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php
$ci = new CI_Controller();
$ci =& get_instance();
$ci->load->helper('url');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>404 Page Not Found</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<link href='http://fonts.googleapis.com/css?family=Amarante' rel='stylesheet' type='text/css'>
<style type="text/css">
body{
    background:url(<?php echo base_url(); ?>assets/front/images/404.png);
    margin:0;
	background-repeat:no-repeat;
}
</style>
</head>
<body>
	   <div class="container" style="margin-top:100px; margin-left:500px;">
	   		<h1><?php echo $heading; ?></h1>
			<?php echo $message; ?>
		 	<p>
		 		<a class="btn btn-warning" href="<?php echo base_url(); ?>">Go Back to Home</a>
		 	</p>
	   </div>
</body>
</html>