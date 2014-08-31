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
                            <h1>Change Password:</h1><br />

                       
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
<?= form_open_multipart('registration/updateaccountPassword',$attributes);?>

<input name="old_password" type="hidden" value="<?=$password0?>" />

                        <input name="password0" type="password" class="input61" id="password0" placeholder="Old Password" />

                        <?=form_error('password0');?>

                    	<br /><br />


                         <input name="password1" type="password" class="input61" id="password1" placeholder="New Password" />

                       <?= form_error('password1') ?>

                  		<br /><br />

                         <input name="conf_password" type="password" class="input61" id="conf_password" placeholder="Re-type Password" />

                       <?= form_error('conf_password') ?><br /><br />


                       <a href="#" onclick="document.getElementById('myform').submit();" class="button2">&nbsp;Update&nbsp;</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<? echo site_url('registration/updateaccount');?>" class="button2ba">Cancel</a>

                		<?=form_close()?>

                    </div>

                        <div style="width:100px; float:left;">

                        	&nbsp;<img src="<?=base_url();?>images/midline.jpg">

                        </div>

                        <div style="width:300px; float:left;">
                        <span style="color:#900; font-size:16px;">New Password...</span><br />

 Use the new password next time you log-in.

                        </div>

					

				</div>

			</div>

            </div>

</div>

</section>