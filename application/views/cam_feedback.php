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
<?
$cbrow = $cb->row_array();
?>
<section id="content">
      <?= form_open_multipart('campaign/feedback');?> 
     
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
                         <a href="<? echo site_url('campaign/ideas');?>"><ol class="mainnevgp">Ideas</ol></a>
                        <a href="<? echo site_url('campaign/supporters');?>"><ol class="mainnevgp">Supporters</ol></a>
                        <ol class="mainnevp">Feedback</ol>
               </div>
					
						
                        <div class="block-padding">
                            <h2>Feedback about the Campaign:</h2> 
                        </div>
                        <?
							if($this->session->userdata('user_id') != ''){
						?>
                        <div class="block-margin">
                        <textarea name="comments" cols="" rows="5" class="textarea1" id="comments"></textarea>
                        </div>
                        
                        <div class="block-margin">
                        <div class="block-padding">
                            <input name="save" type="submit" value="Post" class="button" />
                          
                           
                     	</div></div>
                        
                       <?

								}else
								{
							?>
                             <div class="block-margin">
                            		<a href="<? echo site_url('welcome/index/'.$cam_id);?>" class="button20" style="display: block; margin-left: auto; margin-right: auto;">Log-in to post feedback</a>
                                    </div>
                            <?	
								}
							?>
						 <?
					if($fb->num_rows() > 0)
					{
						
						?>
                        <div class="block-padding">
                           <span style="font-size:16px; color:#000000">Sort by Time of Feedback:</span>&nbsp;<a href="<? echo site_url('campaign/feedback');?>" class="mediamlink">Latest on top</a> <span  class="mediamlink">&nbsp;|&nbsp;</span> <a href="<? echo site_url('campaign/feedback/1');?>" class="mediamlink">Oldest on top</a>
                        </div>
                        <div class="block-margin"></div>
                        <?	
								}
							?>
                      <?
							foreach( $fb->result_array() as $row )
							{

						  		
								
							$post_user = $this->user_model->get_info($row['user_id']);
							$purow = $post_user->row_array();
						  $othercam = $this->candidate_model->get_cam_sup_count($cam_id,$row['user_id']);
						?>
                            <div class="block-update">
                            <div style="width:9%; height:auto; float:left;">
                            <?
								if($purow['photo'] !=''){ $sobi = $purow['photo']; } else {$sobi = 'user.jpg';}
							?>
                            <img src="<?=base_url();?>user_pic/<?=$sobi?>" class="displayed" />

                            </div>
                            <div style="width:89%; float:left; margin-left:2%">
                            <span class="normallink"><?=$purow['name']?>:</span>&nbsp;<span class="postdate">(Posted on: <? $postdate = new DateTime($row['add_date']); echo $postdate->format('jS \o\f F Y');?>)</span><br />
                            
                           
							<?=$row['comments'];?>

                            </div>
                            </div>
						<?
						}
						?>
               
			  </div>
			</div>
		</div>
	</div>
   
    
    
    
    
    
    
    
</section>