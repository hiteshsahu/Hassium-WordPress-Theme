<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Hassium
 */

get_header(); ?>

  <div class="progress" id = "loading" >
      <div class="indeterminate"></div>
  </div>
  
  <div id="index-banner" class="parallax-container">
    <div class="section no-pad-bot">
      <div class="container">
        <br><br>
        <h1 class="header center teal-text text-lighten-2">Stay Curious</h1>
        <div class="row center">
          <h5 class="header col s12 light">Jack of all trades Master of Android</h5>
        </div>
        <div class="row center">

        <a href="<?php bloginfo('template_url'); ?>/Doc/HiteshSahu_Portfolio_App&Web_Developer.pdf" 
        target = "blank"id="download-button" class="btn-large waves-effect waves-light teal lighten-1"
        style = " text-decoration:none!important;"><i class="material-icons left white-
        text">file_download</i>Download Resume</a>
        </div>
        <br><br>
      </div>
    </div>
    <div class="parallax" >
	<img src = "<?php bloginfo('template_url'); ?>/images/img/cover.gif" 
   
	>
	</img>
	</div>
  </div>
  
  <div class="container"> 
   <h5 class="header col s12 teal-text center"> Hello, <br>I am Hitesh Sahu, I have 4.5+ Years of experience of working in Startups Banking, E-commerce and Multimedia Projects.<br><br>I am expert in Native Android Apps, Hybrid Apps, and Windows Form Application. I have little experience of working in iOS with Swift Language.<br><br>I Can work in Frontend as well as in Backend. I am always Eager to learn and adopt new Tools and Languages. <br><br>Currently, I am focusing primarily on React Native. I Love challenging UI concepts.</h5>
</div>


  <div >
    <div class="section">

      <!--   Skills Section  -->
      <div class="row">
	    
	   <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center brown-text"><i class="fa fa-android" aria-hidden="true"></i></h2>
            <h5 class="center">App Developer</h5>
            <p class="light"> Native Android App, Hybrid Android Apps, Products with custom Android OS, PhoneGap, Apache Cordova Plugins, React Native,  Retrofit, RxJava, Picasso, Glide, Design Patterns, MVP, MVVM, Clean Architecture, REST  Web services with Java and C#, Firebase ,Junit and JMock, Automation Testing</p>
          </div>
        </div>
		
        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center brown-text"><i class="fa fa-desktop" aria-hidden="true"></i></h2>
            <h5 class="center">Web Developer</h5>
            <p class="light">HTML5, JavaScript, CSS3, JQuery, Responsive Web Designing,Bootstrap, Materialize CSS, WordPress Hosting, Website Hosting, KendoUI,Data Visualization, High Chart, D3.JS, claraIO</p>
          </div>
        </div>
		
		 <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center brown-text"><i class="fa fa-windows" aria-hidden="true"></i></h2>
            <h5 class="center">Windows Developer</h5>
            <p class="light">C#, ASP.Net, Visual Basics Form Applications,</p>
          </div>
        </div>
      </div>

    </div>
  </div>
  

   <div >
   
     <h5 class="header col s12 teal-text center"> Projects I have worked on</h5>
   
   <!--   Projects Section   -->
      <div class="row">
	    
	  <div class="col s12 m6 l4 " id= "project_1" style="visibility: hidden;" >
      <div class="card hoverable waves-effect waves-block waves-light equalHightColumn sticky-action" >
        <div class="card-image" >
          <img class="responsive-img project_1_bg" src="http://www.bang-olufsen.com/~/mediaV3/Home/Collection/Collection-sound-systems/beosound-moment-v2/1350/integration-img-1.jpg">
          <span class="card-title project_1_header" >Beo Sound Moment</span>
          <a  href="http://www.bang-olufsen.com/en/collection/sound-systems/beosound-moment" class="btn-floating halfway-fab waves-effect waves-light red btn-large" target="_blank" ><i class="fa fa-angle-right" aria-hidden="true" ></i></a>
        </div>
        <div class="card-content">
          <p>BeoSound Moment is an intelligent, wireless music system that organises your digital music, radio stations and streaming services in a seamless music experience.</p>
		   <br>
		   <div class="chip">Android Products</div>
		   <div class="chip">Deezer</div>
		   <div class="chip">DLNA</div>
		   <div class="chip">AOSP</div>
	       <div class="chip">Grace Notes</div>
        
        </div>
      </div>
    </div>
	
	  <div class="col s12 m6 l4 " id= "project_2" style="visibility: hidden;">
      <div class="card hoverable waves-effect waves-block waves-light equalHightColumn " >
        <div class="card-image">
          <img class="responsive-img project_2_bg"  src="<?php bloginfo('template_url'); ?>/images/img/place_holder_bmusic.jpg">
          <span class="card-title project_2_header" >Beo Music App</span>
          <a class="btn-floating halfway-fab waves-effect waves-light red btn-large"
		  href ="https://play.google.com/store/apps/details?id=com.bang_olufsen.BeoMusic" target="_blank"
		  ><i class="fa fa-angle-right" aria-hidden="true"  ></i></a>
        </div>
        <div class="card-content">
          <p>The BeoMusic App for Apple Watch, iPhone, iPad and Android smartphones, gives you all-in-one access to your music.</p>
		   <br>
		   <div class="chip">Android App</div>
		   <div class="chip">Ksoap</div>
		   <div class="chip">Firmware Update</div>
		   <div class="chip">Java Web Services</div>
		   <div class="chip">JUnit</div>
		   <div class="chip">Selenium</div>
		   <div class="chip">Build-Bot</div>
        
        </div>
		
      </div>
    </div>
	
	 <div class="col s12 m6 l4 " id= "project_3" style="visibility: hidden;">
      <div class="card hoverable waves-effect waves-block waves-light equalHightColumn sticky-action" >
        <div class="card-image">
          <img class="responsive-img project_3_bg" 
src="<?php bloginfo('template_url'); ?>/images/img/place_holder_vipps.jpg">
          <span class="card-title project_3_header" >Vipps</span>
          <a class="btn-floating halfway-fab waves-effect waves-light red btn-large" 
		    href="https://play.google.com/store/apps/details?id=no.dnb.vipps" target="_blank"
		  ><i class="fa fa-angle-right" aria-hidden="true"></i></a>
        </div>
        <div class="card-content">
          <p>Vipps is a Norwegian mobile payment application designed for smartphones developed by DNB.</p>
		   <br>
		   <div class="chip">Android App</div>
		   <div class="chip">Material design</div>
		   <div class="chip">GCM</div>
		   <div class="chip"> Java Web Services</div>
		   <div class="chip">Retrofit</div><div class="chip">MVVM</div>
        
        </div>
		

      </div>
    </div>
	
	 <div class="col s12 m6 l4  " id= "project_4" style="visibility: hidden;">
      <div class="card hoverable waves-effect waves-block waves-light equalHightColumn sticky-action">
        <div class="card-image">
          <img class="responsive-img project_4_bg"  src="<?php bloginfo('template_url'); ?>/images/img/place_holder_banco.jpg">
          <span class="card-title project_4_header" >Mi Banco db</span>
          <a class="btn-floating halfway-fab waves-effect waves-light red btn-large"
		    href="https://play.google.com/store/apps/details?id=com.db.pbc.mibanco&hl=en" target="_blank">
			<i class="fa fa-angle-right" aria-hidden="true"></i></a>
        </div>
        <div class="card-content">
          <p>Mi Banco db is the Mobile Banking App for Deutsche Bank Spain customers developed by Deutsche Bank.</p>
 <br>
		     <div class="chip">Hybrid  Apps</div>
			 <div class="chip">Apache Cordova</div>
			 <div class="chip">Samusng sPass SDK</div>
		     <div class="chip">EUData Chat Engine</div>
			 <div class="chip">Google Map</div>
             <div class="chip">KnockOut JS</div>
		     <div class="chip">Angular JS</div>
        </div>
      </div>
     </div>
	
	
	 <div class="col s12 m6 l4 " id= "project_5" style="visibility: hidden;">
      <div class="card hoverable waves-effect waves-block waves-light equalHightColumn sticky-action">
        <div class="card-image">
          <img class="responsive-img project_4_bg" src="<?php bloginfo('template_url'); ?>/images/img/place_holder_banca.jpg">
          <span class="card-title project_4_header">La Mia Banca</span>
          <a class="btn-floating halfway-fab waves-effect waves-light red btn-large"
		    href="https://play.google.com/store/apps/details?id=com.db.pbc.miabanca&amp;hl=en" target="_blank"
		  ><i class="fa fa-angle-right" aria-hidden="true"></i></a>
        </div>
        <div class="card-content">
          <p>La Mia Banca is the official mobile app of Deutsche Bank Italy for clients and db contocarta holders to allow access and transactions via smartphones and tablets.</p>
		   <br>
		   <div class="chip">Hybrid  Apps</div>
		   <div class="chip">Apache Cordova</div> 
		   <div class="chip">Phone Gap Plugins</div>
		   <div class="chip">Samusng sPass SDK</div>
		   <div class="chip">Android Wear</div>
		   <div class="chip">Vasco Data Security</div> 
        </div>
      </div>
    </div>
	
	 <div class="col s12 m6 l4 " id= "project_6" style="visibility: hidden;">
      <div class="card hoverable waves-effect waves-block waves-light equalHightColumn sticky-action">
        <div class="card-image">
          <img class="responsive-img project_5_bg"  src="<?php bloginfo('template_url'); ?>/images/img/place_holder_ngo.jpg">
          <span class="card-title project_5_header"  >Go Dham Pathmeda</span>
          <a class="btn-floating halfway-fab waves-effect waves-light red btn-large"
		   href="https://play.google.com/store/apps/details?id=com.serveroverload.godham&amp;hl=en" target="_blank"><i class="fa fa-angle-right" aria-hidden="true">
		  </i></a>
        </div>
        <div class="card-content">
          <p>Official app of Godham Mahatirth,
which is one of the largest Cow Rearing and Development center in
India and across Globe.</p>
		  <br>
		   <div class="chip">Android  Apps</div>
		   <div class="chip">PayUMoney</div>
		   <div class="chip">Picasso</div>
		   <div class="chip">Youtube API</div>
		   <div class="chip">Google Maps</div>
        
        </div>
	
      </div>
    </div>
	
	
	 <div class="col s12 m6 l4 " id= "project_7" style="visibility: hidden;">
      <div class="card hoverable waves-effect waves-block waves-light equalHightColumn sticky-action">
        <div class="card-image">
          <img class="responsive-img project_6_bg"  src="http://www.achrnews.com/ext/resources/2015/03-2015/03-30-2015/S-ServicTechUsingiPad2R.jpg">
          <span class="card-title project_6_header"  >Core Sense Technology</span>
          <a class="btn-floating halfway-fab waves-effect waves-light red btn-large"
		   href="http://www.emersonclimate.com/en-us/Resources/FAQ/Pages/CoreSense_Technology_for_Refrigeration.aspx" target="_blank"><i class="fa fa-angle-right" aria-hidden="true">
		  </i></a>
        </div>
        <div class="card-content">
          <p>
      CoreSense is an embeded software which gather information that will help the air conditioning or refrigeration run at an optimal condition. </p>
		  <br>
		    <div class="chip">Embeded Softwares</div>
		   <div class="chip">ASP.Net</div>
		    <div class="chip">C#</div>
		   <div class="chip">Materialize CSS</div>
		   <div class="chip">Responsive UI</div>
		   <div class="chip">BootStrap</div>
		   <div class="chip">JQuery</div>
		   <div class="chip">Kendo UI</div>
        
        </div>
	
      </div>
    </div>
	
	
	 <div class="col s12 m6 l4 " id= "project_8" style="visibility: hidden;">
      <div class="card hoverable waves-effect waves-block waves-light equalHightColumn sticky-action">
        <div class="card-image">
          <img class="responsive-img project_7_bg" src="<?php bloginfo('template_url'); ?>/images/img/place_holder_cop.jpg">
          <span class="card-title project_7_header"  style =" width :100% ;background: linear-gradient(to bottom,  rgba(0, 0, 0, 0),#408C54)">Copeland Mobile</span>
          <a class="btn-floating halfway-fab waves-effect waves-light red btn-large"
		   href="https://play.google.com/store/apps/details?id=com.emersonclimate.copelandmobile" target="_blank"><i class="fa fa-angle-right" aria-hidden="true">
		  </i></a>
        </div>
        <div class="card-content">
          <p>
      The Copeland Mobile app provides access to Product Information database for Emerson's Copeland compressor specifications used in air conditioning and refrigeration products</p>
		  <br>
		    <div class="chip">Hybrid app</div>
		   <div class="chip">Materialize CSS</div>
		   <div class="chip">Responsive UI</div>
		   <div class="chip">BootStrap</div>
		   <div class="chip">JQuery</div>
		   <div class="chip">Kendo UI</div>
        
        </div>
	
      </div>
    </div>
	
	    </div>
	 </div>
	 </div>
	  <h5 class="header col s12 teal-text center">Open Source Contribution</h5>
	 
	<div class="showcase-wrap showcase" style = "background-image: url(<?php bloginfo('template_url'); ?>/images/img/showcase-bg-fixed-01.jpg)">
	
		<div class="texture-overlay" style = "background-image: url(<?php bloginfo('template_url'); ?>/images/img/grid.png)">
			<div id= "projects" style="visibility: hidden;">		
			   <div class="device" style = "background-image: url(<?php bloginfo('template_url'); ?>/images/img/iphone-skeleton.png)">
			      <div class="device-content">
								
<div class="carousel showcase-slider carousel-slider" data-indicators="true">
   
    <a  target="_blank" class="carousel-item "  href="https://github.com/hiteshsahu/Material-Music-Player-Dashboard">
	<img src="<?php bloginfo('template_url'); ?>/images/img/github/dash_board.jpg" alt="Device Content Image"></a>
    <a  target="_blank" class="carousel-item " href="https://github.com/hiteshsahu/ECommerce-App-Android">
	<img src="<?php bloginfo('template_url'); ?>/images/img/github/e_commerce.png" alt="Device Content Image"></a>
    <a  target="_blank" class="carousel-item " href="https://github.com/hiteshsahu/Android-Radio">
<img src="<?php bloginfo('template_url'); ?>/images/img/github/radio.png" alt="Device Content Image"></a>
	<a  target="_blank" class="carousel-item " href="https://github.com/hiteshsahu/Material-UpVote">	
	<img src="<?php bloginfo('template_url'); ?>/images/img/github/concept_upvote.gif" alt="Device Content Image"></a>
	<a  target="_blank" class="carousel-item " href="https://github.com/hiteshsahu/Magic-Keyboard">
	<img src="<?php bloginfo('template_url'); ?>/images/img/github/keys.png" alt="Device Content Image"></a>
    <a  target="_blank" class="carousel-item " href="https://github.com/hiteshsahu/Android-Audio-Recorder-Visualization-Master">
	<img src="<?php bloginfo('template_url'); ?>/images/img/github/recorder_screen.png" alt="Device Content Image"></a> 
	<a   target="_blank" class="carousel-item " href="https://github.com/hiteshsahu/Android-Universal-Web-Content-Loader">
	<img src="<?php bloginfo('template_url'); ?>/images/img/github/studio_youtube.png" alt="Device Content Image"></a>
  </div>
					
			            </div>
			          </div>
			        </div>
			     </div>
			</div>
	
	
	

<div class="num"></div>
	
	
	     <div class ="container " style=" margin-top: 50px auto">	
			<div class ="card-panel hoverable" id="container"style=" height: 400px;">
            </div>			
         </div>		
	
	
          
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>