<section id="content">



<!--------------Header--------------->



<div class="wrap-content" style="height: 100%;  width: 100%;  padding: 0;  margin: 0;  background: black url(<?=base_url();?>images/V2LPHeader061314.jpg) center center no-repeat;-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;">

<div class="affangrid">

	<div class="row blocklandingheader">

     <div class="col-full">

            <div style="font-size:16px; float:right; padding-top:20px; padding-right:10px;"><a href="<? echo site_url('polipads/microCampaign');?>" style="color:#FFF; text-decoration:none;">Micro-Campaign</a><span style="color:#FFF;">&nbsp;&nbsp;|&nbsp;&nbsp;</span><a href="<? echo site_url('polipads/getinvolved');?>" style="color:#FFF; text-decoration:none;">Interns needed</a><span style="color:#FFF;">&nbsp;&nbsp;|&nbsp;&nbsp;</span><a href="<? echo site_url('polipads/about');?>" style="color:#FFF; text-decoration:none;">About us</a><span style="color:#FFF;">&nbsp;&nbsp;|&nbsp;&nbsp;</span> 
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
			?>
<a href="<? echo site_url($where);?>" style="color:#FFF;text-decoration:none;">My Page (Dashboard)</a><span style="color:#FFF;">&nbsp;&nbsp;|&nbsp;&nbsp;</span><a href="<? echo site_url('welcome/logout');?>" style="color:#FFF;text-decoration:none;">Logout</a><? }else{ ?><a href="<? echo site_url('welcome');?>" style="color:#FFF; text-decoration:none;">Sign-up or Log-in</a>
            <? } ?>
            
            </div>

           	</div>

        <div class="col-full">

            <div class="blockland00">

          

            	<h1>Polipad<span style="color:#FFF; font-size:14px; line-height:0px;">beta</span></h1>

                

                <div class="blmargin"></div>

                <h2 style="font-size:30px;color:#FFF;">Campaign tools for the fiercely independents</h2>

                <h3 style="color:#FFF;">Based on Micro-Campaign Platform</h3>
               <a href="<? echo site_url('candidate/basics');?>" class="button2a">Start a Campaign</a>

           	</div>

		</div>

    </div>

    </div>

</div>

<!--------------Header--------------->

<div class="wrap-content affangrid">



	<div class="row">

        <div class="col-full">

            <div class="blockland01" style="line-height:28px;">
              Traditionally, it had been difficult  for the regular people to run an effective campaign without the support of big parties, or giant financial  machines.  Polipad wants to change that  by building a set of simple, but effective campaign tools based on the micro-campaign platform.<br />

<a href="<? echo site_url('polipads/microCampaign');?>" class="normallinkl" style="color:#06C;">Learn more about Micro-Campaign Platform.</a>
              
            </div>
            

             <div class="clear"></div>


             <div class="blockland01" style="line-height:28px;">

          <img src="<?=base_url();?>images/icons/slide0001_image006.png" width="40" height="40" style="padding-bottom:15px;">

           	<h2 style="padding-bottom:15px;font-family: 'Lobster', cursive; color:#06C;">What's in Beta Site?</h2>
           
 <div style="width:45%; float:left; text-align:left; padding-right:25px;">
 <span style="color:#F6462E;">Micro-campaign page</span> to set up your campaign in a way so that visitors can learn about the campaign in less than a minute.<br />
 <span style="color:#F6462E;">Updates & more page</span> for additional campaign updates and news.<br />

 <span style="color:#F6462E;">Idea development modules</span> to crowd-source ideas for your campaign. Users can contribute ideas, leave comments on other ideas, or let you know if it's practical or not.

 
 </div>
  <div style="width:1%; float:left; padding-top:10px; padding-left:15px;">

                        	&nbsp;<img src="<?=base_url();?>images/ml.png">

                        </div>
  <div style="width:45%; float:left; text-align:left; padding-left:35px;">
  <span style="color:#F6462E;">Calendar modules</span> to let people know of upcoming events.<br />

<span style="color:#F6462E;">Support modules</span> to find out the level of supports and hear from potential converts.<br />

<span style="color:#F6462E;">Feedback modules</span> where visitors post their feedback on your campaign.
  
  
  </div>


            </div>
 <div class="clear"></div>

          
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

			?>

            

            

          <div class="blockland01">

          <img src="<?=base_url();?>images/icons/slide0001_image008.png" width="40" height="40" style="padding-bottom:15px;">

           	<h2 style="padding-bottom:15px;font-family: 'Lobster', cursive; color:#06C;">Featured Campaign</h2>

           	We used the tools to launch Polipad as our first campaign.

            <br /><br />



              <a href="<? echo site_url('campaign/main/'.$cid);?>"><img src="<?=base_url();?>images/poliland.png" alt="Polipad" title="Polipad"></a>

            </div>

            

            

            <div class="clear"></div>



             <? } ?>

          <div class="blockland01" style="line-height:28px;">

           <img src="<?=base_url();?>images/icons/slide0001_image010.png" width="40" height="40" style="padding-bottom:15px;">

           		<h2 style="padding-bottom:15px;font-family: 'Lobster', cursive; color:#06C;">Seeking Bold Interns</h2>
At Polipad, we are working on a new way to democratize democracy. If you are a student and interested in playing a role in changing the way we campaign, then we invite you to join our team as an intern.

<br />

<a href="<? echo site_url('polipads/getinvolved');?>" class="normallinkl" style="color:#06C;">Learn more about Interns Program.</a>

            </div>

          <br />

<br />



		</div>

    </div>

</div>

<!--------------footer--------------->



<div class="wrap-content" style="height: 100%;  width: 100%;  padding: 0;  margin: 0;  background: black url(<?=base_url();?>images/V2Footer061314.jpg) center center no-repeat;-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;">

<div class="affangrid">

	<div class="row blocklandingfooter">

        <div class="col-full">

            <div class="blockland03">

           <a href="<? echo site_url('polipads/microCampaign');?>" class="normallinkl">Micro-Campaign</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="<? echo site_url('polipads/getinvolved');?>" class="normallinkl">Interns needed</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="<? echo site_url('polipads/about');?>" class="normallinkl">About Us</a> <br />

<br />         

                <span style="font-family: 'Lobster', cursive; color:#933;">Thank you for checking us out.</span>   <br />

<br />

campaign@polipad.net<br />

<br />

<img src="<?=base_url();?>images/tub.png" width="34" height="34">

           	</div> 

		</div>

    </div>

    </div>

</div>

<!--------------footer--------------->

</section>