
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
  counter.innerHTML = '('+remaining_characters+'/140)';  //}
 } 


 </script>
 <?
$attributes = array('id' => 'myform');
?>
<section id="content">
<?= form_open_multipart('candidate/call_to_action',$attributes);?>

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
                <a href="<? echo site_url('candidate/about_you/'.$cam_id);?>"><ol class="mainnevg">About you</ol></a>
                <a href="<? echo site_url('candidate/basics');?>"><ol class="mainnevg">Basics</ol></a>
                
                <ol class="mainnev">Call to Action</ol>
               </div>
                      
                        <div class="block-padding">
                            <h2>Call to Action:</h2><?=form_error('call_to_action');?>
                     	</div>
                        <div class="block-margin">
                       <p><span style="color:#000000">What do you want your supporters to do?</span> 
</p></div>
                        <div class="block-margin">
                     	<textarea name="call_to_action" cols="" rows="" class="textarea1" onkeyup="javascript:txtCounters('txtCounter',140,'call_to_action')"><?=$call_to_action?></textarea>
                        <?php echo display_ckeditor($ckeditor); ?>
                        </div>
                        
                        


                        <div class="block-margin">
                        <div class="block-padding">
                            <input name="save" type="submit" value="Save and Preview  Campaign" class="button" />
                           
                           
                     	</div></div><br />

				</div>
			</div>
		</div>
	</div>
   
    
    
    
    
    
    
    
</section>