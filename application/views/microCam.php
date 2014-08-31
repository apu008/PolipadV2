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



<div class="wrap-content" style="height: 100%;  width: 100%;  padding: 0;  margin: 0;  background: black url(<?=base_url();?>images/MCPHeader062814.jpg) center center no-repeat;-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;">

<div class="affangrid">

	<div class="row blocklandingheader1">


        <div class="col-full">

            <div class="blockland0ab">

            	

                <div class="blmargin1"></div>

                <h1>Micro-Campaign Platform</h1></div>

		</div>

    </div>

    </div>

</div>

<!--------------Header--------------->

<div class="wrap-content affangrid">



	<div class="row">

        <div class="col-full">

        

            <div class="blockland01ab">
              Main goal of Micro-Campaign is to  communicate the focus and core message of the campaign clearly within less than  a minute. <br />
                <br />
              Micro-Campaign is divided into a Main  page and several secondary pages below it. Main page contains the core message  of the campaign (diagram below).<br />
              <br />
<div align="center"><img src="<?=base_url();?>images/mc1.png"></div><br />

Main Page: Campaigner must fill out the Main Campaign  page to launch a micro-campaign. Average adult reads somewhere between 1250 to  1500 characters. Main Campaign page of MCP limits the total number of  characters to 1260 so that the core campaign can be read in less than a minute  with reasonable comprehension (70% or more). This page is also divided into 5  sections so that the highlights of the campaign can be expressed in an elegant,  simple way. Diagram below shows the main sections of the MCP and the character  limits imposed on them. <br />
              <br />
              <div align="center"><img src="<?=base_url();?>images/mc2.png"></div><br />
<br />
Once fully developed, the secondary pages will have tools such as:<br />
<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1. Insightful dashboard full of analytics, <br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2. Deep integration with social media sites,<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3. Idea development modules, <br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;4. Fund raising tools,<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;5. Modules for value-based collaboration, <br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;6. Help candidates organize their support networks, and bring global participation into local politics.<br />
<br />
Eventually, Polipad wants to be the leading choice of campaign tool for the fiercely independents, or for that matter, anyone running a campaign.          
          </div>

          

    

            <div class="blmargin2"></div>

		</div>

    </div>

</div>

<!--------------footer--------------->



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