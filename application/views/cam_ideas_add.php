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
<?
$cbrow = $cb->row_array();
?>
<section id="content">
<?= form_open_multipart('campaign/add_idea');?>

       
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
                        <ol class="mainnevp">Ideas</ol>
                        <a href="<? echo site_url('campaign/supporters');?>"><ol class="mainnevgp">Supporters</ol></a>
                        <a href="<? echo site_url('campaign/feedback');?>"><ol class="mainnevgp">Feedback</ol></a>
               </div>
					
                    
                        <div class="block-padding">
                            <h2>Contribute an Idea:</h2> 
                        </div>
                        
                      <div class="block-margin">
                      <span class="normaltitle">Idea Title</span> &nbsp;&nbsp;<span id="txtCounter" style="font-size:12px; color:#666666">(0/60)</span>:<?=form_error('idea_title');?>
                      <br />

                        <input name="idea_title" id="idea_title" type="text" class="input1" onkeyup="javascript:txtCounters('txtCounter',60,'idea_title')" maxlength="60" value="<?=$idea_title?>"  /><br />
<br />
<span class="normaltitle">Details of Idea:</span> <?=form_error('details');?><br />
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
                            <input name="save" type="submit" value="Post Idea" class="button" />
                </div></div><br />
						
                        <div class="block-padding">
                            <h2>Current Ideas:</h2> 
                        </div>
						<?
						if($uplist->num_rows() > 0)
						{
							foreach( $uplist->result_array() as $row )
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
						
							<?=$row['details'];?>

                            </div>
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