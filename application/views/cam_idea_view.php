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
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=666925433391424&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>



<?
$cbrow = $cb->row_array();
?>
<section id="content">
      <?= form_open_multipart('campaign/idea_view');?> 
      <input name="iid" type="hidden" value="<?=$iid?>" />
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
                            <a href="<? echo site_url('campaign/ideas');?>" class="mediamlink">Back to "List of Current Ideas"</a>
                        </div>
                         <div class="block-margin"></div>
                         <div class="block-padding2">
                           <h2><?=$idea_title?></h2>
                           <span class="postdate">Posted on: <? $postdate = new DateTime($add_date); echo $postdate->format('jS \o\f F Y');?></span><?php /*?><br />
<div class="fb-like" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div><br />
<a href="https://twitter.com/share" class="twitter-share-button" data-hashtags="your_hash_tag" data-via="your_screen_name" data-count="vertical">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script><br />
<!-- Place this tag where you want the share button to render. -->
<div class="g-plus" data-action="share"></div>

<!-- Place this tag after the last share tag. -->
<script type="text/javascript">
  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/platform.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script><br />
<br /><?php */?>
<div>

        <div class="fb-like" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>
       
<br /><br />
       <?php /*?> <!-- Place this tag where you want the su badge to render -->
        <su:badge layout="1"></su:badge>
 
        <!-- Place this snippet wherever appropriate -->
        <script type="text/javascript">
          (function() {
            var li = document.createElement('script'); li.type = 'text/javascript'; li.async = true;
            li.src = ('https:' == document.location.protocol ? 'https:' : 'http:') + '//platform.stumbleupon.com/1/widgets.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(li, s);
          })();
        </script>
<br /><?php */?>
        <a href="https://twitter.com/share" class="twitter-share-button" data-hashtags="VoidCanvas">Tweet</a>
        <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
<br />


        <!-- Place this tag where you want the share button to render. -->
        <div class="g-plus" data-action="share" data-annotation="bubble"></div>
 
        <!-- Place this tag after the last share tag. -->
        <script type="text/javascript">
          (function() {
            var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
            po.src = 'https://apis.google.com/js/platform.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
          })();
        </script>
</div>
                          
                         </div><div class="block-margin"></div>
                         
                          
                 <?
						if($idea_pic !=0){
						
						?> 
                           <div class="block-margin">
                           <img src="<?=base_url();?>cam_pics/<?=$idea_pic?>" class="displayed" style="padding-top:10px; padding-bottom:10px;" />
                           </div>
                           <div class="block-margin mediamlink" style="text-align:center; padding-bottom:10px;">
                           <?=$caption?>
                           </div>
                            <div class="block-margin">  <div class="borderdiv2"></div></div>
                          <? } ?>
                         
                       
                         
                         
                          <?
							if($this->session->userdata('user_id') != ''){
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
						<?

								}else
								{
							?>
                            		 
                          <div class="block-margin">
                          <?=$details?>
                         </div>
                                    <div class="block-margin">
                                    <a href="<? echo site_url('welcome/index/'.$cam_id);?>" class="button2" style="display: block; margin-left: auto; margin-right: auto;">Login for Vote or Comment on this Idea</a>
                                    </div>
                            <?	
								}
							?> 
                            
                            
                        <div class="block-padding">
                            <h2>Comments:</h2> 
                            <br />
                           
<?PHP
$currentlink = $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
?>
<div class="fb-comments" data-href="<?=$currentlink?>" data-numposts="5" data-colorscheme="light" data-width="850px"></div>
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