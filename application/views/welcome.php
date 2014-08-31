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

                <h1><?php /*?><img src="<?=base_url();?>images/ribon.png" width="35" height="44">&nbsp;<?php */?>Join Polipad</h1></div>

		</div>

    </div>

    </div>

</div>

<!--------------Header--------------->


<div class="wrap-content affangrid">

		<div class="row block">

        <div class="col-full">

				 <div  style="line-height:28px;"><br />



				  <div style="width:300px; float:left;">

                        		<div class="lndimg"><img src="<?=base_url();?>images/signman.png" width="40" height="30"></div>

                			<div class="reghead">Sign up</div> 

                            <br /><br />



					<span style="font-size:14px; line-height:5px; padding-right:20px;">"By joining Polipad, you will be able to interact with a campaign; i.e., support a campaign, participate in developing ideas, and leave feedback."</span><br />

						

                   	<?= form_open_multipart('registration/addmember');?>

                        <input name="name" type="text" class="input61" id="name" placeholder="Name" value="<?=set_value('name')?>" />

                        <?=form_error('name');?>

                    	<br /><br />

                         <input name="email" type="text" class="input61" id="email" placeholder="Email" value="<?=set_value('email')?>" />

                       <?=form_error('email');?>

                        <br /><br />

                         <input name="password1" type="password" class="input61" id="password1" placeholder="Password" />

                       <?= form_error('password1') ?>

                  		<br /><br />

                         <input name="conf_password" type="password" class="input61" id="conf_password" placeholder="Confirm Password" />

                       <?= form_error('conf_password') ?><br /><br />

                       <input name="submit" type="submit" class="button3" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Register&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" />

                		<?=form_close()?>

                    </div>

                        <div style="width:100px; float:left;">

                        	&nbsp;<img src="<?=base_url();?>images/midline.jpg">

                        </div>

                        <div style="width:300px; float:left;"><br /><br /><br />

							



                        <div class="lndimg"><img src="<?=base_url();?>images/flower.png" width="32" height="27"></div>

                			<div class="reghead">Log-in</div><br /><br />

                            <?
								if($msg==1)
								{
									echo '<span class="strong_challenge" style="font-size:14px; color:#ff0000;">E-mail and password do not match</span>';	
								}
							//$attributes = array('class' => 'login-form', 'name' => 'login-form');

							echo form_open('registration/login');

							?>

                            <input name="msg" type="hidden" value="<?=$msg?>" />

                             <input name="username" type="text" class="input61" id="username" placeholder="Email" value="<?=set_value('username')?>" />

							<?=form_error('username');?>

                            <br /><br />

                             <input name="password" type="password" class="input61" id="password" placeholder="Password" />

                           <?=form_error('password');?>

                    	 <br /><br />

                      	 <input name="submit" type="submit" class="button3" value="&nbsp;&nbsp;&nbsp;Login&nbsp;&nbsp;&nbsp;" />

                		<?=form_close()?>

<a href="<? echo site_url("registration/forgot");?>" style="font-size:12px; line-height:35px; color:#488ADC;">Forgot Password?</a>

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