<section id="content">


<div class="wrap-content affangrid">

		<div class="row block">

        <div class="col-full">

				<div class="block01">
                <br />
				<br />
				<a href="<? echo site_url('candidate/index');?>" class="normallink">Back to My Page</a>
                <br />
				<br />
                 <div class="block-padding">
                            <h1>Change Your Email:</h1><br />

                       
                        </div>

                    </div>
				</div>

			</div>

            </div>
</div>
<div class="wrap-content affangrid">

		<div class="row block">

        <div class="col-full">

				<div class="block01">


				  <div style="width:300px; float:left;">

                        		
<?
$attributes = array('id' => 'myform');
?>
<?= form_open_multipart('registration/updateaccountEmail',$attributes);?>



                       Old Email: <?=$oldemail?>

                    	<br /><br />

                         <input name="email" type="text" class="input61" id="email" placeholder="New Email" value="<?=set_value('email')?>" />

                       <?=form_error('email');?>

                        <br /><br />
 <input name="email1" type="text" class="input61" id="email1" placeholder="Re Enter New Email" value="" />

                       <?=form_error('email1');?>

                        <br /><br />
                        

                       <a href="#" onclick="document.getElementById('myform').submit();" class="button2">&nbsp;Update&nbsp;</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<? echo site_url('registration/updateaccount');?>" class="button2ba">Cancel</a>

                		<?=form_close()?>

                    </div>

                        <div style="width:100px; float:left;">

                        	&nbsp;<img src="<?=base_url();?>images/midline.jpg">

                        </div>

                        <div style="width:300px; float:left;">
                        <span style="color:#900; font-size:16px;">Email Address...</span><br />
Use the new Email next time you log-in.

                        </div>

					

				</div>

			</div>

            </div>

</div>

</section>