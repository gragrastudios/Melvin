<?php

 include 'include.php';

session_start();


if(isset($_SESSION['id'])){
  echo 'You are already logged in to another account. <a href="logout.aspx">Logout?</a>';
  if(isset($_SESSION["admin_name"])) {
  header("Location: /adminhome.aspx");
  }else {
    header("Location: /default.aspx");
  }
  die();
};

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, htmlspecialchars($_POST['name']));
   $email = mysqli_real_escape_string($conn, htmlspecialchars($_POST['email']));
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $user_type = $_POST['user_type'];

   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);

      if($row['user_type'] == 'admin'){

         $_SESSION['id'] = $row['id'];
         $_SESSION['bantype'] = $row['bantype'];
         $_SESSION['user_type'] = $row['user_type'];
         $_SESSION['admin_name'] = $row['name'];
         $_SESSION['loggedin'] = '1';
         header('location:adminhome.aspx');

      }elseif($row['user_type'] == 'user'){

         $_SESSION['id'] = $row['id'];
         $_SESSION['bantype'] = $row['bantype'];
         $_SESSION['user_type'] = $row['user_type'];
         $_SESSION['user_name'] = $row['name'];
         $_SESSION['loggedin'] = '1';
         header('location:default.aspx');

      }
     
   }else{
      $error[] = 'incorrect email or password!';
   }

};
  
  if(isset($error)){
         foreach($error as $error){
            echo '<h1 style="color: red;">'.$error.'</h1>';
         };
      };
?>