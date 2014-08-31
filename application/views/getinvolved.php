<section id="content">
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

					}

			?>


<!--------------Header--------------->



<div class="wrap-content" style="height: 100%;  width: 100%;  padding: 0;  margin: 0;  background: black url(<?=base_url();?>images/GetInvolved061314.jpg) center center no-repeat;-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;">

<div class="affangrid">

	<div class="row blocklandingheader1" >
    
   

        <div class="col-full">

            <div class="blockland0ab">

            	

                <div class="blmargin1"></div>

                <h1>Interns needed</h1></div>

		</div>

    </div>

    </div>

</div>

<!--------------Header--------------->

<div class="wrap-content affangrid">



	<div class="row">

        <div class="col-full">

        

            <div class="blockland01ab"  style="line-height:28px;">

            At Polipad, we are working on a new way to democratize democracy. If you are a student and interested in playing a role in changing the way we campaign, then we invite you to join our team as an intern. Join soon before the first 100 openings are gone.

              <br />
              <br />
              <strong>Benefits you don't want to miss: </strong><br />
              
              1.&nbsp;&nbsp;&nbsp;Since this is micro-campaign platform, you will hone your expertise in<strong> constructing effective and short but powerful messages</strong>.
              <br />
              2.&nbsp;&nbsp;&nbsp;Students will learn to collaboratively <strong>develop ideas that add social value.
              </strong>
              <br />
              3.&nbsp;&nbsp;&nbsp;If you are one of the first 100 interns, you will receive an <strong>honor badge</strong> and an <strong>"Early Adopter & Volunteer Certificate"</strong>. 
              <br />
             
              4.&nbsp;&nbsp;&nbsp;Your <strong>name will be permanently displayed</strong> on the Early Adopters Page
              <br />
              
              5.&nbsp;&nbsp;&nbsp;<strong>VIP treatment</strong>: You will be notified of any upcoming events of features on Polipad before they are even displayed on the website or released to any news media.
              <br />
              
              6.&nbsp;&nbsp;&nbsp;Opportunity to change the world while working from home or dorm room in your pajamas if you so choose. 

              <br />
              <br />
              <strong>Rules of participation:</strong><br />
             
1.&nbsp;&nbsp;&nbsp;Interns will have to create 1 (one) 'meaningful' and 'public' campaign on Polipad. This can be political, non-political (i.e., social, communal, economical, environmental, etc.). [Feel free to innovate in this area]
<br />

2.&nbsp;&nbsp;&nbsp;Contribute 2 ideas on any campaign
<br />

3.&nbsp;&nbsp;&nbsp;Leave 2 feedbacks on any campaign
<br />

4.&nbsp;&nbsp;&nbsp;Support a campaign. If you don't want to support any campaign then you can replace that activity by contributing 1 idea or leaving 1 feedback (in addition to #2 and #3).<br />

5.&nbsp;&nbsp;&nbsp;Fill out a survey form and provide us feedback about the difficulties you faced when building a campaign or doing any other activities, what worked, what did not work, improvement areas.
<div class="blmargin2"></div>

			
<?php /*?>
            <div class="lndimg"><img src="<?=base_url();?>images/feather.png" width="17" height="39"></div>&nbsp;&nbsp;<strong>Sign up as volunteers!</strong><div class="blmargin2"></div>

<?= form_open_multipart('polipads/involved');?>



<select name="interest" class="input2">

  <option value="Coder + Programmers" selected="selected">Coder + Programmers</option>

  <option value="Designer">Designer</option>

  <option value="Marketing">Marketing</option>

  <option value="Open Source Project Manager">Open Source Project Manager</option>

</select>

&nbsp;&nbsp;<input name="email" id="email" type="text" class="input6" placeholder="e-mail address" />

<div class="blmargin2"></div>

<input name="" type="submit" class="button3" value="Count me in!" />

<?=form_close()?>

           	</div>
<?php */?>
          

    

            <div class="blmargin2"></div>


</div>
		</div>

    </div>

</div>

<!--------------footer--------------->



<div class="wrap-content" style="height: 100%;  width: 100%;  padding: 0;  margin: 0;  background: black url(<?=base_url();?>images/V2Footer061314.jpg) center center no-repeat;-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;" >

<div class="affangrid">

	<div class="row blocklandingfooter" >

        <div class="col-full">

            <div class="blockland03">

           <a href="<? echo site_url('polipads/index');?>" class="normallinkl">Home</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="<? echo site_url('polipads/microCampaign');?>" class="normallinkl">Micro-Campaign</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="<? echo site_url('polipads/getinvolved');?>" class="normallinkl">Interns needed</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="<? echo site_url('polipads/about');?>" class="normallinkl">About Us</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="<? echo site_url('campaign/main/'.$cid);?>" class="normallinkl">Featured Campaign</a><br />

<br />         

                <span style="font-family: 'Lobster', cursive; color:#31859C;">Campaign by the people, for the people.</span>   <br />

<br />

campaign@polipad.net<br />

<br />

<img src="<?=base_url();?>images/tub.png" width="34" height="34">

           	</div> 

		</div>

    </div>

    </div>

</div>

<!--------------footer--------------->

</section>