<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="shortcut icon" href="<?php
echo base_url(); ?>favicon.ico"> 
<title>E-Puskesmas</title>
<link rel="stylesheet" href="<?php
echo base_url(); ?>assets/css/style.default.css" type="text/css" />
<style>
html {
background-image:url("<?php
echo base_url(); ?>assets/img/bg.jpg");
background-size:100% auto;
}
</style>
<script type="text/javascript" src="<?php
echo base_url(); ?>assets/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="<?php
echo base_url(); ?>assets/js/jquery-migrate-1.1.1.min.js"></script>
<script type="text/javascript" src="<?php
echo base_url(); ?>assets/js/jquery.jgrowl.js"></script>
</head>

<body class="loginbody">

<?php

if ($this->session->flashdata('flash_message') != ""): ?>
  <script>
  jQuery.jGrowl("<?php
echo $this->session->flashdata('flash_message'); ?>");
</script>
<?php
endif; ?>

<div class="loginwrapper">
<div class="loginwrap zindex100 animate2 bounceInDown">
<h1 class="logintitle"><span class="iconfa-lock"></span> E-Puskesmas <span class="subtitle">Selamat datang di E-Puskesmas!</span></h1>
        <div class="loginwrapperinner">
         <?php
echo form_open('login', array(
'id' => 'loginform'
)); ?>
            <!-- <form id="loginform" action="dashboard.html" method="post"> -->
                <p class="animate4 bounceIn"><input type="text" id="email" name="email" placeholder="Email" autocomplete="off" /></p>
                <p class="animate5 bounceIn"><input type="password" id="password" name="password" placeholder="Password" /></p>
                <p class="animate6 bounceIn"><button class="btn btn-default btn-block">Submit</button></p>
                <p class="animate7 fadeIn"><a href=""><span class="icon-question-sign icon-white"></span> Lupa Passw ?</a></p>
            <!-- </form> -->
            <?php
echo form_close(); ?>
        </div><!--loginwrapperinner-->
    </div>
    <!-- <div class="loginshadow animate3 fadeInUp"></div> !-->
</div><!--loginwrapper-->

<script type="text/javascript">
jQuery.noConflict();

jQuery(document).ready(function(){

var anievent = (jQuery.browser.webkit)? 'webkitAnimationEnd' : 'animationend';
jQuery('.loginwrap').bind(anievent,function(){
jQuery(this).removeClass('animate2 bounceInDown');
});

jQuery('#email,#password').focus(function(){
if(jQuery(this).hasClass('error')) jQuery(this).removeClass('error');
});

jQuery('#loginform button').click(function(){
if(!jQuery.browser.msie) {
if(jQuery('#email').val() == '' || jQuery('#password').val() == '') {
if(jQuery('#email').val() == '') jQuery('#email').addClass('error'); else jQuery('#email').removeClass('error');
if(jQuery('#password').val() == '') jQuery('#password').addClass('error'); else jQuery('#password').removeClass('error');
jQuery('.loginwrap').addClass('animate0 wobble').bind(anievent,function(){
jQuery(this).removeClass('animate0 wobble');
});
} else {
jQuery('.loginwrapper').addClass('animate0 fadeOutUp').bind(anievent,function(){
jQuery('#loginform').submit();
});
}
return false;
}
});
});
</script>
</body>
</html>