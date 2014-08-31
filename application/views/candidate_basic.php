<?
$regdata = $reg->row_array();

?>
<?
$attributes = array('id' => 'myform');
?>
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
  counter.innerHTML = '('+remaining_characters+'/70)';  //}
 } 


 </script>

<section id="content">

<?= form_open_multipart('candidate/basics/'.$cid,$attributes);?>
	<div class="wrap-content affangrid">
    
		
		<div class="row block">
        <?
		
		if($cid >0)
				{
					
					?>
	         <div class="col-full">
                  <div class="block001">
                  
						
                         <h1><?=$cam_title?></h1><br />


				 
                    </div>
                </div>
                <? } ?>
			<div class="col-full">
			  <div class="block01">
              <div class="borderdiv">
                <ol class="mainnev">Basics</ol>
                <?
                if($cid != 0){
				?>
                <input name="iid" type="hidden" value="<?=$iid?>" />
                <a href="#<? //echo site_url('candidate/basics');?>" onclick="document.getElementById('myform').submit();"><ol class="mainnevg">Core Campaign</ol></a>
              
               
                <?
				}else{
				?>
                <ol class="mainnevg">Core Campaign</ol>
               
               
                <?
				}
				?>
                 <?
				 if($cid >0)
				{
					  $cams = $this->candidate_model->get_cam('campaign',$cid);
								$rows = $cams->row_array();	
               
				?>
                <a href="<? echo site_url('campaign_edit/updates/');?>"><ol class="mainnevg">Updates & more</ol></a>
<a href="<? echo site_url('campaign_edit/ideas/');?>"><ol class="mainnevg">Ideas</ol></a>
<a href="<? echo site_url('campaign_edit/events/');?>"><ol class="mainnevg">Events</ol></a>
                <?
			
				}
				?> 
               </div>
               </div>
               </div>
               </div>
            
               
					<div class="row blockc">
                    <div class="col-full">
                      <div class="block01">
                      <div class="block-padding">
                            <h2>URL for the campaign:</h2>
                            <span style="color:#666666;">(URL must be without space.)</span>
                     	</div>
                     	<div class="block-margin">
                        <input readonly type="text" name="cam_goalcountdown" size="20" value=" polipad.net/" style="background:#F2F2F2; width:90px;font-size:15px; color:#666666; font-family: 'Roboto Slab', serif;">
                       <input name="cam_url" type="text" class="input61" value="<?=$cam_url?>" placeholder="Name"  />&nbsp;<?=form_error('cam_url');?>
                       </div><br />
                     
                       <div class="block-padding">
                            <h2>Profile picture for the campaign:</h2>
                            
                             <?
					   	if($ppic !=''){
					   ?>
                      <input name="ppic" type="hidden" value="<?=$ppic?>" />
                            <img src="<?=base_url();?>cam_pics/<?=$ppic?>" class="img-stylepm" />
                     	
                        <? } ?>
                        
                             <span class="right-stylep">
							 <?
					   	if($ppic !=''){
					   ?>Change<? }else{ ?>Add<? } ?> picture.
                             <?=form_hidden('upimage',0)?> <?=form_error('upimage');?><input type="file" name="userfile" id="userfile" />
                             </span><br /><br />

                		<span style="color:#666666;">(This picture should represent your campaign. PNG, JPEG, GIF or BMP. Size limit: 3 Mega Byte. At least 640X480 pixels. 4:3 aspect ratio)</span>
                        </div>
                      
                      
                		<div class="block-padding">
                            <h2>Where are you campaigning from?</h2><?=form_error('cam_from');?>
                     	</div>
                     	<div class="block-margin">
                        <input name="cam_from" type="text" class="input1" value="<?=$cam_from?>"  />
                       </div><br />


                      <div class="block-padding">
                            <h2>Campaign Title:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id="txtCounter" style="font-size:12px; color:#666666">(0/70)</span></h2> <?=form_error('cam_title');?>
                        </div>
                      <div class="block-margin">
                        <input name="cam_title" id="cam_title" type="text" class="input1" onkeyup="javascript:txtCounters('txtCounter',70,'cam_title')" maxlength="70" value='<?=$cam_title?>'  />
                </div><br />
                	<div class="block-padding">
                            <h2>Type of Campaign:</h2><?=form_error('type_of_cam');?>
               		</div>
                      
                <div class="block-margin">
                <?
					$options = array(
                  'Political'  => 'Political',
                  'Non-Political'    => 'Non-Political',
                );
				$js = 'class="fielddd"';
				echo form_dropdown('type_of_cam', $options, $type_of_cam, $js);?>
                     	
                </div><br />
                <div class="block-padding">
                            <h2>Upload:</h2>
               	</div>
                     	
                       	<p><span class="normallink">Campaign Picture</span>&nbsp;&nbsp;(This picture should represent your campaign. PNG, JPEG, GIF or BMP. Size limit: 10 Mega Byte.  At least 640X480 pixels. 4:3 aspect ratio)</p>
                        <div class="block-margin" id="pic">
                        <p style="background:#CCC;"><?=form_hidden('upimage1',0)?> <?=form_error('upimage1');?><input type="file" name="userfile1" id="userfile1" /></p>
                        <?
					   	if($cid != 0 and $cam_pic !=''){
					   ?>
                       <p>
                            <img src="<?=base_url();?>cam_pics/<?=$cam_pic?>" class="img-style" />
                     	</p>
                        <? } ?>
                        </div>

                        <div class="block-margin">
                        <div class="block-padding">
                            <input name="save" type="submit" value='&nbsp;&nbsp;Save&nbsp;&nbsp;' class="button" />
                              <?
							 if($cid >0)
				{
                				if($rows['status'] == '2'){
							?>
                          &nbsp;&nbsp;&nbsp;<a href="<? echo site_url('campaign/main/'.$cid);?>" class="button2">Back to Campaign</a>
                          <? } }?>
                     	</div></div><br />


				</div>
			</div>
		</div>
	</div>
   
    
    
    
    
    
    
    
</section>