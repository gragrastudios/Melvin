<?php include 'include.php'; ?>
<?php include 'loggedinnavbar.php'; ?>
<?php
session_start();
if(isset($_POST["submit"])) {
    $gamename = $_POST["name"];
    //$file_name = $_FILES['image']['name'];
    $file_name = rand(1,99999999);
    $tempname = $_FILES['image']['tmp_name'];
    $folder = 'images/'.$file_name;
    //$gamethumb = $_POST["thumbnail"];
    //$gameslide1 = $_POST["slide1"];
    //$gameslide2 = $_POST["slide2"];
    //$gameslide3 = $_POST["slide3"];
    //$gameslide4 = $_POST["slide4"];
    //$gameslide5 = $_POST["slide5"];
    //$gameslide6 = $_POST["slide6"];
    //$gameslide7 = $_POST["slide7"];
    //$gameslide8 = $_POST["slide8"];
    //$gameslide9 = $_POST["slide9"];
    //$gameslide10 = $_POST["slide10"];
  
    // error handelers
    
    if (empty($file_name)) {
      echo "<center>Please fill in all fields. <a href='/presentations.aspx'>Back?</a></center>";
      exit();
    }
    
    $query = mysqli_query($conn, "INSERT INTO templates (id, name, description, thumbnail, creator_id, ip, port, type, protection) VALUES (NULL, '".$gamename."', 'placeholder', 'images/$file_name', '".$_SESSION['id']."', 'placeholder', 'placeholder', 'placeholder', 'placeholder')");
    
    // upload
    if (move_uploaded_file($tempname, $folder)){
      echo "Successfully Uploaded!";
      header('location:presentations.aspx');
    } else { 
      echo "Error: something went wrong.";
    }
};
  
  $_USERID = $_SESSION["id"];
  $_USERQ = mysqli_query($conn, "SELECT * FROM user_form WHERE id='$_USERID'") or die(mysqli_error($conn));
  $_USER = mysqli_fetch_assoc($_USERQ);
  $iphash = md5($_SERVER["REMOTE_ADDR"]);
  $iphashq = mysqli_query($conn, "UPDATE `user_form` SET `ip` = '".$iphash."' WHERE `user_form`.`id` = '".$_USER['id']."';");
 
          if($_USER['bantype'] == 'Reminder'){
   header('location:banned.aspx');
  }
  
        if($_USER['bantype'] == 'Warning'){
   header('location:banned.aspx');
  }
        if($_USER['bantype'] == 'Ban'){
   header('location:banned.aspx');
  }  
        if($_USER['bantype'] == '1daysban'){
   header('location:banned.aspx');
  }
        if($_USER['bantype'] == '3daysban'){
   header('location:banned.aspx');
  }
        if($_USER['bantype'] == '7daysban'){
   header('location:banned.aspx');
  }
?>

     <div class="container col-xl-10 col-xxl-8 px-4 py-5">
      <div class="col-md-10 mx-auto col-lg-5">
        <form action="" method="post" enctype="multipart/form-data" class="p-4 p-md-5 border rounded-3 bg-body-tertiary">
          <center><h3>CREATE TEMPLATE</h3></center>
          <div class="form-floating mb-3">
            <input type="text" name="name" required class="form-control" placeholder="epic slide show">
            <label for="floatingInput">Name</label>
          </div>
          <div class="mb-3">
              <label class="form-label" for="disabledCustomFile">Thumbnail *required*</label>
              <input type="file" required class="form-control" name="image">
          </div>
          <button type="submit" name="submit" class="w-100 btn btn-lg btn-primary">Upload</button>
          <hr class="my-4">
          <small class="text-body-secondary">By clicking Upload, you agree to the terms of use.</small>
        </form>
      </div>
    </div>
  </div>
 <div class="container my-5">
<?php echo $footer ?>
   <div id="Body" style="display: none;">
  <form action="updategame.php" method="post" enctype="multipart/form-data">
  <div id="EditItemContainer">
    <h2>Configure Place</h2>
    
    <div id="ItemName">
      <span style="font-weight: bold;">Name:</span><br>
      <input name="name" type="text" value="<?php echo ''.$_USER['username'].'';?>'s Place" maxlength="35" class="TextBox">
      <span style="color:Red;visibility:hidden;">A Name is Required</span>
    </div>
    <div class="GameThumbnail" style="margin-left: 6.2rem;">
                  <span style="font-weight: bold;">Thumbnail:</span><br>
                  <input name="thumbnail" type="text" value="Thumbnail url here" maxlength="200000000000" class="TextBox">
    </div>
    <div id="ItemDescription">
      <span style="font-weight: bold;">Description:</span><br>
      <textarea type="text" name="map" maxlength="1000" rows="2" cols="20" class="TextBox" style="height:150px;width: 410px;padding: 5px;"></textarea>
    </div>
    <div id="Comments">
      <fieldset title="Max Players">
        <legend>Please Enter IP</legend>
        <div class="Suggestion">
          Enter IP for your game
        </div>
        <div class="EnableCommentsRow" style="padding: 10px 4px 10px 4px;text-align: right;width:auto;">
          <input type="text" name="ip" class="TextBox" min="1" max="20" value="">
        </div>
      </fieldset>
    </div>
    <div id="Comments">
      <fieldset title="Max Players">
        <legend>Enter Port</legend>
        <div class="Suggestion">
          Please enter port for your game
        </div>
        <div class="EnableCommentsRow" style="padding: 10px 4px 10px 4px;text-align: right;width:auto;">
          <input type="text" name="port" value="53640" class="TextBox" min="1" max="20">
        </div>
      </fieldset>
          <div id="Comments">
      <fieldset title="Max Players">
        <legend>Choose Client</legend>
        <div class="Suggestion">
          Please choose the client your game will use
        </div>
        <div class="EnableCommentsRow" style="padding: 10px 4px 10px 4px;text-align: right;width:auto;">
        <select name="type" class="TextBox" min="1" maxlength="35">
         <option value="2014">2014</option>
         <option value="2008">2008 (alpha)</option>
         <option value="2007">2007 (alpha)</option>
      </select>
      </fieldset>
          </div>
    </div>
               <div id="Comments">
            <fieldset title="Provide your age-group">
              <legend>Choose Protection Type</legend>
              <div class="Suggestion">
                If your game is UnCopyLocked, this will allow users to download, and edit your game.
              </div>
              <br>
              <div class="AgeGroupRow">
                <span id="ctl00_cphRoblox_rblAgeGroup"><input id="ctl00_cphRoblox_rblAgeGroup_0" type="radio" name="copy" value="copy" checked="checked" tabindex="5"/><label for="ctl00_cphRoblox_rblAgeGroup_0">UnCopyLocked</label><br/><input id="ctl00_cphRoblox_rblAgeGroup_1" type="radio" name="copy" value="CopyLocked" onclick="javascript:setTimeout('__doPostBack(\'ctl00$cphRoblox$rblAgeGroup$1\',\'\')', 0)" tabindex="5"/><label for="ctl00_cphRoblox_rblAgeGroup_1">CopyLocked</label></span>
              </div>
              <br>
            </fieldset>
          </div>
    <div class="Buttons">
      <input name="updateall" tabindex="4" class="Button" type="submit" value="Create">&nbsp;
      <a id="Cancel" tabindex="5" class="Button" href="/my/home">Cancel</a>
    </div>
  </div>
</form>
</div>