<?php
require "header.php";

    if (isset($user)) {
      echo($user);
      $path = $_SERVER['localhost'].'/user';
      header("location: " . $path ."/index.php");
  } else { ?>

<body>
    <header class="mainHeader">
        <h1 class="logo"><a href="index.php">Chat</a></h1>


        <div class="loginButton login" id="loginButton" onclick="myFunction()">Log in</div>
        <!-- reg form -->
        <div class="containerr" id="containerr">
            <div class=""></div>
            <div class="card" id="card1" style="display: none;">
              <h1 class="title">Login</h1>


              <!-- FORM LOG IN -->
              <form id='application' name="application" action="/login.php" method="POST" class="form-horizontal RedirectForm">
                <div class="input-container">
                  <input placeholder="username" type="text" name="username"  class="form-control"  autofocus="true" required="required"/>
                  <div class="bar"></div>
                </div>
                <div class="input-container">
                  <input type="password" name="password" placeholder="password" class="form-control"  required="required"/>
                  <div class="bar"></div>
                </div>
                <div class="button-container">
                  <button class="rocketFly rocketFlyLogin" type="button" form="application"><span>Chat</span></button>
                </div>
              </form>
              <!-- END FORM LOG IN -->

            </div>
            <div class="card alt" id="card2" style="display: none;">
              <div class="toggle"></div>
              <h1 class="title">Register
                <div class="close"></div>
              </h1>
              <!-- FORM REGISTER -->
              <form id='applicationR' action="/register.php" method="POST" name="applicationR">
                <div class="input-container">
                  <input type="text" id="#{label}" placeholder="username" required="required" name="username"
autofocus="true"/>

                  <div class="bar"></div>
                </div>
                <div class="input-container">
                  <input type="uname" name="uname"  placeholder="uname" autofocus="true"/>

                  <div class="bar"></div>
                </div>
                <div class="input-container">
                  <input type="password" name="password"  placeholder="password" required="required"/>

                  <div class="bar"></div>
                </div>
                <div class="input-container">
                  <input type="password" name="password_again" placeholder="password" required="required"/>

                  <div class="bar"></div>
                </div>
                <div class="button-container">
                  <button class="rocketFly rocketFlyRegister" type="button" form="applicationR"><span>Register</span></button>
                </div>
              </form>
              <!-- FORM REGISTER  END-->

              <script type="text/javascript">

    </script>
            </div>
          </div>
           <?php } ?>
        <!-- end reg form -->
    </header>
    <section class="mainPageBlock" id="mainPageBlock" onclick="closeLoginAnywhere()">
        <div class="backgroundMainImg scaleUp"></div>
        <div class="backgroundMainRocket scaleUpRocket"></div>
         <div class="backgroundMainSmoke scaleUpDownSmoke scaleUpSmoke"></div>
        <div class="container-lg container-custom">
            <div class="row">
                <div class="col-6">
                    <div class="siteInfo-main">
                        <div class="siteInfo">
                            <h1 class="animated bounce revelMainsiteInfo">Apollo-11<span>Chat</span></h1>
                            <h4 class="revelMainsiteInfo1">for me and astronauts</h4>
                            <h3 class="revelMainsiteInfo2">Edwin Aldrin:</h3>
                            <p class="revelMainsiteInfo3">
                                This is the LM pilot. I'd like to take this opportunity to ask every person listening in, whoever and wherever they may be, to pause for a moment and contemplate the events of the past few hours and to give thanks in his or her own way.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="mailPicture">
                        <div class="mailPictureimg"></div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <div class="sm content">

    </div>
    <script src="./js/main.js"></script>
    <script type="text/javascript">
    </script>
<?php require "footer.php"; ?>
