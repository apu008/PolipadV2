<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
/*

|--------------------------------------------------------------------------

| Search Counter

|--------------------------------------------------------------------------

*/
/*$config['student_row']	= 10;
$config['intern_row']	= 10;
$config['company_row']	= 10;
$config['personnal_row'] = 10;
$config['jobs_row'] = 10;
$config['notice_row'] = 5;*/
/*

|--------------------------------------------------------------------------

| Email Configuration

|--------------------------------------------------------------------------

*/

/*
$config['email_config']['protocol'] = 'smtp';
$config['email_config']['smtp_host'] = 'mail.be-bd.net';
$config['email_config']['smtp_user'] = 'noreply+be-bd.net';
$config['email_config']['smtp_pass'] = 'be-bd.noreply';
*/

/*$config['email_config']['protocol'] = 'sendmail';
$config['email_config']['mailpath'] = '/usr/sbin/sendmail';

$config['email_config']['wordwrap'] = TRUE;
$config['email_config']['mailtype'] = 'html';

$config['email_from'] = 'cso@bracu.ac.bd';
$config['email_from_name'] = 'Admin';*/
/*

|--------------------------------------------------------------------------

| Captcha image life

|--------------------------------------------------------------------------

|

| How long a user can delay to validate the captcha.

| Input in seconds. 300 -> 5 min

|

| 

*/
$config['email_config']['protocol'] = 'sendmail';
$config['email_config']['mailpath'] = '/usr/sbin/sendmail';

$config['email_config']['wordwrap'] = TRUE;
$config['email_config']['mailtype'] = 'html';

$config['email_from'] = 'admin@polipad.net';
$config['email_from_name'] = 'Admin';

$config['captcha_life'] = 300;
/*

|--------------------------------------------------------------------------

| Gallery

|--------------------------------------------------------------------------

*/
$config['campaignImageWidth'] = 228;
$config['campaignImageHeight'] = 228;

$config['mediaImageWidth'] = 600;
$config['mediaImageHeight'] = 600;

?>