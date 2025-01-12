<?php include 'include.php'; ?>
<?php echo $navbar; ?>

     <div class="container col-xl-10 col-xxl-8 px-4 py-5">
      <div class="col-md-10 mx-auto col-lg-5">
        <form action="registerpost.php" method="post" class="p-4 p-md-5 border rounded-3 bg-body-tertiary">
          <center><h3>REGISTER</h3></center>
          <div class="form-floating mb-3">
            <input type="text" name="name" required class="form-control" placeholder="melvin">
            <label for="floatingInput">Name</label>
          </div>
          <div class="form-floating mb-3">
            <input type="email" name="email" required class="form-control" placeholder="name@example.com">
            <label for="floatingInput">Email address</label>
          </div>
          <div class="form-floating mb-3">
            <input type="password" name="password" class="form-control" placeholder="Password">
            <label for="floatingPassword">Password</label>
          </div>
          <div class="form-floating mb-3">
            <input type="password" name="cpassword" required class="form-control" placeholder="Confirm Password">
            <label for="floatingPassword">Confirm Password</label>
          </div>
      <select style="visibility: hidden;" name="user_type">
         <option value="user">user</option>
         <option value="admin">admin</option>
      </select>
          <input type="submit" name="submit" value="Sign Up" class="w-100 btn btn-lg btn-primary">
          <hr class="my-4">
          <small class="text-body-secondary">By clicking Sign up, you agree to the terms of use.</small>
        </form>
      </div>
    </div>
  </div>
 <div class="container my-5"> 
<?php echo $footer ?>
     <div class="container col-xl-10 col-xxl-8 px-4 py-5" style="visibility: hidden;">
      <div class="col-md-10 mx-auto col-lg-5">
        <form action="" method="post" class="p-4 p-md-5 border rounded-3 bg-body-tertiary">
          <center><h3>REGISTER</h3></center>
          <div class="form-floating mb-3">
            <input type="text" name="name" required class="form-control" placeholder="melvin">
            <label for="floatingInput">Name</label>
          </div>
          <div class="form-floating mb-3">
            <input type="email" name="email" required class="form-control" placeholder="name@example.com">
            <label for="floatingInput">Email address</label>
          </div>
          <div class="form-floating mb-3">
            <input type="password" class="form-control" placeholder="Password">
            <label for="floatingPassword">Password</label>
          </div>
          <div class="form-floating mb-3">
            <input type="password" name="cpassword" required class="form-control" placeholder="Confirm Password">
            <label for="floatingPassword">Confirm Password</label>
          </div>
      <select style="visibility: hidden;" name="user_type">
         <option value="user">user</option>
         <option value="admin">admin</option>
      </select>
          <input type="submit" name="submit" value="Sign Up" class="w-100 btn btn-lg btn-primary">
          <hr class="my-4">
          <small class="text-body-secondary">By clicking Sign up, you agree to the terms of use.</small>
        </form>
      </div>
    </div>
  </div>