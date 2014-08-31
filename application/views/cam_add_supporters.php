<?
$row = $cam->row_array();
$canid = $row['can_id'];
$camuser = $this->user_model->get_info($canid);
$urow = $camuser->row_array();
$arow = $activeuser->row_array();
$ase = $this->candidate_model->get_cam('cam_supporters',$cam_id);
$good = $this->candidate_model->get_cam_sup_vote($cam_id,'I support the campaign');
$not_bad = $this->candidate_model->get_cam_sup_vote($cam_id,'I support the campaign and like to help out');
$bad = $this->candidate_model->get_cam_sup_vote($cam_id,'I would support the campaign, if it addressed the following');
$cbrow = $cb->row_array();
?>

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
                       
                        <a href="<? echo site_url('campaign/main/'.$cam_id);?>"><ol class="mainnevgp">Main</ol></a>
                        
                        <a href="<? echo site_url('campaign/updates');?>"><ol class="mainnevgp">Updates</ol></a>
                         <a href="<? echo site_url('campaign/ideas');?>"><ol class="mainnevgp">Ideas</ol></a>
                        <ol class="mainnevp">Supporters</ol>
                        <a href="<? echo site_url('campaign/feedback');?>"><ol class="mainnevgp">Feedback</ol></a>
                       </div>
				</div>
			</div>
        	
            
            
            <div class="col-3-4">
                  <div class="block05">
                     <div class="inner-block">
                              <div class="block-padding">
                            <a href="<? echo site_url('campaign/supporters');?>" class="mediamlink" style="line-height: 40px;">List of Supporter</a> <span style="line-height: 40px;" class="mediamlink">&nbsp;|&nbsp;</span> <a href="<? echo site_url('campaign/support_if');?>" class="mediamlink" style="line-height: 40px;">"I would support if…"</a>
                        </div>
						
                        <div class="block-update">
                        	<?= form_open_multipart('campaign/add_support');?>

                      
						<div class="block-padding">
                            <h2>Do you support the campaign?</h2><?=form_error('vote');?>
                     	</div>
                        <div class="block-margin"><input name="vote" type="radio" value="I support the campaign" /> I support the campaign</div>
                        <div class="block-margin"><input name="vote" type="radio" value="I support the campaign and like to help out" /> I support the campaign and like to help out</div>
                        <div class="block-margin"><input name="vote" type="radio" value="I would support the campaign, if it addressed the following" /> I would support the campaign, if it addressed the following:</div>

                        
                        <div class="block-margin">
                     	<textarea name="comments" cols="" rows="" class="textarea2"></textarea><?=form_error('comments');?>
                       </div>
                       <div class="block-margin">
                        <div class="block-padding">
                            <input name="save" type="submit" value="  Submit  " class="button" />
                            
               	</div></div>
<?=form_close()?>
                        
                        </div>
                     </div>
                 </div>
			</div>

<div class="col-1-4">
			  <div class="block06">
                <div class="pre-right">
               
               	  <h1 style="text-align:center; padding-top:8px; color:#002060;"><?=$good->num_rows()?></h1>
					<h3 style="text-align:center; color:#404040; font-size:14px; font-weight:bold;">"I support the campaign."</h3>
						
                     <h1 style="text-align:center; padding-top:8px; color:#002060;"><?=$not_bad->num_rows()?></h1>
              <h3 style="text-align:center; color:#404040; font-size:14px; font-weight:bold; line-height:15px;">"I support the campaign and like to help out."</h3>
                                        
                    
                      <h1 style="text-align:center; padding-top:8px; color:#002060;"><?=$bad->num_rows()?></h1>
					<h3 style="text-align:center; color:#404040; font-size:14px; font-weight:bold;">"I would support if…"</h3>
                    

 
                  </div>
               
				</div>
			</div>

            
            
		</div>
	</div>

   
    
    
    
    
    
</section>