<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Hasssium
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Web mainfest -->
<link rel="manifest" href="/manifest.json">

<!--AdSense-->
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-2816776160513306",
    enable_page_level_ads: true
  });
</script>

<!--Anaytics-->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-79238674-1', 'auto');
  ga('send', 'pageview');

</script>

<!--Site varification Tag-->
<meta name="google-site-verification" content="vfX3CyQCUBBJcqhdRW-flQ9dW7YNUCWN_a2Hpj3yPpM" />

  <!--Force IE Edge-->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="description" content="Responsive Portfolio Site Designed and Developed by Hitesh Sahu" />
  <meta name="keywords" content="html5, css3, Online-Portfolio, Material Design,  Materialize CSS , Hitesh Sahu, HiteshSahu" />
  <meta name="author" content="Hitesh Sahu" />

   <!-- Chrome, Firefox OS and Opera theme color-->
  <meta name="theme-color" content="#00695c ">

  <!--Change the status bar appearance in iOS devices-->
  <meta name="apple-mobile-web-app-status-bar-style" content="black">

  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no""/>

  <title>HiteshSahu|Home</title>

  <!-- icon in the highest resolution, Chrome and Opera uses icon.png, which is scaled to the necessary size by the device. -->
  <link rel="icon" sizes="192x192" href="<?php bloginfo('template_url'); ?>/images/img/h_192.png">

  <!-- reuse same icon for Safari and add more supported size for other iOS devices-->
  <link rel="apple-touch-icon" href="<?php bloginfo('template_url'); ?>/images/img/_192.png">
  <link rel="apple-touch-icon" sizes="76x76" href="img/h_70.png">
  <link rel="apple-touch-icon" sizes="120x120" href="<?php bloginfo('template_url'); ?>/images/img/h_96.png">
  <link rel="apple-touch-icon" sizes="152x152" href="<?php bloginfo('template_url'); ?>/images/img/h_144.png">

  <!-- multiple icons for IE -->
  <meta name="msapplication-square70x70logo" content="<?php bloginfo('template_url'); ?>/images/img/h_70.png">
  <meta name="msapplication-square150x150logo" content="<?php bloginfo('template_url'); ?>/images/img/h_144.png">
  <meta name="msapplication-wide310x150logo" content="<?php bloginfo('template_url'); ?>/images/img/h_192.png">

  <!-- i -->
  <link rel="apple-touch-startup-image" href="<?php bloginfo('template_url'); ?>/images/img/h_192.png">


  <!-- Font Awesome CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

<?php wp_head(); ?>


</head>

<body <?php body_class(); ?> style = {background : "#F5F5F5"}>


<div class="navbar-fixed">
  <nav class="teal white-text" role="navigation">
    <div class="nav-wrapper container">
      <a id="logo-container" href="<?php echo get_home_url(); ?>"
	  class="brand-logo white-text hover-item"
	  style = " text-decoration:none!important;">Hitesh Sahu</a>
      <ul class="right hide-on-med-and-down">

	    <li >
		<button class="teal mdl-button mdl-js-ripple-effect"
		style ="height:63px !important;
		display: inline-flex;
        align-items: center;  "
		onclick="location.href='<?php echo get_home_url(); ?>';">
		<i class="material-icons white-text">info</i> &nbsp;Portfolio
		</button></li>

		 <li >
		<button class="teal mdl-button mdl-js-ripple-effect"
		style ="height:63px !important;
	 	display: inline-flex;
                align-items: center;  "
		onclick="location.href='<?php echo get_home_url(); ?>/blog';">
		<i class="material-icons white-text">code</i> &nbsp;Tech Blog
		</button></li>

		 <li >
		<button class="teal mdl-button mdl-js-ripple-effect"
		style ="height:63px !important;
		display: inline-flex;
        align-items: center;  "
		onclick="location.href='https://rainandsea.wordpress.com/';">
		<i class="material-icons white-text">explore</i> &nbsp; Travel Blog
		</button></li>

	    <li >
		<button class="teal mdl-button mdl-js-ripple-effect"
		style ="height:63px !important;
		display: inline-flex;
        align-items: center;  "
		onclick="location.href='http://hiteshsahu.deviantart.com/';">
		<i class="material-icons white-text">palette</i> &nbsp; Art
		</button></li>
	 </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse white-text" style = " text-decoration:none!important;"><i class="material-icons">menu</i></a>
    </div>
  </nav>
 </div>

   <ul id="nav-mobile" class="side-nav">

	    <li><div class="userView" style = "height : 200px !important" >
      <div class="background" style = "height : 200px !important">
        <img


	 <?php if (date("H") < "12" && date("H")>"6") { ?>
       src="<?php bloginfo('template_url'); ?>/images/img/morning.gif"
     <?php } elseif (date("H") > "12" && date("H")<"17") { ?>
     src="<?php bloginfo('template_url'); ?>/images/img/noon.gif"
	  <?php } elseif (date("H") > "17" && date("H")<"21") { ?>
       src="<?php bloginfo('template_url'); ?>/images/img/evening.gif"
	  <?php } elseif (date("H") > "21" && date("H")<"24") { ?>
      src="<?php bloginfo('template_url'); ?>/images/img/night.gif"
	  <?php }else { ?>
      src="<?php bloginfo('template_url'); ?>/images/img/mid_night.gif"
      <?php } ?>

		style = "height : 250px !important" id ="nav_header" >
        </div>
       <a href="#!user" style = "margin-top :100px !important" ><img

	   style = "margin-top :35px !important" class="circle"
     src="<?php bloginfo('template_url'); ?>/images/img/hiteshsahu.jpg"></a>
       <a href="#!name"><span class="name teal-text">Hitesh Sahu</span></a>
       <a href="mailto:hiteshkumarsahu1990@gmail.com?Subject=Hello%20again"><span class="teal-text email">hiteshkumarsahu1990@gmail.com</span></a>
      </div></li>

        <li class="active"><a href="<?php echo get_home_url(); ?>"
		class ="teal-text"
                 style = " text-decoration:none!important;"
                 ><i class="material-icons left teal-text"
                 >info</i>Portfolio</a>
		 </li>

		 <li><a href="<?php echo get_home_url(); ?>/blog"
		 class ="teal-text" style = " text-decoration:none!important;">
		 <i class="material-icons left teal-text">code</i>Tech Blog</a>
		 </li>

		 <li><a href="https://rainandsea.wordpress.com/"
		 class ="teal-text" target="_blank"
                 style = " text-decoration:none!important;">
		 <i class="material-icons left teal-text">explore</i>Travel Blog</a>
		 </li>

		 <li><a href="http://hiteshsahu.deviantart.com/"
		 class ="teal-text" target="_blank" style = " text-decoration:none!important;"><i class="material-icons left teal-text"
		>palette</i>Art</a></li>
      </ul>


	<div id="content" class="site-content mdl-layout__content mdl-grid" style="margin-top :0px ; padding:top :0px">
