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
<script>
$(document).ready(

	function() {

			var base_url = '<?=base_url();?>';

			$('.date-pick').datepicker({dateFormat: 'yy-mm-dd'});


});
</script>

<section id="content">
<?
$attributes = array('id' => 'myform');
?>
<?= form_open_multipart('campaign_edit/events',$attributes);?>

       
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
                 <a href="<? echo site_url('campaign_edit/updates');?>"><ol class="mainnevg">Updates & more</ol></a>
                <a href="<? echo site_url('campaign_edit/ideas');?>"><ol class="mainnevg">Ideas</ol></a>
                <ol class="mainnev">Events</ol>
               </div>
					
                    
                        <div class="block-padding">
                            <h2>Add Events:</h2> 
                        </div>
                        
                      <div class="block-margin">
                      <span class="normaltitle">Event Title</span> <span id="txtCounter" style="font-size:12px; color:#666666">(0/60)</span>:<?=form_error('event_title');?>
                      <br />

                        <input name="event_title" id="event_title" type="text" class="input1" onkeyup="javascript:txtCounters('txtCounter',60,'event_title')" maxlength="60" value="<?=$event_title?>"  /><br />
<br />
<span class="normaltitle">Pick a Date:</span> &nbsp;&nbsp;<input type="text" name="event_date" id="event_date" value="" class="date-pick input3" size="15" /><?=form_error('event_date');?><br />
<br />
<?
$dd = array('1:00', '1:30', '2:00', '2:30', '3:00', '3:30', '4:00', '4:30', '5:00', '5:30', '6:00', '6:30', '7:00', '7:30', '8:00', '8:30', '9:00', '9:30', '10:00', '10:30', '11:00', '11:30', '12:00', '12:30');
?>
<span class="normaltitle">Start On:</span>&nbsp;&nbsp;
<select name="startd" class="fielddd">
<? for($i=0; $i<24; $i++){?>
  <option value="<?=$dd[$i]?>" <? if($startd==$dd[$i]){?> selected="selected"<? } ?>><?=$dd[$i]?></option>	
<? } ?>	
</select>&nbsp;&nbsp;
<select name="startdam" class="fielddd">
  <option value="AM" <? if($startdam=='AM'){?> selected="selected"<? }?>>AM</option>
  <option value="PM" <? if($startdam=='PM'){?> selected="selected"<? }?>>PM</option>
</select>
&nbsp;&nbsp;<span class="normaltitle">Ends At:</span>&nbsp;&nbsp;
<select name="endd" class="fielddd">
<? for($i=0; $i<24; $i++){?>
  <option value="<?=$dd[$i]?>" <? if($endd==$dd[$i]){?> selected="selected"<? } ?>><?=$dd[$i]?></option>	
<? } ?>	
</select>&nbsp;&nbsp;
<select name="enddam" class="fielddd">
<option value="AM" <? if($enddam=='AM'){?> selected="selected"<? }?>>AM</option>
  <option value="PM" <? if($enddam=='PM'){?> selected="selected"<? }?>>PM</option>
</select>
<br />
<br />
<span class="normaltitle">Place </span><span id="txtCounter2" style="font-size:12px; color:#666666">(0/60)</span>:<?=form_error('place');?>
                      <br />

                        <input name="place" id="place" type="text" class="input1" onkeyup="javascript:txtCounters('txtCounter2',60,'place')" maxlength="60" value="<?=$place?>"  /><br />
<br />
<span class="normaltitle">Description:</span><br />
 <input name="description" id="description" type="text" class="input4" value="<?=$description?>"  />
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
                            <h2>Upcoming Events:</h2> 
                        </div>
                            <?
							foreach( $uplist->result_array() as $row )
							{
						?>
                            <div class="block-update">
                            <span class="mediamlink"><?=$row['event_title']?>&nbsp;|&nbsp;</span><a href="<? echo site_url('campaign_edit/events_edit/'.$row['id']);?>" class="mediamlink">Edit</a><br />
							<span class="postdate">Posted on: <? $postdate = new DateTime($row['add_date']); echo $postdate->format('jS \o\f F Y');?></span><br />
                           <span class="normaltitle"> Date: <? $postdate = new DateTime($row['event_date']); echo $postdate->format('jS \o\f F Y');?>. Starts at: <?=$row['start_on'];?><?=$row['startdam'];?>. End at: <?=$row['ends_at'];?><?=$row['enddam'];?>. <br />
Place: <?=$row['place'];?>
                           
                           </span>
                           <br />

						
							Description: <?=$row['description'];?>
                            
                            
                            
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