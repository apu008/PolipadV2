<?
$row = $cam->row_array();
$canid = $row['can_id'];
$camuser = $this->user_model->get_info($canid);
$urow = $camuser->row_array();
$arow = $activeuser->row_array();
$cbrow = $cb->row_array();
$cbrow = $cb->row_array();
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
  counter.innerHTML = '('+remaining_characters+'/'+max_length+')';  //}
 } 

 </script>
<section>
    
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
                       
                        <a href="<? echo site_url('sharecampaign/main/'.$cam_id);?>"><ol class="mainnevgp">Main</ol></a>
                        
                        <a href="<? echo site_url('sharecampaign/updates');?>"><ol class="mainnevgp">Updates</ol></a>
                        <ol class="mainnevp">Ideas</ol>
                        <a href="<? echo site_url('sharecampaign/supporters');?>"><ol class="mainnevgp">Supporters</ol></a>
                        <a href="<? echo site_url('sharecampaign/feedback');?>"><ol class="mainnevgp">Feedback</ol></a>
                       </div>
				</div>
			</div>
        	<?
				if($ideas->num_rows() < 1)
				{
			?>
            <?= form_open_multipart('campaign/ideas');?>
            <div class="col-full">
			  <div class="block05">
                      <h2 style="color:#A6A6A6">"More powerful than the mighty armies is an idea whose time has come."</h2>
                      <h3 style="color:#8EB4E3">&nbsp;Victor Hugo</h3>
                        <?
							if($this->session->userdata('user_id') != ''){
						?>
						<div class="block-padding">
                           <h2>Add an Idea:</h2>
                     	</div>
                        <div class="block-margin">
                      <span class="normaltitle">Idea Title</span> &nbsp;&nbsp;<span id="txtCounter" style="font-size:12px; color:#666666">(0/60)</span>:<?=form_error('idea_title');?>
                        
                        </div>
                     	<div class="block-margin">
                        <input name="idea_title" id="idea_title" type="text" class="input1" onkeyup="javascript:txtCounters('txtCounter',60,'idea_title')" maxlength="60"  />
                       </div>
                       
                      	<div class="block-margin">Details of Idea: <?=form_error('details');?></div>
                        
                        <div class="block-margin">
                     	<textarea name="details" cols="" rows="8" class="textarea1" id="details"><?=$details?></textarea>
                       
                       </div>
                        
                       <div class="block-margin"></div>
<div class="block-margin">

<p><span class="normallink">Add Picture:&nbsp;</span><?=form_hidden('upimage',0)?> <?=form_error('upimage');?><input type="file" name="userfile" id="userfile" /></p>
                        <br />
</div>
<div class="block-margin">
<span class="normaltitle">Caption</span> &nbsp;&nbsp;<span id="txtCounter1" style="font-size:12px; color:#666666">(0/70)</span>:
</div><div class="block-margin">
<input name="caption" type="text" class="input1" onkeyup="javascript:txtCounters('txtCounter1',70,'caption')" maxlength="70" id="caption" value="<?=$caption?>" size="92" style="float:left;"  />
                </div>  
                       <div class="block-margin">
                        <div class="block-padding">
                            <input name="save" type="submit" value="  Publish  " class="button" />
                            
                     	</div></div><br />
                         <?

								}else
								{
							?>
                             <div class="block-margin">
                            		<a href="<? echo site_url('welcome/index/'.$cam_id);?>" class="button20" style="display: block; margin-left: auto; margin-right: auto;">Log-in to add an idea</a>
                                    </div>
                            <?	
								}
							?>

				</div>
			</div>
            <?=form_close()?>
            <?
				}else{
			?>
            
            
            <div class="col-3-4">
                  <div class="block05">
                     <div class="inner-block">
                              <div class="block-padding">
                            <h2>Current Ideas:</h2> 
                        </div>
						<?
							foreach( $ideas->result_array() as $row )
							{

						  		$good = $this->candidate_model->idea_vote_count($row['id'],'Idea is good and practical');
								$not_bad = $this->candidate_model->idea_vote_count($row['id'],'Idea is good, but not practical');
								//$bad = $this->candidate_model->idea_vote_count($row['id'],'Bad idea – should be left alone!');
						  
						?>
                            <div class="block-update">
                            <div style="width:9%; height:120px; float:left;">
                            <div style="background:#002060; height:60px;"><h1 style="text-align:center; padding-top:8px; color:#D9D9D9; font-size:22px;"><?=$good->num_rows()?></h1>
                            </div>
                            <div style="background:#D9D9D9; height:60px;"><h1 style="text-align:center; padding-top:8px; color:#002060; font-size:22px;"><?=$not_bad->num_rows()?></h1></div>
                            </div>
                            <div style="width:89%; float:left; margin-left:2%">
                            <a href="<? echo site_url('campaign/idea_view/'.$row['id']);?>" class="mediamlink"><?=$row['idea_title']?></a>
                            <?
							if($this->candidate_model->is_idea_this_can($this->session->userdata('user_id'),$row['id']))
							{
							?>
                            <span class="mediamlink">&nbsp;|&nbsp;</span><a href="<? echo site_url('campaign/idea_edit/'.$row['id']);?>" class="mediamlink">Edit</a>
                            <?
							}
							$post_user = $this->user_model->get_info($row['user_id']);
							$purow = $post_user->row_array();
							$idea_com = $this->candidate_model->idea_com($row['id']);
							?>
                            <br />
							<span class="postdate">Posted by: <?=$purow['name']?>. Posted on: <? $postdate = new DateTime($row['add_date']); echo $postdate->format('jS \o\f F Y');?>. <?=$idea_com->num_rows();?> Comments</span><br />
						
							<?=substr($row['details'],0,140);?> ... <a href="<? echo site_url('campaign/idea_view/'.$row['id']);?>" class="mediamlink">More</a>

                            </div>
                            </div>
						<?
						}
						?>
                     </div>
                 </div>
			</div>

<div class="col-1-4">
			  <div class="block06">
                <div class="pre-right">
                <?
					$totideas = $this->candidate_model->get_cam('cam_ideas',$cam_id);
					$totcom = $this->candidate_model->get_cam('cam_ideas_comments',$cam_id);
				?>
               	  <h1 style="text-align:center; padding-top:8px; color:#002060;"><?=$totideas->num_rows()?></h1>
					<h3 style="text-align:center; color:#404040; font-size:16px; font-family:Arial, Helvetica, sans-serif; ">Ideas</h3>
						
                     <h1 style="text-align:center; padding-top:8px; color:#002060;"><?=$totcom->num_rows()?></h1>
                    <h3 style="text-align:center; color:#404040; font-size:16px; font-family:Arial, Helvetica, sans-serif; ">Comments</h3>
                                        
                     <img src="<?=base_url();?>images/balb.png" class="displayed" /><br />
                      <?
								if($this->session->userdata('user_id') != ''){
									?>
<a href="<? echo site_url('campaign/add_idea');?>" class="button2" style="display: block; margin-left: auto; margin-right: auto;">Contribute an Idea</a>
 							<?

								}else
								{
							?>
                            		<a href="<? echo site_url('welcome/index/'.$cam_id);?>" class="button2" style="display: block; margin-left: auto; margin-right: auto;">Login for Add an Idea</a>
                            <?	
								}
							?>
 
                  </div>
               
				</div>
			</div>
            
          <?
				}
			?>   
            
            
		</div>
	</div>

 
    
    
    
    
</section>