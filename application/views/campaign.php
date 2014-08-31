<?

$cwyrow = $cwy->row_array();
$cctarow = $ccta->row_array();
$cjrow = $cj->row_array();
$cbrow = $cb->row_array();
$cayrow = $cay->row_array();
$row = $cam->row_array();
$canid = $row['can_id'];
$camuser = $this->user_model->get_info($canid);
$urow = $camuser->row_array();
$arow = $activeuser->row_array();
?>
  <script type="text/javascript" charset="utf-8">
    $(document).ready(function(){
      $('.popbox').popbox();
    });
  </script>
<section>
	<div class="row">

       <div class="wrap-content affangrid">
            <div class="col-full">
                <div class="block03">
                 <?
					if($cb->num_rows() > 0)
					{
						
						?>
						
                         <h1><?=$cbrow['cam_title']?></h1>
						
						<?
						
					}
					?>
                 	
                    <?
					if($cay->num_rows() > 0)
					{
						if($cayrow['profile_pic'] !=''){
						?>
						<img src="<?=base_url();?>cam_pics/<?=$cayrow['profile_pic']?>" class="img-stylep" />
						
						<?
						}
					}
					?><h3><?=$urow['name']?></h3>
                     <p>
                    <div style="width: 550px;" class="popbox">
  <a class="open" href="#">Bio</a>
  <span class="smalllink">|&nbsp;&nbsp;
                    <?
					if($cay->num_rows() > 0)
					{
						
						?>
						 <u><?=$cayrow['cam_from']?></u>&nbsp;&nbsp;|&nbsp;&nbsp;
						
						<?
						
					}
					?>
                   <?
					if($cb->num_rows() > 0)
					{
						
						?>
						 <u><?=$cbrow['type_of_cam']?></u>
						
						<?
						
					}
					?>
                    </span>
    <div class="collapse">
      <div style="display: none; top: 10px; left: 0px;" class="box">
      
        
		<?=$cayrow['short_bio']?>
      </div>
    </div>
    
  </div>
                  
                    </p>
              </div>
            </div>
        </div>
		<div class="wrap-content affangrid">
            <div class="col-full">
                <div class="block04">
                 	 <div class="col-1-5">
                        <h1>0</h1>
                        <p><strong>Share</strong></p>
                    </div>
                  <div class="col-4-5">
                        <div class="golla-wrap">
                        	<ol class="golla">f</ol><ol class="gollar-qty">1000</ol>
                        </div>
                    	<div class="golla-wrap">
                        	<ol class="golla">t</ol><ol class="gollar-qty">100</ol>
                        </div>
                        <div class="golla-wrap">
                        	<ol class="golla">g</ol><ol class="gollar-qty">100</ol>
                        </div>
                        <div class="golla-wrap">
                        	<ol class="golla">l</ol><ol class="gollar-qty">100</ol>
                        </div>
                        <div class="golla-wrap">
                        	<ol class="golla">s</ol><ol class="gollar-qty">100</ol>
                        </div>
                        <div class="golla-wrap">
                        	<ol class="golla">p</ol><ol class="gollar-qty">100</ol>
                        </div>
                        <div class="golla-wrap1">
                   	  	<a href="#" class="smalllink-gray">Turn-off Share Panel</a></div>
                    	</div>
              </div>
            </div>
        </div>
    </div>
    
    
    
	<div class="wrap-content affangrid">
		<div class="row block00">
			<div class="col-full">
			  <div class="block001">
                      <div class="borderdiv">
                       
                        <ol class="mainnevp">Main</ol>
                       
                        <a href="<? echo site_url('visitor/updates');?>"><ol class="mainnevgp">Updates</ol></a>
                        <a href="<? echo site_url('visitor/ideas');?>"><ol class="mainnevgp">Ideas</ol></a>
                        <a href="<? echo site_url('visitor/supporters');?>"><ol class="mainnevgp">Supporters</ol></a>
                        <a href="<? echo site_url('visitor/feedback');?>"><ol class="mainnevgp">Feedback</ol></a>
                      
                       </div>
				</div>
			</div>
          <div class="col-3-4">
			  <div class="block05">
              
              		<?
					if($cb->num_rows() > 0)
					{
						if($cbrow['cam_pic'] !=''){
						?>
                         <div class="inner-block">
                          <img src="<?=base_url();?>cam_pics/<?=$cbrow['cam_pic']?>" />
                   		</div>
						<?
						}
						if($cbrow['cam_video'] !=''){
						?>
                         <div class="inner-block">
                         
                         <iframe width="640" height="480" src="<?=$cbrow['cam_video']?>" frameborder="0" allowfullscreen></iframe>
                   		</div>
						<?
						}
						
					}
					?>
				</div>
                	<?
					if($cb->num_rows() > 0)
					{
					?>
                         <div class="block05">
                        <div class="inner-block-round">
                            <h2 style="color:#002060">Why I am running for this position</h2>`
                             <?=$cbrow['cam_goal']?>
                            </div> 
                            </div> 
                   <?
					}
					?>
               <?
					if($cj->num_rows() > 0)
					{
					?>
                         <div class="block05">
                        <div class="inner-block-round">
                            <h2 style="color:#002060">Justify the campaign</h2>`
                             <?=$cjrow['justify']?>
                            </div> 
                            </div> 
                   <?
					}

					if($cwy->num_rows() > 0)
					{
					?>
                         <div class="block05">
                        <div class="inner-block-round">
                            <h2 style="color:#002060">Why you?</h2>`
                             <?=$cwyrow['why_you']?>
                            </div> 
                            </div> 
                   <?
					}

                    if($ccta->num_rows() > 0)
					{
					?>
                         <div class="block05">
                        <div class="inner-block-round">
                            <h2 style="color:#002060">Call to Action</h2>`
                             <?=$cctarow['call_to_action']?>
                            </div> 
                            </div> 
                   <?
					}
					?>
			</div>
             <div class="col-1-4">
			  <div class="block06">
                <div class="pre-right-round">
               	  	`<p>Every  idea, every  feedback, every comment counts for this newly launched campaign. Be a pioneer, and nudge this campaign in the right direction.</p><br />

                     	
                        <p><a href="" class="normallink">Contribute Ideas</a></p>
                        <p><a href="" class="normallink">Leave a comment</a></p>
                        <p><a href="" class="normallink">Be a supporter</a></p>
                        <p><a href="" class="normallink">Share with friends</a></p>
						
                        
                  </div>
                  <div class="pre-right-nor">
               	  	<h2>Upcoming Events</h2>`
                    <p>Upcoming events will be posted soon.</p>
                  </div>
                 
				</div>
			</div>
		</div>
	</div>

    
    
    
    
    
    
    
</section>