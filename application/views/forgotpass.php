<section id="content">

<!--------------Header--------------->
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


<div class="wrap-content" style="height: 100%;  width: 100%;  padding: 0;  margin: 0;  background: black url(<?=base_url();?>images/LogInPageHeader062914.jpg) center center no-repeat;-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;">

<div class="affangrid">

	<div class="row blocklandingheader1" >
   

        <div class="col-full">

            <div class="blockland0ab">

            	

                <div class="blmargin1"></div>

                <h1><?php /*?><img src="<?=base_url();?>images/ribon.png" width="35" height="44">&nbsp;<?php */?>Password Assistance</h1></div>

		</div>

    </div>

    </div>

</div>

<!--------------Header--------------->
<div class="wrap-content affangrid">
		<div class="row block">
        <div class="col-full">
				<div  style="line-height:28px;">

				
                        <div style="width:850px; float:left;"><br />
							

                        <div class="lndimg"><img src="<?=base_url();?>images/flower.png" width="32" height="27"></div>
                			<div class="reghead">Enter your email</div><br /><br /><span style="font-size:16px;">Enter the e-mail address associated with your Polipad account, then click "Enter". Your password will be e-mailed to you.</span><br /><br />

<?
  if($msg == 1){
  ?>

<font color="#990000">We can't find your e-mail in our record. Please try again. You can also </font><a href="<?=site_url("welcome/index");?>" class="normallink"><u>sign-up.</u></a>

 <?
  }
  ?>
                             <?= form_open('registration/forgot');?>
                            <input name="msg" type="hidden" value="<?=$msg?>" />
                             <input name="email" type="text" class="input61" id="email" placeholder="Email" />
							<?= form_error('email') ?>
                           
                    	 <br /><br />
                      	 <input name="submit" type="submit" class="button3" value="&nbsp;&nbsp;&nbsp;Enter&nbsp;&nbsp;&nbsp;" />
                		<?=form_close()?>
                        
                        
   </div>
					
				</div>
			</div>
            </div>
            </div>
</div><br />
<br />
<!--------------footer--------------->

<div class="wrap-content" style="height: 100%;  width: 100%;  padding: 0;  margin: 0;  background: black url(<?=base_url();?>images/V2Footer061314.jpg) center center no-repeat;-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;" >

<div class="affangrid">

	<div class="row blocklandingfooter" >

        <div class="col-full">

            <div class="blockland03">

                    <a href="<? echo site_url('polipads/index');?>" class="normallinkl">Home</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="<? echo site_url('polipads/microCampaign');?>" class="normallinkl">Micro-Campaign</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="<? echo site_url('polipads/getinvolved');?>" class="normallinkl">Interns needed</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="<? echo site_url('polipads/about');?>" class="normallinkl">About Us</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="<? echo site_url('campaign/main/'.$cid);?>" class="normallinkl">Featured Campaign</a><br />

<br />         

                <span style="font-family: 'Lobster', cursive; color:#31859C;">Campaign by the people, for the people.</span>   <br />

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