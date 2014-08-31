<style type="text/css">

.addContent {
	color: #336AAD;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
}
.style5 {color: #CC0000}
</style>
<link rel="stylesheet" type="text/css" href="http://localhost/polipad_ci/css/apu_css.css" />
<?
if(isset($_POST['submitQ']))
	{
		$vquery = $_REQUEST['vquery'];
		$vemail = $_REQUEST['vemail'];
		$to= 'admin@polipad.net';
$mail_subject='Polipad Visitor Query';

$mail_body= $vquery."\r\n\r\n";

$mail_body .= "Submited by:".$vemail."\r\n";


$headers  	= 'MIME-Version: 1.0' . "\r\n";
$headers .= "From: polipad.net <info@polipad.net>\r\n";

$headers .= "Cc: sayabu@gmail.com\r\n";
$headers .= "Bcc: mahmudapu@yahoo.com\r\n"; 

			if(mail($to,$mail_subject,$mail_body,$headers))
			{
			redirect('/learn/error', 'refresh');
			}
			
		
	}
?>
<body>
<table width="800" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
<td colspan="2" align="left">

<table width="800" border="0" align="center" cellpadding="0" cellspacing="0">
 <tr>
    <td colspan="4"><table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
    <td width="233"><a href="http://localhost/polipad_ci/index.php"><img src="http://localhost/polipad_ci/images/plogo.jpg" alt="Polipad" width="206" height="59" border="0"></a></td>
    <td width="497" align="right" valign="middle" class="user_othH">&nbsp;</td>
    <td width="65" align="right" valign="middle" class="user_oth">&nbsp;</td>
     <td width="5">&nbsp;</td>
  </tr>
    </table></td>
  </tr>
  <tr>
    <td width="9" height="31" background="http://localhost/polipad_ci/images/topl.jpg"></td>
    <td width="782" background="http://localhost/polipad_ci/images/topm.jpg"><span class="tp_head">Build your campaign site. FREE.</span></td>
    <td width="9" background="http://localhost/polipad_ci/images/topr.jpg"></td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
</table></td>
</tr>

<tr>
  <td width="60" align="left" valign="top" class="homeTag"><a name="toop"></a><img src="http://localhost/polipad_ci/images/err.jpg" border="0"></td>
  <td width="740" align="left" valign="middle" class="homeTag">We are sorry, we can't find the page you are  looking for! Lets see if we can give you a few other options that may help.</td>
  </tr>

  <td height="20" colspan="2" align="left" valign="top" class="home_text"><p>&nbsp;</p>
    <p>1. You are a  member, and want to <a href="<?=site_url('');?>" class="rfi_name"><u>log in</u></a>.<br>
      2. You want to <a href="<?=site_url('login/register');?>" class="rfi_name"><u>open an account</u></a> &nbsp;to create a candidate page or just leave comments.<br>
      3. You want to  know <a href="<?=site_url('learn/howtoReg');?>" class="rfi_name"><u>how to set up a  candidate page</u></a><br>
      4. <a href="<?=site_url('learn/index');?>" class="rfi_name"><u>Learn more</u></a> about PoliPad features.<br>
      5. Learn <a href="<?=site_url('about/index');?>" class="rfi_name"><u>About Us</u></a>.</p>
   
  
    <p>None of the above?  Sorry we could not help you this time. We will be very happy if you can tell us  how to improve our service or just leave us your comment: </p>

	<form method="POST" name="formSupport" action="" onSubmit="return checkForm(this)">
	  <p>
	    <textarea name="vquery" id="vquery" class="forTextArea"></textarea>
	    </p>
	  <p>OPTIONAL: if you want to get updates about our  website, please write your e-mail below:</p>
	  <p>	    
        <input name="vemail" type="text" id="evanue" class="forTextBoxN">
	    </p>
	  <p><input type="image" src="http://localhost/polipad_ci/images/subm.jpg" value="      " name="submitQ" /></p>
	</form>

      </td>
  </tr><tr>
    <td height="20" colspan="2" align="left" valign="top" class="home_text">&nbsp;</td>
  </tr>
  <tr>
    <td height="20" colspan="2" align="center" valign="top" class="rfi_name">&nbsp;</td>
  </tr>
</table>
