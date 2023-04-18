<?php

session_start();
if ($_SESSION['loggedin'] == true || isset($_SESSION['loggedin'])) {
    $loggedin = true;
    $disable="";
}
else{
    $loggedin = false;
    $disable="disabled";
}
    

echo ' 
<nav class="navbar navbar-expand-lg navbar-dark bg-dark " style="height: 7vh">
<div class="container-fluid">
    <a class="navbar-brand menu-btn" href="https://f4rmindia.wixsite.com/farm-india">GROCERY WEBSITE </a>
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse container " style="padding-left: 25vw; font-size: 30px;"
        id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item" style="margin-right:25px">
                <a class="nav-link" href="farm_india/index.html">Home</a>
            </li>
            <li class="nav-item" style="margin-right:25px">
                <a class="nav-link" href="farm_india/Aboutus.html">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="farm_india/ContactUs.html">Contact US</a>
            </li>';
            if($loggedin){
            echo '<li class="nav-item">
                <a class="nav-link" href="logout.php">Logout</a>
            </li>';}

            echo '
            </ul>
            <ul class="navbar-nav me-auto mb-2 mr-0 mb-lg-0 ">';
            if(!$loggedin){echo '
            <li class="nav-item" >
                <a class="nav-link ml-auto text-right" style="color:white" href="login.php">Login</a>
            </li>';}
            if(!$loggedin){
            echo '<li class="nav-item" >
                <a class="nav-link ml-auto text-right" style="color:white" href="signup.php">Signup</a>
            </li>';}
            echo'
            </ul>
    </div>
</div>
</nav>
';
