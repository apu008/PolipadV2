<script language="javascript" type="text/javascript">
function limitText(limitCount) {
	//alert(pastpresent.value.length);
	
	var ccount =parseInt(pastpresent.value.length, 10)+parseInt(yourvision.value.length, 10)+parseInt(benefits.value.length, 10)+parseInt(future.value.length, 10);

	
	if (ccount > 630) {
		if(pastpresent.value.length > 130){
			pastpresent.value = pastpresent.value.substring(0, 130);
		}
		else if(yourvision.value.length > 250){
			yourvision.value = yourvision.value.substring(0, 250);
		}
		else if(benefits.value.length > 130){
			benefits.value = benefits.value.substring(0, 130);
		}
		else if(future.value.length > 117){
			future.value = future.value.substring(0, 117);
		}
		
		//alert(ccount);
		
	} else {
		limitCount.value = '('+ccount+'/630)';
		//alert(ccount);
	}
}
</script>

<?
$attributes = array('id' => 'myform');

?>
<?= form_open_multipart('candidate/pitchWizard',$attributes);?>
<input name="jid" type="hidden" value="<?=$jid?>" />
<section id="content">


<div class="wrap-content affangrid">

		<div class="row block">

        <div class="col-full">

				<div class="block01">
                <br />
				<br />
				<a href="<? echo site_url('candidate/core/'.$cam_id);?>" class="normallink">Back to Campaign</a>
                <br />
				<br />
                 <div class="block-padding">
                            <h1><img src="<?=base_url();?>images/icons/thup.png" class="img-styleland" />Campaign Pitch Wizard</h1>
 <span style="color:#666666; font-size:16px;">This wizard guides you to develop your pitch for your micro-campaign (i.e., Purpose of this Campaign). You have 630 characters to put this together; so use them wisely&nbsp;<img src="<?=base_url();?>images/icons/mm.png" /></span>


                    </div>
				</div>
                <div class="block01">

				  <div class="block-padding"><br />

                            <h3 style="color:#666666">Total Character Count:&nbsp;&nbsp;&nbsp;<span style="font-size:24px; color:#0070C0"><input readonly type="text" name="pcountdown" size="20" value="(0/630)" style="background:#F2F2F2; width:100px;font-size:24px; color:#0070C0"></span></h3>
                     	</div>
                        
				</div>
                
               

			</div>

            </div>
</div>
<div class="wrap-content affangrid">

		<div class="row block">

        <div class="col-full">

			 <div class="block01">

				 <div class="block-padding">
                            <h4 class="half-round">Past & present: what's wrong?</h4>
                    <?=form_error('pastpresent');?>
                     	</div>
                      
                        <div class="block-margin">
                     	<textarea name="pastpresent" cols="" rows="5" class="textarea1" placeholder="Describe the status quo… the negative that had been happening - this is what you want to change through your campaign. What was not working? Who was causing it? Who suffered? How? Impact of past into present." id="pastpresent" onKeyDown="limitText(this.form.pcountdown);" 
onKeyUp="limitText(this.form.pcountdown);"><?=formatHTMLToText($pastpresent);?></textarea>
                       
                		</div>
                         <div class="block-padding">
                           <h4 class="half-round">Your vision: core message</h4>
                    
                     	</div>
                      
                        <div class="block-margin">
                     	<textarea name="yourvision" cols="" rows="5" class="textarea1" placeholder="Lay out your vision of change here - this is what you are campaigning for." id="yourvision" onKeyDown="limitText(this.form.pcountdown);" 
onKeyUp="limitText(this.form.pcountdown);"><?=formatHTMLToText($yourvision);?></textarea>
                       
                		</div>
                         <div class="block-padding">
                           <h4 class="half-round">Benefits from your campaign</h4>
                    
                     	</div>
                      
                        <div class="block-margin">
                     	<textarea name="benefits" cols="" rows="5" class="textarea1" placeholder="Write 1 or 2 game-changing benefits that will take place if your campaign becomes a reality." id="benefits" onKeyDown="limitText(this.form.pcountdown)" 
onKeyUp="limitText(this.form.pcountdown);"><?=formatHTMLToText($benefits);?></textarea>
                       
                		</div>
                         <div class="block-padding">
                           <h4 class="half-round">Future: impact of your vision</h4>
                    
                     	</div>
                      
                        <div class="block-margin">
                     	<textarea name="future" cols="" rows="5" class="textarea1" placeholder="How is your vision going to change the future? Make it exciting, emotional, compelling, remarkable, profound. This is the culmination of your vision." id="future" onKeyDown="limitText(this.form.pcountdown)" 
onKeyUp="limitText();"><?=formatHTMLToText($future);?></textarea>
                       
                		</div>
                        
                         <div class="block-margin">
                        <div class="block-padding">
                            <input name="save" type="submit" value='&nbsp;&nbsp;Embed in campaign&nbsp;&nbsp;' class="button4" />
                            
                           
                     	</div></div><br />
                        
				</div>	

			</div>

            </div>

</div>

</section>