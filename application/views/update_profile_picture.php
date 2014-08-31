<section id="content">

<?= form_open_multipart('registration/updatepicture');?>
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
                            <h1>Profile Picture:</h1><br />

                            
                             <?
					   	if($ppic !=''){
					   ?>
                      <input name="ppic" type="hidden" value="<?=$ppic?>" />
                            <img src="<?=base_url();?>user_pic/<?=$ppic?>" class="img-stylepm" />
                     	
                        <? } ?>
                        
                             <span class="right-stylep">
							 <?
					   	if($ppic !=''){
					   ?>Change<? }else{ ?>Add<? } ?> picture.
                             <input type="file" name="userfile" id="userfile" />
                             </span><br /><br />

                		<span style="color:#666666;">(This picture should represent your campaign. PNG, JPEG, GIF or BMP. Size limit: 3 Mega Byte. At least 200X200 pixels. 4:4 aspect ratio)</span><br /><?=form_hidden('upimage',0)?> <?=form_error('upimage');?>
<br />
<input name="save" type="submit" value='&nbsp;&nbsp;Save&nbsp;&nbsp;' class="button" />
                        </div>

                    </div>
				</div>

			</div>

            </div>

</div>

</section>