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
<?
$attributes = array('id' => 'myform');
?>
<?= form_open_multipart('campaign_edit/updates',$attributes);?>

       
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
               
                <a href="<? echo site_url('candidate/core');?>"><ol class="mainnevg">Core Campaign</ol></a>
                <ol class="mainnev">Updates & more</ol>
                <a href="<? echo site_url('campaign_edit/ideas');?>"><ol class="mainnevg">Ideas</ol></a>
                <a href="<? echo site_url('campaign_edit/events');?>"><ol class="mainnevg">Events</ol></a>
               </div>
					
                    
                        <div class="block-padding">
                            <h2>Post an Update:</h2> 
                        </div>
                        
                      <div class="block-margin">
                      <span class="normaltitle">Post Title</span> &nbsp;&nbsp;<span id="txtCounter" style="font-size:12px; color:#666666">(0/60)</span>:<?=form_error('post_title');?>
                      <br />

                        <input name="post_title" id="post_title" type="text" class="input1" onkeyup="javascript:txtCounters('txtCounter',60,'post_title')" maxlength="60" value="<?=$post_title?>"  /><br />
<br />
<p><span class="normallink">Add Picture:&nbsp;</span><?=form_hidden('upimage',0)?> <?=form_error('upimage');?><input type="file" name="userfile" id="userfile" /></p>
                        <br />
<br />
<span class="normaltitle" style="float:left;">Caption:&nbsp;<input name="caption" type="text" class="input01" id="caption" value="<?=$caption?>" size="92"  /></span><br />
<br />

                        
<span class="normaltitle">Details:</span> <?=form_error('details');?><br />
<textarea name="details" cols="" rows="8" class="textarea1" id="details" ><?=formatHTMLToText($details)?></textarea><?php //echo display_ckeditor($ckeditor); ?>
                </div>
                        

                        <div class="block-margin">
                        <div class="block-padding">
                            <a href="#" onclick="document.getElementById('myform').submit();" class="button2b">&nbsp;Save&nbsp;</a>&nbsp;&nbsp;&nbsp;<a href="<? echo site_url('campaign/main/'.$cam_id);?>" class="button2">Back to Campaign</a>
                           
                     	</div></div><br />
						
                       
						<?
						if($uplist->num_rows() > 0)
						{
							
							?>
                             <div class="block-padding">
                            <h2>Current Posts:</h2> 
                        </div>
                            <?
							foreach( $uplist->result_array() as $row )
							{
						?>
                            <div class="block-margin">
                            <a href="<? echo site_url('campaign_edit/updates_view/'.$row['id']);?>" class="mediamlink"><?=$row['post_title']?></a> <span class="mediamlink">&nbsp;|&nbsp;</span><a href="<? echo site_url('campaign_edit/updates_edit/'.$row['id']);?>" class="mediamlink">Edit</a></div>

                            
<div class="block-margin">
							<span class="postdate">Posted on: <? $postdate = new DateTime($row['add_date']); echo $postdate->format('jS \o\f F Y');?></span>
                            
                            </div>
                             <?
					   	if($row['picture'] !='0'){
					   ?>
                       <div class="block-margin">
                       <p>
                            <img src="<?=base_url();?>cam_pics/<?=$row['picture']?>" class="img-style" />
                     	</p></div>
                        <div class="block-margin">
						Caption: <?=$row['caption'];?>
                        </div>
                        <? } ?>
                        
						<div class="block-margin">
							<?=$row['details'];?>
                            </div>

						<?
							}
						}
						?>
                        

			  </div>
			</div>
		</div>
	</div>
   
    
    
    
    
    
    
    
</section>