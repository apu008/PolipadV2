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
                            <a href="<? echo site_url('campaign_edit/updates');?>" class="mediamlink">Back to "Post an Update"</a></div>
                         <div class="block-margin"></div>
                         <div class="block-padding2">
                           <h2><?=$post_title?></h2>
                           <span class="postdate">Posted on: <? $postdate = new DateTime($add_date); echo $postdate->format('jS \o\f F Y');?></span>
                        </div>
                       
                        <?
					   	if($picture!=''){
					   ?> <div class="block-padding2">
                       <p>
                            <img src="<?=base_url();?>cam_pics/<?=$picture?>" class="img-style" />
                     	</p><br />
						<span style="color:#333">Caption: <?=$caption;?></span><br /><br />
						</div>

                        <? } ?>
                        
                      <div class="block-margin">
                      <?=$details?>
                	 </div>

						<div class="block-margin"></div>
                       
                        

			  </div>
			</div>
		</div>
	</div>
   
    
    
    
    
    
    
    
</section>