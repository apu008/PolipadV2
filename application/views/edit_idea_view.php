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

<section id="content">
      <?= form_open_multipart('campaign_edit/idea_view');?> 
      <input name="iid" type="hidden" value="<?=$iid?>" />
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
                <a href="<? echo site_url('candidate/basics/'.$cam_id.'/e');?>"><ol class="mainnevg">Basics</ol></a>
               
                <a href="<? echo site_url('candidate/core/e');?>"><ol class="mainnevg">Core Campaign</ol></a>
                <a href="<? echo site_url('campaign_edit/updates');?>"><ol class="mainnevg">Updates & more</ol></a>
                <ol class="mainnev">Ideas</ol>
                <a href="<? echo site_url('campaign_edit/events');?>"><ol class="mainnevg">Events</ol></a>
               </div>
					
                    
                        <div class="block-padding">
                            <a href="<? echo site_url('campaign_edit/ideas');?>" class="mediamlink">Back to "Add an Idea"</a>
                        </div>
                         <div class="block-margin"></div>
                         <div class="block-padding2">
                           <h2><?=$idea_title?></h2>
                           <span class="postdate">Posted on: <? $postdate = new DateTime($add_date); echo $postdate->format('jS \o\f F Y');?></span>
                          
                         </div>
                <div class="block-margin"></div>
                 <?
						if($idea_pic !='0'){
						
						?>
                           <div class="block-margin">
                           <img src="<?=base_url();?>cam_pics/<?=$idea_pic?>" class="displayed" style="padding-top:10px; padding-bottom:10px;" />
                           </div>
                           <div class="block-margin mediamlink" style="text-align:center; padding-bottom:10px;">
                           <?=$caption?>
                           </div>
                          <? } ?>
                           <div class="block-margin">  <div class="borderdiv2"></div></div>
                           
                        
                         
                         
                          <?
							
							if($this->candidate_model->is_idea_vote_by_can($this->session->userdata('user_id'),$iid))
							{
						  ?>
                       	<div style="width:9%; height:auto; float:left;"><img src="<?=base_url();?>images/balb.png" class="displayed" style="padding-top:20px;" /></div>
                         <div style="width:89%; float:left; margin-left:2%">
                          <div class="block-margin">
                          <?
						  		$good = $this->candidate_model->idea_vote_count($iid,'Idea is good and practical');
								$not_bad = $this->candidate_model->idea_vote_count($iid,'Idea is good, but not practical');
								//$bad = $this->candidate_model->idea_vote_count($iid,'Bad idea – should be left alone!');
						  ?>
                         	<?=$good->num_rows()?> visitor(s) thought this is a good and practical idea. <?=$not_bad->num_rows()?> voted as Idea is not practical.
                         </div>
                         <div class="block-margin">
                         	<input name="vote" type="radio" value="Idea is good and practical" />&nbsp;&nbsp;Idea is good and practical
                         </div>
                         <div class="block-margin">
                         	<input name="vote" type="radio" value="Idea is good, but not practical" />&nbsp;&nbsp;Idea is not practical
                         </div>
                        
						</div>
						 
                        	<?
							}
							?>
                             <div class="block-margin"><div class="borderdiv2"></div></div>
                          <div class="block-margin">
                          <?=$details?>
                         </div>
                         
                       
						
                        <div class="block-padding">
                            <h2>Add comment:</h2> 
                        </div>
                        <div class="block-margin">
                        <textarea name="comments" cols="" rows="" class="textarea1" id="comments"></textarea>
                        </div>
                        
                        <div class="block-margin">
                        <div class="block-padding">
                            <input name="save" type="submit" value="Post" class="button" />
                          
                           
                     	</div></div>
						
                        <div class="block-padding">
                            <h2>Comments:</h2> 
                        </div>
                        
                        <?
						$uplist = $this->candidate_model->idea_com($iid);
						if($uplist->num_rows() > 0)
						{
							foreach( $uplist->result_array() as $row )
							{
								$post_user = $this->user_model->get_info($row['user_id']);
								if($post_user->num_rows() > 0)
								{
									$purow = $post_user->row_array();
									$cname = $purow['name'];
								}
								else
								{
									$cname = '';	
								}
								
						?>
                            <div class="block-update">

							<span class="postdate">Posted by: <?=$cname?>. Posted on: <? $postdate = new DateTime($row['add_date']); echo $postdate->format('jS \o\f F Y');?>. </span><br />
						
							<?=$row['comments'];?>


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