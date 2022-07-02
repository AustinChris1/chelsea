
    <title>The 5th Stand</title>
  </head>
  <body>
    <div class="loginbar" id="sidebar">

      <i class="fa fa-times" id="close"></i>
      <header> 
        <img src="/chelsea/5thstand.webp" alt=""> <br>
        <b>Log In</b>
      </header>
 <p>Don't have an account yet?<button class="navB" id="join" type="submit">Join us</button></p> <br>
  <p>Logging in with social is easy and means no extra password to remember.</p>
  <button type="submit" onclick="window.location.href='<?= $loginfb_url; ?>'" class="lbutton"><i class="fa fa-facebook"> Log in with facebook</i></button>
 <button type="submit" onclick="window.location.href='<?= $lclient->createAuthUrl();?>'" class="lbutton"><i class="fa fa-google"> Log in with Google</i></button>
 <button type="submit" class="lbutton"><i class="fa fa-apple"> Log in with Apple</i></button> <br>
 <p class="or">OR</p>
 <h2>Log In With Email</h2>
 <form action="logincode.php" method="post">
   <div class="field">
   <input type="email" name="email" id="" required>
   <span></span>
     <label>Email</label>
 </div>
   <div class="field">
   <input type="password" name="password" id="" required>
   <span></span>
    <label>Password</label>
 </div> 
  <button class="navB">Forgot Password</button>
   <button type="submit" name="login" class="loginBtn">Log In</button>

   <span class="hlog"><input type="checkbox" name="" id=""> Keep me logged in
</span>
 </form>

    </div>
    
    <div class="loginbar" id="regbar">

      <i class="fa fa-times" id="remove"></i>
      <header> 
        <img src="5thstand.webp" alt=""> <br>
        <b>Create An Account</b>
              </header>
<p>Already with us?<button class="navB" type="submit">Log In</button></p>
<p>Join now for free and be part of Chelsea’s global fan community.
   You'll be able to explore Chelsea's Official Supporters Club network and unlock new features on the 5th Stand – the official Chelsea app.</p>
   <h2>Sign Up With Social</h2>
   <p>Joining us with social is easy and means no extra password to remember.</p>
   <button type="submit" onclick="window.location.href='<?= $login_url; ?>'" class="lbutton"><i class="fa fa-facebook"> Sign Up with facebook</i></button>
        <button type="submit" onclick="window.location.href='<?= $client->createAuthUrl();?>'" class="lbutton"><i class="fa fa-google"> Sign Up with Google</i></button>
        <button type="submit" class="lbutton"><i class="fa fa-apple"> Sign Up with Apple</i></button> <br>
        <p class="or">OR</p>
        <h2>Sign Up With Email</h2>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <form action="registercode.php" method="post">
          <div class="field">
            <input type="text" name="fname" id="" required>
            <span></span>
              <label>First Name*</label>
          </div>
            <div class="field">
            <input type="text" name="lname" id="" required>
            <span></span>
             <label>Last Name*</label>
          </div> 
          <div class="field">
          <input type="email" name="email" id="" required>
          <span></span>
            <label>Email*</label>
        </div>
        <div class="field">
          <input type="password" name="password" id="" required>
          <span></span>
           <label>Password*</label>
        </div> 
        <div class="field">
          <input type="password" name="confirm_password" id="" required>
          <span></span>
           <label>Confirm Password*</label>
        </div> 
        <div class="fieldh" style="display: flex; flex-direction: row; ">
        <div class="field" style="width: 40%; margin-right: 5rem;">
          <input type="password" name="confirm_password" id="" required>
          <span></span>
           <label>Country*</label>
        </div> 
        <!-- <div class="field" style="width: 40%;">
          <input type="date" name="date" id="" required>
          <span></span>
           <label>Date of birth*</label>
        </div>  -->
        <div class="field" style="width: 40%;">
          <input type="text" name="date" onfocus="(this.type='date')" onblur="if(!this.value) this.type='text'" required>
          <span></span>
           <label>Date of birth*</label>
        </div> 
       </div>
        <span class="hlog"><input type="checkbox" name="" id="">Keep me posted! Yes, please send me news and promotional information from Chelsea FC and its official sponsors and partners  via email
        </span>
        <span class="hlog"><input type="checkbox" name="" id="">By clicking this button, you agree to Chelsea FC Terms & Conditions
    

        </span>
                  <button type="submit" name="login" class="loginBtn">Sign Up</button>
  </form>
       

  <!-- ###### the div that that starts the menu bar for mobile view navigation  -->
    </div>

    <div class="sidebar" id="menubar">

      <i class="fa fa-times" id="menuclose"></i>
      <header> 
        <img src="/chelsea/5thstand.webp" alt="">
      </header>

      <form>
        <input type="search" name="" id="find" placeholder="Search"><i class="fa fa-search"></i>
      </form>

      <ul>
        <li><a href="#"><span>news</span> <i class="fa fa-angle-right"></i></a></li>
        <li><a href="#"><span>videos</span> <i class="fa fa-angle-right"></i></a></li>
        <li><a href="#"><span>matches</span> <i class="fa fa-angle-right"></i></a></li>
        <li><a href="#">teams<i class="fa fa-angle-right"></i></a></li>
        <li><a href="#">tickets and memberships<i class="fa fa-angle-right"></i></a></li>
        <li><a href="#">club chelsea<i class="fa fa-angle-right"></i></a></li>
        <li><a href="#">shop<i class="fa fa-angle-right"></i></a></li>
        <li><a href="#">about chelsea<i class="fa fa-angle-right"></i></a></li>
        <li><a href="#">stanford bridge<i class="fa fa-angle-right"></i></a></li>
        <li><a href="#">fans<i class="fa fa-angle-right"></i></a></li>
        
      </ul>

      <!-- independently style the rest of the navigation from here -->
    </div>

    <!-- first section  -->


    <section id="firstSection">
      <div class="blue">

        <img src="/chelsea/5thstand.webp" alt="">

        <a href="" class="shift">about chelsea</a>
        <a href="" class="stamford">stamford bridge</a>
        <a href="" class="fans">fans</a>
        <a href=""> foundation</a>
        <a href="">say no to antisemetism</a>
        <a href="../../new-players">Player Recruitment<i class="fa fa-external-link"></i></a>
        <a href="">junior blues <i class="fa fa-external-link"></i></a>
        <a href="" id="trivago"><i class="fa fa-check"></i> trivago</a>

      </div>

      <!-- the first nav white that has a display of hidden  -->
      <div class="navwhite2">
        <span>
          <a href="aboutTheClub">About the club</a>
          <a href="AboutChelseaFcWomen"> About chelsea fc women</a>
          <a href="AboutTheAcademy">about the academy</a>
        </span>
        <span>
          <a href="History">History</a>
          <a href="ClubPartners">Club partners</a>
          <a href="Careers">Careers</a>
        </span>
        <span>
          <a href="Contact">contact us</a>
          <a href="faqs">FAQS</a>
          <a href="notice">Important legal notice</a>
        </span>
        <span>
          <a href="Safe">Safe Guarding</a>
        </span>
      </div>
      
      <!-- div of nav white3 -->
      <div class="navwhite3">
        <span>
          <a href="aboutTheClub">stadium tours & museum</a>
          <a href="AboutChelseaFcWomen"> stadium megastore</a>
          <a href="AboutTheAcademy">getting to stamford bridge</a>
        </span>
        <span>
          <a href="History">special events</a>
          <a href="ClubPartners">frankies<i class="fa fa-external-link"></i></a>
          <a href="Careers">under the bridge<i class="fa fa-external-link"></i></a>
        </span>
        <span>
          <a href="Careers">hotels<i class="fa fa-external-link"></i></a>
          <a href="Careers">health clubs<i class="fa fa-external-link"></i></a>
          <a href="Careers">meetings and events<i class="fa fa-external-link"></i></a>
        </span>
        <span>
          <a href="Safe">lost property</a>
          <a href="Safe">quiet area/ prayer room</a>
        </span>
      </div>

      <!-- navwhite 4  -->
      <div class="navwhite4">
        <span>
          <a href="aboutTheClub">fan club</a>
          <a href="AboutChelseaFcWomen"> official supporters clubs</a>
          <a href="AboutTheAcademy">fans' forum</a>
        </span>
        <span>
          <a href="History">accessible fans' forum</a>
          <a href="ClubPartners">chelsea pitch owners</a>
          <a href="Careers">the shed<i class="fa fa-external-link"></i></a>
        </span>
      </div>

      <!-- the main/ firts navWHITE  -->
      <div class="navwhite">
        <a href="index"  class="shift2">news</a>
        <a href="" class="videos">videos</a>
        <a href="" class="matches">matches</a>
        <a href="" class="teams">teams</a>
        <a href="" class="tickets">tickets & memberships</a>
        <a href="" class="club">club chelsea</a>
        <a href="" class="shop">shop<i class="fa fa-external-link"></i></a>
    
          <span class="topBtns">
            <button type="submit" id="menu"><i class="fa fa-search"></i></button>
            <?php if (isset($_SESSION["auth_user"])):
             $fullname = $_SESSION["auth_user"]["fname"].' '. $_SESSION["auth_user"]["lname"] ?> 
                     <button type="submit" onclick="window.location.href='../../logout.php'"> <?php echo $fullname; ?> </button>
            <?php else: ?>
            <button type="submit" >log in</button>
            <button type="submit" id="create">join us</button>
            <?php endif;?>
          </span>

          <div class="Tlayer T1">
            <span><a href="">latest news</a></span>
            <span><a href="">columnist</a></span>
            <span><a href="">men</a></span>
            <span><a href="">academy</a></span>
            <span><a href="">women</a></span>
            <span><a href="">club</a></span>
            <span><a href="">analysis</a></span>
            <span><a href="">blog</a></span>
            <span><a href="">chelsea foundation</a></span>
            <span><a href="">more news <i class="fa fa-angle-down"></i></a></span>
          </div>
  
          <div class="Tlayer T2">
            <span><a href="">latest videos</a></span>
            <span><a href="">live stream events</a></span>
          </div>
  
          <div class="Tlayer T3">
            <span><a href="">fixtures</a></span>
            <span><a href="">results</a></span>
            <span><a href="">league tables</a></span>
            <span><a href="">downloadable fixtures</a></span>
            <span><a href="">matchday experience</a></span>
            <span><a href="">pre-season</a></span>
          </div>
  
          <div class="Tlayer T4">
            <span><a href="">men</a></span>
            <span><a href="">women</a></span>
            <span><a href="">academy</a></span>
            <span><a href="">on loan</a></span>
           
          </div>
  
          <div class="Tlayer T5">
            <span><a href="">Buy Tickets</a></span>
            <span><a href="">Ticket Info</a></span>
            <span><a href="">MatchDay info</a></span>
            <span><a href="">memberships</a></span>
            <span><a href="">season tickets</a></span>
            <span><a href="">ticket exchange <i class="fa fa-external-link"></i> </a></span>
            <span><a href="">my ticket account<i class="fa fa-external-link"></i></a></span>
          </div>
  
          <div class="Tlayer T6">
            <span><a href="">Buy Tickets</a></span>
            <span><a href="">westview</a></span>
            <span><a href="">Matchday packages</a></span>
            <span><a href="">annual vip packages</a></span>
            <span><a href="">members area</a></span>
            <span><a href="">contact hospitability</a></span>
          </div>

          <div class="deskSearch">
            <form id="rad1" action="/chelsea/search" method="GET">
              <input type="search" name="search" id="srch1" value="<?php if(isset($_GET['search'])){ echo $_GET['search']; }?>" placeholder="Search">
            </form>
          </div>
      
        </div>

        
        <!-- where the nav white actually ends  -->
        <!-- where all uls are located -->
