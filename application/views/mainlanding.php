<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>

    <!-- Basic Page Needs
  ================================================== -->
	<meta charset="utf-8">
<title><?=$this->session->userdata('pageTitle');?></title>
<meta name="description" content="Responsive Themes Designed by Md. Mahmudul Karim Chowdhury Apu |">
	<meta name="author" content=" Md. Mahmudul Karim Chowdhury Apu">
	
    <!-- Mobile Specific Metas
  ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    
    <!-- CSS
  ================================================== -->
	<link rel="stylesheet" href="<?=base_url();?>css/affangrid.css">
	<link rel="stylesheet" href="<?=base_url();?>css/style.css">
    <link rel="stylesheet" href="<?=base_url();?>css/responsive.css">
    <link rel="stylesheet" href="<?=base_url();?>css/jquery-te-1.4.0.css">

	<!--[if lt IE 8]>
       <div style=' clear: both; text-align:center; position: relative;'>
         <a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">
           <img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." />
        </a>
      </div>
    <![endif]-->
    <!--[if lt IE 9]>
		<script src="<?=base_url();?>js/html5.js"></script>
		<script src="<?=base_url();?>js/css3-mediaqueries.js"></script>
	<![endif]-->
	<script src="<?=base_url();?>js/jquery-1.9.1.min.js"></script>
	<link href='<?=base_url();?>images/favicon.gif' rel='icon' type='image/x-icon'/>
<script src="<?=base_url();?>js/jquery-te-1.4.0.min.js" charset="utf-8"></script>
<link href='http://fonts.googleapis.com/css?family=Roboto+Slab' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
</head>
<body>


<?=$content;?>
</body>

</html>