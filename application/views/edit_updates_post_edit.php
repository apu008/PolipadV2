<script type="text/javascript">
function txtCounters(id,max_length,myelement)
{
counter = document.getElementById(id);
field = document.getElementById(myelement).value;
field_length = field.length;
// if (field_length <= max_length)  {
//Calculate remaining characters
 remaining_characters = /*max_length-*/field_length;
//Update the counter on the page
  counter.innerHTML = '('+remaining_characters+'/60)';  //}
 } 
 


 </script>

<section id="content">
<?= form_open_multipart('campaign_edit/updates_edit');?>
<input name="pid" type="hidden" value="<?=$pid?>" />
       
	<div class="wrap-content affangrid">
		
	
		<div class="row block">
          <div class="col-full">
                  <div class="block001">

						
                         <h1><?=$cam_title?></h1><br />
   
                    </div>
                </div>
			<div class="col-full">
			  <div class="block01">
              <div class="borderdiv">
                 <a href="<? echo site_url('candidate/basics/'.$cam_id);?>"><ol class="mainnevg">Basics</ol></a>
               
                <a href="<? echo site_url('candidate/core/');?>"><ol class="mainnevg">Core Campaign</ol></a>
                <ol class="mainnev">Updates & more</ol>
                <a href="<? echo site_url('campaign_edit/ideas');?>"><ol class="mainnevg">Ideas</ol></a>
                <a href="<? echo site_url('campaign_edit/events');?>"><ol class="mainnevg">Events</ol></a>
               </div>
					
                    
                        <div class="block-padding">
                            <a href="<? echo site_url('campaign_edit/updates');?>" class="mediamlink">Back to "Post an Update"</a><br /><br />
                        </div>
                       <div class="block-margin"> 
                     
                            <span class="normaltitle">Post Title</span> &nbsp;&nbsp;<span id="txtCounter" style="font-size:12px; color:#666666">(0/60)</span>:<?=form_error('post_title');?>
                      <br />

                        <input name="post_title" id="post_title" type="text" class="input1" onkeyup="javascript:txtCounters('txtCounter',60,'post_title')" maxlength="60" value="<?=$post_title?>"  /><br /><br />


                        </div>
                         <div class="block-margin"> 
                     
                            <p><span class="normallink">Change/Add Picture:&nbsp;</span><?=form_hidden('upimage',0)?> <?=form_error('upimage');?><input type="file" name="userfile" id="userfile" /></p>
                        </div>
                        <?
						if($picture !='0'){
						
						?>
                         <div class="block-margin"> 
                     
                            <img src="<?=base_url();?>cam_pics/<?=$picture?>" class="img-stylepm" />
                            <input name="ppic" type="hidden" value="<?=$picture?>" />
                        </div>
						<? } ?>
                        <div class="block-margin"> 
                     	<span class="normaltitle" style="float:left; padding-top:20px;">Caption:&nbsp;<input name="caption" type="text" class="input01" id="caption" value="<?=$caption?>" size="92"  /></span><br />
<br />
<br />

                        </div>
                         <div class="block-margin"> 
                     	<span class="normaltitle">Details:</span> <?=form_error('details');?><br />
<textarea name="details" cols="" rows="8" class="textarea1" id="details"><?=formatHTMLToText($details)?></textarea><?php //echo display_ckeditor($ckeditor); ?>

                        </div>
                        
                         <div class="block-padding">
                            <input name="save" type="submit" value="Edit Post" class="button" />
                          
                           
                     	</div></div><br />
						
                       
                        

			  </div>
			</div>
		</div>
	</div>
   
    
    
    
    
    
    
    
</section>