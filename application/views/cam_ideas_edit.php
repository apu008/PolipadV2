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
  counter.innerHTML = '('+remaining_characters+'/'+max_length+')';  //}
 } 
 


 </script>
<?
$cbrow = $cb->row_array();
?>
<section id="content">
<?= form_open_multipart('campaign/idea_edit');?>
<input name="pid" type="hidden" value="<?=$pid?>" />
       
	<div class="wrap-content affangrid">
		
	
		<div class="row block">
	         <div class="col-full">
                  <div class="block001">
                       <?
					if($cb->num_rows() > 0)
					{
						
						?>
						
                         <h1><?=$cbrow['cam_title']?></h1><br />


						
						<?
						
					}
					?>    
                    </div>
                </div>
			<div class="col-full">
			  <div class="block001">
              <div class="borderdiv">
                 <a href="<? echo site_url('campaign/main/'.$cam_id);?>"><ol class="mainnevgp">Main</ol></a>
                        
                        <a href="<? echo site_url('campaign/updates');?>"><ol class="mainnevgp">Updates</ol></a>
                        <ol class="mainnevp">Ideas</ol>
                        <a href="<? echo site_url('campaign/supporters');?>"><ol class="mainnevgp">Supporters</ol></a>
                        <a href="<? echo site_url('campaign/feedback');?>"><ol class="mainnevgp">Feedback</ol></a>
               </div>
					
                    
                        <div class="block-padding">
                            <a href="<? echo site_url('campaign/ideas');?>" class="mediamlink">Back to "List of Current Ideas"</a><br />
<br />

                        </div>
                        
                      <div class="block-margin">
                      <span class="normaltitle">Idea Title</span> &nbsp;&nbsp;<span id="txtCounter" style="font-size:12px; color:#666666">(0/60)</span>:<?=form_error('idea_title');?>
                      <br />

                        <input name="idea_title" id="idea_title" type="text" class="input1" onkeyup="javascript:txtCounters('txtCounter',60,'idea_title')" maxlength="60" value="<?=$idea_title?>"  /><br />
<br />
<span class="normaltitle">Details:</span> <?=form_error('details');?><br />
<textarea name="details" cols="" rows="8" class="textarea1" id="details"><?=formatHTMLToText($details)?></textarea>

                </div>
                 <div class="block-margin"></div>
                  <div class="block-margin"> 
                     
                            <p><span class="normallink">Change/Add Picture:&nbsp;</span><?=form_hidden('upimage',0)?> <?=form_error('upimage');?><input type="file" name="userfile" id="userfile" /></p>
                             <?
						if($idea_pic !='0'){
						
						?>
                         <div class="block-margin"> 
                     
                            <img src="<?=base_url();?>cam_pics/<?=$idea_pic?>" class="img-stylepm" />
                            <input name="ppic" type="hidden" value="<?=$idea_pic?>" />
                        </div>
						<? } ?>
<br />
</div>
<div class="block-margin">

                     	<span class="normaltitle">Caption</span>&nbsp;&nbsp;<span id="txtCounter1" style="font-size:12px; color:#666666">(0/70)</span>
                        </div>
                        <div class="block-margin">
                        
                        <input name="caption" type="text" class="input1" onkeyup="javascript:txtCounters('txtCounter1',70,'caption')" maxlength="70" id="caption" style="float:left;" value="<?=$caption?>" size="92"  /><br />


                        </div>       
              
                        


                        <div class="block-margin">
                        <div class="block-padding">
                            <input name="save" type="submit" value="Edit Post" class="button" />
                          
                           
                     	</div></div><br />
						
                       
                        

			  </div>
			</div>
		</div>
	</div>
   
    
    
    
    
    
    
    
</section>