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
<meta name="description" content="Responsive Themes Designed by  Md. Mahmudul Karim Chowdhury Apu |">
	<meta name="author" content=" Md. Mahmudul Karim Chowdhury Apu">
	
    <!-- Mobile Specific Metas
  ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    
    <!-- CSS
  ================================================== -->
	<link rel="stylesheet" href="<?=base_url();?>css/affangrid.css">
	<link rel="stylesheet" href="<?=base_url();?>css/style.css">
    <link rel="stylesheet" href="<?=base_url();?>css/responsive.css">

	<link rel="stylesheet" href="<?=base_url();?>css/popbox.css" type="text/css" media="screen" charset="utf-8">
   <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
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
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/blitzer/jquery-ui.css" type="text/css" />
<script src="<?=base_url();?>js/jquery.easy-confirm-dialog.js"></script>
  <script type="text/javascript" charset="utf-8" src="<?=base_url();?>js/popbox.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  <link href='http://fonts.googleapis.com/css?family=Roboto+Slab' rel='stylesheet' type='text/css'>

</head>
<body>
<!--------------Header--------------->
<header>
	<div class="wrap-header affangrid">
		<div class="col-1-2">
        	<div class="left">
   				Powered by <?= anchor('polipads', 'Polipad'); ?> <img src="<?=base_url();?>images/red_dot.png" width="10" height="10" title="Polipad" alt="Polipad"> </div>
			</div>
        <div class="col-1-2">
       		<div class="right">
            
             
            
            <?php if($this->session->userdata('user_id') != ''){ ?>
				<?php if($this->session->userdata('cam_id')){ 
					if($this->candidate_model->is_cam_this_can($this->session->userdata('user_id'),$this->session->userdata('cam_id')))
				{
				?>
                <a href="<? echo site_url('candidate/core/'.$this->session->userdata('cam_id'));?>" class="button2">Edit</a>&nbsp;&nbsp;&nbsp;
                <?
					}
				 } ?>
            <?
				$rr = $this->session->userdata('role_id');
				$where = '';
				if($rr == 1)
				{
					$where = 'admin/index';
				}else
				{
					$where = 'candidate/index';
				}
			?>
   				<?php /*?><a href="<? echo site_url($where);?>" style="color:#7AD050;"><img src="<?=base_url();?>images/icon_3.png" /></a>&nbsp;&nbsp;&nbsp;<?php */?>
                 <a href="<? echo site_url($where);?>" style="color:#7AD050; font-size:15px;">My Page (Dashboard)</a>&nbsp;|&nbsp;<a href="<? echo site_url('welcome/logout');?>" style="color:#7AD050; font-size:15px;">Logout</a><? } ?></div>
			</div>
		</div>
	</div>
</header>
<?=$content;?>
</body>

</html>