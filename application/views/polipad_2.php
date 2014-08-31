<section id="content">

<!--------------Header--------------->

<div class="wrap-content" style="background:#B05423;">
<div class="affangrid">
	<div class="row blocklandingheader" style="background:url(<?=base_url();?>images/header.jpg)">
        <div class="col-full">
            <div class="blockland00">
            	<h1>Polipad</h1>
                <div class="blmargin"></div>
                <h2>Campaign made easy for regular people.</h2>
              <div class="blmargin1"></div>
             
                <a href="<? echo site_url('welcome/index');?>" class="button3">Start a Campaign</a>
           	</div>
		</div>
    </div>
    </div>
</div>
<!--------------Header--------------->
<div class="wrap-content affangrid">

	<div class="row">
        <div class="col-full">
            <div class="blockland01">
           Why is it so difficult for regular people to run effective campaign without the help of a giant political or financial machine? Polipad - an open source project - wants to change that.  Our strategy is simple... provide inexpensive, but robust tools to run effective campaign. Make it easy for the regular people to convey message and move people.         
           	</div>
            <div class="blockland01">
            	
                
           	</div>
            <div class="clear"></div>
            <div class="lndmiddag"></div>
            <?
				$fe = $this->db->query('select * from campaign where featured=1');
				if($fe->num_rows() > 0)
					{
						$ferow = $fe->row_array();
						$cid = $ferow['id'];
						$cb = $this->db->query('select * from cam_basic where cam_id='.$cid);
						if($cb->num_rows() > 0)
						{
							$cbrow = $cb->row_array();
						}
			?>
            <div class="blockland01">
            	<div class="lndimg"><img src="<?=base_url();?>images/ffl.png" width="39" height="35"></div>
                <div><h2><i>Featured Campaign</i></h2></div> <br />

                <a href="<? echo site_url('campaign/main/'.$cid);?>"><img src="<?=base_url();?>cam_pics/<?=$cbrow['cam_pic']?>" class="img-stylef" /></a><br /><br />
<br />

<br /><br />

<?=$cbrow['cam_title']?>
           	</div>
            <div class="clear"></div><br />

            <div class="lndmiddag"></div>
            <? } ?>
          <div class="blockland01">
          <div class="lndimg"><img src="<?=base_url();?>images/comp.png" width="39" height="35"></div>
           <div><h2><i>Blue Print: Polipad’s Parts </i></h2><br /></div> 
           
              <img src="<?=base_url();?>images/mainbody.jpg" alt="Democratizing  Democracy: Blue Print" title="Democratizing  Democracy: Blue Print">
            </div>
            
           
            <div class="lndmiddag"></div>
            
            <div class="blockland01">
            <div class="lndimg"><img src="<?=base_url();?>images/hat.png" width="39" height="35"></div>
           <div><h2><a name="getinvolved"></a><i>Join the movement!</i></h2><br /></div> 
           	
              Polipad will be an open source project. This project thrives on enthusiastic and dedicated volunteers and interns who want to make a difference. The areas where we need most help are the following:<br />
            1.&nbsp; Marketers, Evangelists, Social Media Butterflies, Connectors<br />

            2.&nbsp; Coder (Open Source warriors with focus on Code Igniter, PHP/ MySQL, Web 2.0, CSS3, etc.)<br />

            3.&nbsp; UI Designer (expertise in Photoshop preferred)<br />

            4.&nbsp; Project Managers & Coordinators (Open Source project experience highly desired) 
<div class="blmargin2"></div>
			
            <div class="lndimg"><img src="<?=base_url();?>images/feather.png" width="17" height="39"></div>&nbsp;&nbsp;<strong>Sign up as volunteers!</strong><div class="blmargin2"></div>
<?= form_open_multipart('polipads/involved');?>
<input name="interest" id="interest" type="text" class="input2" placeholder="Areas of interest" />&nbsp;&nbsp;<input name="email" id="email" type="text" class="input6" placeholder="e-mail address" />
<div class="blmargin2"></div>
<input name="" type="submit" class="button3" value="Send me an action item" />
<?=form_close()?>
            </div>
            <div class="blmargin2"></div>
		</div>
    </div>
</div>
<!--------------footer--------------->

<div class="wrap-content" style="background:#B05423;">
<div class="affangrid">
	<div class="row blocklandingfooter" style="background:url(<?=base_url();?>images/footer.jpg)">
        <div class="col-full">
            <div class="blockland03">
          About Us  |  Quick tutorial  |  Why Use Polipad?  |  Github   
           	</div> 
            <div class="blockland03a">
            <img src="<?=base_url();?>images/thanks.png" width="298" height="37">
           	</div> 
		</div>
    </div>
    </div>
</div>
<!--------------footer--------------->
</section>