<?php
/*
 * config.php
 * 
 * Main configuration file of the POP Authentication Application.
 * 
 * Set the respective values as per your local requirements.
 *
 * Written by: Nanu Alan Kachari, Department of CSE, IIT Guwahati
 * on 30 June 2017
 * 
 *
 */

//turn on output buffering
ob_start();

//assign a name to this session, avoids collision between the $_SESSION keys
//session_name('iitgauthentication');

//start new or resume existing session
//session_start();

//set your timezone here
//date_default_timezone_set('Asia/Calcutta');

//set your application title here
//define('APPTITLE','POP Authentication System');

require('classes/iitg-appuser-class.php');

//instantiate the $IITGAppUser
$iitgAppUser = new IITGAppUser;
?>
