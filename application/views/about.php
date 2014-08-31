<section id="content">



<!--------------Header--------------->



<div class="wrap-content" style="height: 100%;  width: 100%;  padding: 0;  margin: 0;  background: black url(<?=base_url();?>images/AboutUsHeader061414.jpg) center center no-repeat;-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;">

<div class="affangrid">

	<div class="row blocklandingheader1">
   <?php /*?> <div class="col-full">
    <div style="font-size:16px; float:right; padding-top:10px; padding-right:10px;"> <a href="<? echo site_url('polipads/index');?>" style="color:#FFF; text-decoration:none;">Home</a><span style="color:#FFF;">&nbsp;&nbsp;|&nbsp;&nbsp;</span><a href="<? echo site_url('polipads/microCampaign');?>" style="color:#FFF; text-decoration:none;">Micro-Campaign</a><span style="color:#FFF;">&nbsp;&nbsp;|&nbsp;&nbsp;</span><a href="<? echo site_url('polipads/getinvolved');?>" style="color:#FFF; text-decoration:none;">Interns needed</a><span style="color:#FFF;">&nbsp;&nbsp;|&nbsp;&nbsp;</span><a href="<? echo site_url('polipads/about');?>" style="color:#FFF; text-decoration:none;">About us</a><span style="color:#FFF;">&nbsp;&nbsp;|&nbsp;&nbsp;</span><a href="<? echo site_url('campaign/main/'.$cid);?>" style="color:#FFF; text-decoration:none;">Featured Campaign</a><span style="color:#FFF;">&nbsp;&nbsp;|&nbsp;&nbsp;</span>
            <?php if($this->session->userdata('user_id') != ''){ ?>
            
            <?
				$rr = $this->session->userdata('role_id');
				$where = '';
				if($rr == 1)
				{
					$where = 'admin/index';
				}else
				{
					$where = 'candidate/index';
				}
			?>
<a href="<? echo site_url($where);?>" style="color:#FFF;text-decoration:none;">My Page (Dashboard)</a><span style="color:#FFF;">&nbsp;&nbsp;|&nbsp;&nbsp;</span><a href="<? echo site_url('welcome/logout');?>" style="color:#FFF;text-decoration:none;">Logout</a><? }else{ ?><a href="<? echo site_url('welcome');?>" style="color:#FFF; text-decoration:none;">Sign-up or Log-in</a>
            <? } ?>
            
            </div>
    </div><?php */?>

        <div class="col-full">

            <div class="blockland0ab">

            	

                <div class="blmargin1"></div>

                <h1>About Us</h1></div>

		</div>

    </div>

    </div>

</div>

<!--------------Header--------------->

<div class="wrap-content affangrid">



	<div class="row">

        <div class="col-full">

        

            <div class="blockland01ab">Polipad is a project, a platform, and an enabler for aspiring   politicians, honest campaigners, hard working candidates who do not want   to be part of an organized party, and sacrifice their values, or sell   out just because they have decided to run for an office or launch a   campaign.<br />
              <br />
              Polipad is, however, NOT a political party, or philosophy, or new   kind of &quot;ism&quot;. We are tool-makers. Our mission is to simply help any   campaigner reduce his/her reliance on external influences with simple   and easy, but powerful campaign building and analysis tools. We want to   take the administrative headache out of a campaign and help the   candidate focus on the core message.<br />
              <br />
              Should you have any question, please feel free to contact us at <a rel="nofollow" ymailto="mailto:campaign@polipad.net" target="_blank" href="mailto:campaign@polipad.net" class="normallink">campaign@polipad.net</a>. In the mean time, you are invited to create any good, meaningful campaign.  Happy campaigning.<br />
              <br />
              Hailing from Texas.<br />
              Polipad Foundation<br />
              Austin-Missouri City, TX<br />

<br />
<strong id="yui_3_16_0_1_1404187918424_14200">Vision of Polipad:</strong><br />
Traditionally,   it had been very difficult for regular people to run effective campaign   without the help of giant political or financial machines. Every day,   honest, hard working, candidates with good message are discouraged to   run for political office. <br />
<br />
To change this... programmers, designers, political thinkers - the   regular people got together to come up with a simpler, but inexpensive   and effective solution; Polipad was born. Because of Polipad, it will    become easier for regular people to run effective, robust campaign.    More honest and hard-working people will start entering politics and run   campaigns. Until finally, the advantage of big political and financial   machines will be gone, and true democracy will emerge.<br />
            </div>

          

    

            <div class="blmargin2"></div>

		</div>

    </div>

</div>

<!--------------footer--------------->
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


<div class="wrap-content" style="height: 100%;  width: 100%;  padding: 0;  margin: 0;  background: black url(<?=base_url();?>images/V2Footer061314.jpg) center center no-repeat;-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;">

<div class="affangrid">

	<div class="row blocklandingfooter">

        <div class="col-full">

            <div class="blockland03">

                      <a href="<? echo site_url('polipads/index');?>" class="normallinkl">Home</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="<? echo site_url('polipads/microCampaign');?>" class="normallinkl">Micro-Campaign</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="<? echo site_url('polipads/getinvolved');?>" class="normallinkl">Interns needed</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="<? echo site_url('polipads/about');?>" class="normallinkl">About Us</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="<? echo site_url('campaign/main/'.$cid);?>" class="normallinkl">Featured Campaign</a><br />

<br />         

                <span style="font-family: 'Lobster', cursive; color:#77933C;">Campaign for the rest of us.</span>   <br />

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