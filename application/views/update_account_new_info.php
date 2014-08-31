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
                            <h1>Change Account Information:</h1>
                       
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

                        		


						Name: <?=$name?>
                        <br /><br />
                        Password: <? if($ps !=''){ echo $ps; } else { echo '( Password not changed )';}?>

                       <br /><br />

<a href="<? echo site_url('candidate/index');?>" class="button2">Back to My Page</a>

                		<?=form_close()?>

                    </div>

                        <div style="width:100px; float:left;">

                        	<?php /*?>&nbsp;<img src="<?=base_url();?>images/midline.jpg"><?php */?>

                        </div>

                        <div style="width:300px; float:left;">
                       <?php /*?> <span style="color:#900; font-size:16px;">What's in a name...</span><br />

We strongly encourage you to use your or your organization’s real name. Made-up name may destroy the most basic credibility of a campaign.<?php */?>

                        </div>

					

				</div>

			</div>

            </div>

</div>

</section>