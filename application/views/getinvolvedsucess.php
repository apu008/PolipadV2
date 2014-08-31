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



<div class="wrap-content" style="height: 100%;  width: 100%;  padding: 0;  margin: 0;  background: black url(<?=base_url();?>images/V2Footer061314.jpg) center center no-repeat;-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;">

<div class="affangrid">

	<div class="row blocklandingheader1" >

       
        <div class="col-full">
        

            <div class="blockland0ab">

            	

                <div class="blmargin1"></div>

                <h1>Thank You</h1></div>

		</div>

    </div>

    </div>

</div>

<!--------------Header--------------->

<div class="wrap-content affangrid">



	<div class="row">

        <div class="col-full">

        

            <div class="blockland01ab"  style="line-height:28px;">

            Hello! Thank you for interest to volunteer with Polipad. We are excited and looking forward to working with you. We will contact you within a day or two with a list of assignments that you might be interested to do. In the mean time, would consider <a href="<? echo site_url('welcome/index');?>" class="normallink">signing up for a Polipad account</a>. Thanks again for wanting to make a change in politics.<br />

<br />

Your Polipad Team

           	</div>

          

    

            <div class="blmargin2"></div><br />



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