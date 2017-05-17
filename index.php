<!DOCTYPE HTML>
<html>
<head>
<meta name="viewport" content="width=device-width,inital-scale=1" />
	<title>HOME</title>
    <link rel="stylesheet" href="css/bootstrap.css" />
    <script src="js/jquery-1.11.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link href="themes/3/js-image-slider.css" rel="stylesheet" type="text/css" />
    <script src="themes/3/js-image-slider.js" type="text/javascript"></script>
    <link href="css/generic.css" rel="stylesheet" type="text/css" />
<!--#000D1D bgcolor
    #D8F9FF title text color
    #266FF3 selected text color/hover box color
    #C6FFF7 menu text color
    #C6FFF7 selected menu hover color
-->
<style>
.navbar-nav > li > a {
  
  line-height: 20px;
}
.header{
    z-index:9999;
}

</style>
</head>
<body>
<?php include('mainheader.php');?>
<br /><br /><br /><br /><br /><br /><br /><br /><br />
<?php include('menubar.php'); ?>
<div class="container">
 <div class="row">
   <div class="col-md-2">
   <div class="info" style="font-size:17px; "><br /><br /><br />
    <a href="#" class="infomember"><div class="col-md-12 infolayout">About</div></a>
    <a href="#" class="infomember"><div class="col-md-12 infolayout">Director's Message</div></a>
    <a href="#" class="infomember"><div class="col-md-12 infolayout">Faculty &amp; Staff</div></a>
    <a href="#" class="infomember"><div class="col-md-12 infolayout">Vision &amp; Mission</div></a>
    <a href="#" class="infomember"><div class="col-md-12 infolayout">Infrastructure</div></a>
    <a href="#" class="infomember"><div class="col-md-12 infolayout">APEC</div></a>
    <a href="#" class="infomember"><div class="col-md-12 infolayout">Anti Ragging Cell</div></a>
    <a href="#" class="infomember"><div class="col-md-12 infolayout">Academic Calendar</div></a>
    <a href="#" class="infomember"><div class="col-md-12 infolayout">Student Activities</div></a>
    </div>
   </div>
   
   <div class="col-md-9" style="padding-left: 50px;">
    <div class="row">
      <div class="col-md-10">
        <div class="jumbotron " style="margin: 1px; padding:0px;" >
          <div id="sliderFrame">
                <div id="slider" >
                    <a href=""><img src="images/slider-1.jpg" alt="" /></a>
                    <a class="lazyImage" href="images/slider-2.jpg" title="">mandeep</a>
                    <a href="">
                        <b data-src="images/slider-3.jpg" data-alt="">Image Slider</b>
                    </a>
                    <a class="lazyImage" href="images/slider-4.jpg" title="">slide 4</a>
                </div>
                <!--thumbnails-->
                <div id="thumbs" >
                    <div class="thumb" style="background-color: #000D1D;"><img src="images/thumb-1.gif" /></div>
                    <div class="thumb" style="background-color: #000D1D;"><img src="images/thumb-2.gif" /></div>
                    <div class="thumb" style="background-color: #000D1D;"><img src="images/thumb-3.gif" /></div>
                    <div class="thumb" style="background-color: #000D1D;"><img src="images/thumb-4.gif" /></div>
                </div>
          </div>
          
        </div>
      </div>
      <div class="col-md-2">
         <div class="info" style="font-size:17px; ">
            <a href="#" class="infomember"><div class="col-md-12 infolayout">About</div></a>
            <a href="#" class="infomember"><div class="col-md-12 infolayout">Director's Message</div></a>
            <a href="#" class="infomember"><div class="col-md-12 infolayout">Faculty &amp; Staff</div></a>
            <a href="#" class="infomember"><div class="col-md-12 infolayout">Vision &amp; Mission</div></a>
            <a href="#" class="infomember"><div class="col-md-12 infolayout">Infrastructure</div></a>
            <a href="#" class="infomember"><div class="col-md-12 infolayout">APEC</div></a>
            <a href="#" class="infomember"><div class="col-md-12 infolayout">Anti Ragging Cell</div></a>
            <a href="#" class="infomember"><div class="col-md-12 infolayout">Academic Calendar</div></a>
            <a href="#" class="infomember"><div class="col-md-12 infolayout">Student Activities</div></a>
         </div>
      </div>
    </div> <!-- row end--->
    
    
   </div>
  </div>
</div>

</body>
</html>


