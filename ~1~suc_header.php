<!DOCTYPE HTML>
<html>
<head>
<meta name="viewport" content="width=device-width,inital-scale=1" />
	<title>HOME</title>
    <link rel="stylesheet" href="css/bootstrap.css" />
    <script src="js/jquery-1.11.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
<!--#000D1D bgcolor
    #D8F9FF title text color
    #266FF3 selected text color/hover box color
    #C6FFF7 menu text color
    #C6FFF7 selected menu hover color
-->
</head>
<body>
<div class="container">
<nav class="navbar navbar-inverse menubgcolor">
<div class="container-fluid menu">
<div class="navbar-header">
 <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
          </button>
<a href="#" class="navbar-brand visible-xs">CSE</a>
</div>
<div class="collapse navbar-collapse">


<ul class="nav navbar-nav ">
    <li class="active"><a href="#" style="background: #000D1D;"><font class="menuselect">Home</font></a></li>
    <li class="menutextcolor"><a href="#" ><font class="menutextcolor">Courses</font></a></li>
    
     <li class="dropdown menutextcolor">
        <a class="dropdown-toggle menutextcolor" data-toggle="dropdown" href="#" >
            Faculty
            <span class="caret"></span>          
        </a>
        <ul class="dropdown-menu submenu">
            <li class="submenu "><a href="teacherlogin.php" >Faculty Login</a></li>
            <li class="submenu"><a href="#">Edit Profile</a></li>
            <li class="submenu"><a href="#">Logout</a></li>
            
        </ul>
    </li>
    
    
    <li class="menutextcolor"><a href="#" ><font color="#D8F9FF" >Registration</font></a></li>
    <li class="dropdown menutextcolor">
        <a class="dropdown-toggle menutextcolor" data-toggle="dropdown" href="#">
        Settings
        <span class="caret "></span>        
        </a>
        <ul class="dropdown-menu submenu">
            <li class="submenu"><a href="#">Change Password</a></li>
            <li class="submenu"><a href="#">Edit Profile</a></li>
            <li class="submenu"><a href="#">Logout</a></li>
        </ul>
    </li>
</ul>
</div>
</nav>
</div>
</div>

</body>
</html>