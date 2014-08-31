<section id="content">


<div class="wrap-content affangrid">

		<div class="row block">

        <div class="col-full">

				<div class="block01">
                <br />
				<br />
				<a href="<? echo site_url('candidate/index');?>" class="normallink">Back to My Page</a>
                <br />
				<br />
                 <div class="block-padding">
                            <h1>Change Account Information:</h1><br />

                       
                        </div>

                    </div>
				</div>

			</div>

            </div>
</div>
<div class="wrap-content affangrid">

		<div class="row block">

        <div class="col-full">

				<div class="block01" style="line-height:33px;">


				  <div style="width:300px; float:left;">
					Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$name?>
                    <br />
                    Email:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$email?>
                     <br />
                    Password:&nbsp;&nbsp;&nbsp;<? for($i=0; $i<strlen($password1); $i++){ echo '*';}?>
                    </div>

                        <div style="width:200px; float:left;">

                        	<a href="<? echo site_url('registration/updateaccountName');?>" class="button02" style="width:90px;">Edit Name</a><br />
							<a href="<? echo site_url('registration/updateaccountEmail');?>" class="button02" style="width:90px;">Edit Email</a><br />
							<a href="<? echo site_url('registration/updateaccountPassword');?>" class="button02" style="width:90px;">Edit Password</a>
                        </div>

                        <div style="width:100px; float:left;">
                       

                        </div>

					

				</div>

			</div>

            </div>

</div>

</section>