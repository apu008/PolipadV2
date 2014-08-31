
<script language="javascript" type="text/javascript">
function limitText(limitField, limitCount, limitNum) {
	if (limitField.value.length > limitNum) {
		limitField.value = limitField.value.substring(0, limitNum);
	} else {
		limitCount.value = limitField.value.length+'/'+limitNum;
	}
}
</script>
<section id="content">
<?
$attributes = array('id' => 'myform');
 $cams = $this->candidate_model->get_cam('campaign',$cam_id);
								$rows = $cams->row_array();	
?>
<?= form_open_multipart('candidate/core',$attributes);?>
<input name="camid" type="hidden" value="<?=$cam_id?>" />
<input name="cgid" type="hidden" value="<?=$cgid?>" />
<input name="jid" type="hidden" value="<?=$jid?>" />
<input name="wid" type="hidden" value="<?=$wid?>" />
<input name="aid" type="hidden" value="<?=$aid?>" />

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
                <a href="<? echo site_url('candidate/basics/'.$cam_id);?>" class="yesno"><ol class="mainnevg">Basics</ol></a>
                <ol class="mainnev">Core Campaign</ol>
             	 <?
             	   if($camefrom != '1'){
				?>
                <a href="<? echo site_url('campaign_edit/updates/');?>"><ol class="mainnevg">Updates & more</ol></a>
<a href="<? echo site_url('campaign_edit/ideas/');?>"><ol class="mainnevg">Ideas</ol></a>
<a href="<? echo site_url('campaign_edit/events/');?>"><ol class="mainnevg">Events</ol></a>
                <?
				}
				?> 
              
               </div>
					
                    
                      

                        <div class="block-padding">
                            <h2>Campaign Summary:&nbsp;&nbsp;&nbsp;<span style="font-size:12px; color:#666666"><input readonly type="text" name="cam_goalcountdown" size="20" value="0/140" style="background:#F2F2F2; width:50px;font-size:12px; color:#666666">
                            </span></h2>
                           <span class="smalllink-gray1">This is a compelling and interesting summary, that will make the visitors want to know more about the campaign. It's also limited to 140 characters so that this can be twitted later to your followers.</span>
                     	</div>
                      
                        <div class="block-margin">
                     	<textarea name="cam_goal" cols="" rows="5" class="textarea1" id="cam_goal" onKeyDown="limitText(this.form.cam_goal,this.form.cam_goalcountdown,140);" 
onKeyUp="limitText(this.form.cam_goal,this.form.cam_goalcountdown,140);"><?=formatHTMLToText($cam_goal);?></textarea>
                       
                		</div>
                         <div class="block-padding">
                            <div style="width:485px; float:left;">
                            <h2>Purpose of this Campaign:&nbsp;&nbsp;&nbsp;<span style="font-size:12px; color:#666666"><input readonly type="text" name="justifycountdown" size="20" value="0/630" style="background:#F2F2F2; width:50px;font-size:12px; color:#666666"></span></h2>
                            </div>
                            <div style="width:200px; float:left;padding-top:10px;">
                            <a href="<? echo site_url('candidate/pitchWizard');?>" class="normallink" style="">Campaign Pitch Wizard</a>
                            </div>
                     	</div>
                      
                        <div class="block-margin">
                     	<textarea name="justify" cols="" rows="8" class="textarea1" id="justify" onKeyDown="limitText(this.form.justify,this.form.justifycountdown,630);" 
onKeyUp="limitText(this.form.justify,this.form.justifycountdown,630);"><?=formatHTMLToText($justify);?></textarea>
                        
                		</div>
                         <div class="block-padding">
                            <h2>Why You?&nbsp;&nbsp;&nbsp;<span style="font-size:12px; color:#666666"><input readonly type="text" name="why_youcountdown" size="20" value="0/280" style="background:#F2F2F2; width:50px;font-size:12px; color:#666666"></span></h2>
                     	</div>
                      
                        <div class="block-margin">
                     	<textarea name="why_you" cols="" rows="6" class="textarea1" id="why_you" onKeyDown="limitText(this.form.why_you,this.form.why_youcountdown,280);" 
onKeyUp="limitText(this.form.why_you,this.form.why_youcountdown,280);"><?=formatHTMLToText($why_you);?></textarea>
                        
                		</div>
                         <div class="block-padding">
                            <h2>Call to Action:&nbsp;&nbsp;&nbsp;<span style="font-size:12px; color:#666666"><input readonly type="text" name="call_to_actioncountdown" size="20" value="0/140" style="background:#F2F2F2; width:50px;font-size:12px; color:#666666"></span></h2>
                     	</div>
                      
                        <div class="block-margin">
                     	<textarea name="call_to_action" cols="" rows="6" class="textarea1" id="call_to_action" onKeyDown="limitText(this.form.call_to_action,this.form.call_to_actioncountdown,140);" 
onKeyUp="limitText(this.form.call_to_action,this.form.call_to_actioncountdown,140);"><?=formatHTMLToText($call_to_action);?></textarea>
                        
                		</div>
                       

                        <div class="block-margin">
                        <div class="block-padding">
                            <input name="save" type="submit" value='&nbsp;&nbsp;Save&nbsp;&nbsp;' class="button" />
                             <?
                				if($rows['status'] == '0'){
							?>
                            &nbsp;&nbsp;&nbsp;<?php /*?><a href="<? echo site_url('campaign_edit/updates/');?>" class="button2">&nbsp;Add More&nbsp;</a><?php */?>
                            <input name="save2" type="submit" value='&nbsp;&nbsp;Add More&nbsp;&nbsp;' class="button03" />
                          <? }elseif($rows['status'] == '2'){
						   ?>
                          
                          	&nbsp;&nbsp;&nbsp;<a href="<? echo site_url('campaign/main/'.$cam_id);?>" class="button2">Back to Campaign</a>
                          <? } ?>
                           
                     	</div></div><br />


			  </div>
			</div>
		</div>
	</div>
   

    
</section>