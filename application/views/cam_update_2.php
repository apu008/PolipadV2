<?

$row = $cam->row_array();
$canid = $row['can_id'];
$cbrow = $cb->row_array();

?>
  <script type="text/javascript" charset="utf-8">
    $(document).ready(function(){
      $('.popbox').popbox();
    });
  </script>
<section id="content">
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
                            <ol class="mainnevp">Updates</ol>
                            <a href="<? echo site_url('sharecampaign/ideas');?>"><ol class="mainnevgp">Ideas</ol></a>
                            <a href="<? echo site_url('sharecampaign/supporters');?>"><ol class="mainnevgp">Supporters</ol></a>
                            <a href="<? echo site_url('sharecampaign/feedback');?>"><ol class="mainnevgp">Feedback</ol></a>
                           </div>
                    </div>
                </div>
        
           
            
        	<div class="col-full">
                  <div class="block001">
                  	<?
						if($uplist->num_rows() > 0)
						{
							foreach( $uplist->result_array() as $row )
							{
						?>
                            <div class="block-padding">
                            <h2 style=" text-decoration:underline;"><?=$row['post_title']?></h2>
                            <span class="postdate">Posted on: <? $postdate = new DateTime($row['add_date']); echo $postdate->format('jS \o\f F Y');?></span>
                            </div>
                             <?
							if($row['picture']!=''){
						   ?> <div class="block-padding">
						   <p>
								<img src="<?=base_url();?>cam_pics/<?=$row['picture']?>" class="img-style" />
							</p><br />
							<span style="color:#333">Caption: <?=$row['caption']?></span><br /><br />
							</div>
	
							<? } ?>
                            <div class="block-margin">
							<?=$row['details'];?>
                            </div>

						<?
							}
						}
						else
						{
						?>
                         <div class="col-full">
                              <div class="block05">
                                <h1 style="color:#999">Candidate has not posted any update of the campaign yet. Please check back soon.</h1><br />
                                <br />
                                <br />
                                </div>
                        </div>
                         	<div class="col-2-5">
                              <div class="block05">
                              <img src="<?=base_url();?>images/bubble.png" class="displayed" />
                              </div>
                              </div>
                              <div class="col-1-5">
                              <div class="block05">
                              
                              </div>
                              </div>
                              <div class="col-3-5">
                              <div class="block05">
                              <h3 style="color:#A6A6A6">"The simple things are also the most extraordinary things, and only the wise can see them."</h3>
                                <h2 style="color:#8EB4E3">&nbsp;Paulo Coelho, The Alchemist</h2>
                              </div>
                              </div>
                                
                            </div>
                        </div>
                        <?
						}
						?>
                        <div class="block-footer"></div>
                       
                  </div>
            </div>
		</div>
	</div>  
    
    
</section>