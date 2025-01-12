<?php include 'include.php'; 
  session_start();
  if(isset($_SESSION['user_name'])) {
    header('Location: /default.aspx');
    }elseif (isset($_SESSION['admin_name'])){
     header('Location: adminhome.aspx');
    }
  
  ?>
    <?php echo $navbar; ?>
    <div class="container my-5">
      <h1>Melvin</h1>
      <div class="col-lg-8 px-0">
        <p class="fs-5">We are a school related website. We make it easy to <br> make and presentate for your class!</p>
        <p>And we are free! (no fees, not anything!)</p>

        <a href="/register.aspx" class="btn btn-primary">Join Us!</a>
      </div>
      <hr>
      <div style="background-color: #9d94fa;" id="about">
        <br>
        <br>
        <h1 style="margin-left: 50px;" >About Us!</h1>
        <br>
        <h3 style="margin-left: 50px;">We are a friend owned website trying to make the school systems better.</h3>
        <h3 style="margin-left: 50px;">We let you create presentations, and present them.</h3>
        <h3 style="margin-left: 50px;">We hope one day our platform will grow into something bigger.</h3>
        <h3 style="margin-left: 50px;">And you can help us! By using our platform you are making a big change.</h3>
        <h3 style="margin-left: 50px;">Thank you!</h3>
        <br>
      </div>
      <?php echo $footer ?>