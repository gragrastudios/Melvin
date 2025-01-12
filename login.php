<?php include 'include.php'; 
  
  if(isset($_SESSION['id'])){
  echo 'You are already logged in to another account. <a href="logout.aspx">Logout?</a>';
  if(isset($_SESSION["admin_name"])) {
  header("Location: /adminhome.aspx");
  }else {
    header("Location: /default.aspx");
  }
  die();
};
  
  ?>
<?php echo $navbar; ?>   
<div class="container col-xl-10 col-xxl-8 px-4 py-5">
 <div class="col-md-10 mx-auto col-lg-5">
  <form action="loginpost.php" method="post" class="p-4 p-md-5 border rounded-3 bg-body-tertiary">
    <img class="mb-4" src="/text.jpg" alt="Melvin Logo" width="150" height="70">
    <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

    <div class="form-floating">
      <input type="email" name="email" required class="form-control" placeholder="name@example.com">
      <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating">
      <input type="password" name="password" required class="form-control" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>

<br>
    <input type="submit" name="submit" value="Sign in" class="btn btn-primary w-100 py-2">
  </form>
  </div>
</div>
<?php echo $footer ?>