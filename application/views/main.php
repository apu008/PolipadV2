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

  <script type="text/javascript" charset="utf-8" src="<?=base_url();?>js/popbox.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/blitzer/jquery-ui.css" type="text/css" />
<script src="<?=base_url();?>js/jquery.easy-confirm-dialog.js"></script>

<link href='http://fonts.googleapis.com/css?family=Roboto+Slab' rel='stylesheet' type='text/css'>

</head>
<body>
<?

				$fe = $this->db->query('select * from campaign where featured=1');

				if($fe->num_rows() > 0)

					{

						$ferow = $fe->row_array();

						$cid = $ferow['id'];

						$cb = $this->db->query('select * from cam_basic where cam_id='.$cid);

						if($cb->num_rows() > 0)

						{

							$cbrow = $cb->row_array();

						}

					}

			?>
<!--------------Header--------------->
<header>
	<div class="wrap-header affangrid">
		<div class="col-1-6">
        	<div class="left">
   				Powered by <?= anchor('polipads', 'Polipad'); ?> <img src="<?=base_url();?>images/red_dot.png" width="10" height="10" title="Polipad" alt="Polipad"> </div>
			</div>
        <div class="col-5-6">
       		<div style=" font-size:14px; text-align:right;">
            
            
            <?php if($this->session->userdata('user_id') != ''){ ?>
            
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
			}
			?>
   				<a href="<? echo site_url('polipads/index');?>" style="color:#FFF; text-decoration:none;">Home</a><span style="color:#FFF;">&nbsp;&nbsp;|&nbsp;&nbsp;</span><a href="<? echo site_url('polipads/microCampaign');?>" style="color:#FFF; text-decoration:none;">Micro-Campaign</a><span style="color:#FFF;">&nbsp;&nbsp;|&nbsp;&nbsp;</span><a href="<? echo site_url('polipads/getinvolved');?>" style="color:#FFF; text-decoration:none;">Interns needed</a><span style="color:#FFF;">&nbsp;&nbsp;|&nbsp;&nbsp;</span><a href="<? echo site_url('polipads/about');?>" style="color:#FFF; text-decoration:none;">About us</a><span style="color:#FFF;">&nbsp;&nbsp;|&nbsp;&nbsp;</span><a href="<? echo site_url('campaign/main/'.$cid);?>" style="color:#FFF; text-decoration:none;">Featured Campaign</a><span style="color:#FFF;">&nbsp;&nbsp;|&nbsp;&nbsp;</span><?php if($this->session->userdata('user_id') != ''){ ?>
                <a href="<? echo site_url($where);?>" style="color:#FFF; text-decoration:none;">My Page</a><span style="color:#FFF;">&nbsp;&nbsp;|&nbsp;&nbsp;</span><a href="<? echo site_url('welcome/logout');?>" style="color:#FFF; text-decoration:none;">Logout</a><? }else{ ?> <a href="<? echo site_url('welcome');?>" style="color:#FFF; text-decoration:none;">Sign-up or Log-in</a><? } ?></div>
			</div>
		</div>
	</div>
</header>
<?=$content;?>
</body>

</html>