<?php
$one = $_GLOBAL['SiteAlert1'];
$one = htmlspecialchars(str_replace('{domain}',$sitedomain,$one));
$onecolor = $_GLOBAL['SiteAlert1Color'];

$two = $_GLOBAL['SiteAlert2'];
$two = htmlspecialchars(str_replace('{domain}',$sitedomain,$two));
$twocolor = $_GLOBAL['SiteAlert2Color'];

$three = $_GLOBAL['SiteAlert3'];
$three = htmlspecialchars(str_replace('{domain}',$sitedomain,$three));
$threecolor = $_GLOBAL['SiteAlert3Color'];

$four = $_GLOBAL['SiteAlert4'];
$four = htmlspecialchars(str_replace('{domain}',$sitedomain,$four));
$fourcolor = $_GLOBAL['SiteAlert4Color'];

$five = $_GLOBAL['SiteAlert5'];
$five = htmlspecialchars(str_replace('{domain}',$sitedomain,$five));
$fivecolor = $_GLOBAL['SiteAlert5Color'];
if($_GLOBAL['ShowingSiteAlert1'] == 'yes') {echo '<div class="SystemAlert">
          <div class="SystemAlertText" style="background-color: '.$onecolor.'">
            <div class="Exclamation">
            </div>
            <center><div id="sitealert1txt" style="color: white;">'.$one.'</div></center>
          </div>
        </div>';} ?>
        <?php if($_GLOBAL['ShowingSiteAlert2'] == 'yes') {echo '<div class="SystemAlert">
          <div class="SystemAlertText" style="background-color: '.$twocolor.'">
            <div class="Exclamation">
            </div>
            <center><div id="sitealert2txt" style="color: white;">'.$two.'</div></center>
          </div>
        </div>';} ?>
       <?php if($_GLOBAL['ShowingSiteAlert3'] == 'yes') {echo '<div class="SystemAlert">
          <div class="SystemAlertText" style="background-color: '.$threecolor.'">
            <div class="Exclamation">
            </div>
            <center><div id="sitealert3txt" style="color: white;">'.$three.'</div></center>
          </div>
        </div>';} ?>    
        <?php if($_GLOBAL['ShowingSiteAlert4'] == 'yes') {echo '<div class="SystemAlert">
          <div class="SystemAlertText" style="background-color: '.$fourcolor.'">
            <div class="Exclamation">
            </div>
            <center><div id="sitealert4txt" style="color: white;">'.$four.'</div></center>
          </div>
        </div>';} ?>    
        <?php if($_GLOBAL['ShowingSiteAlert5'] == 'yes') {echo '<div class="SystemAlert">
          <div class="SystemAlertText" style="background-color: '.$fivecolor.'">
            <div class="Exclamation">
            </div>
            <center><div id="sitealert5txt" style="color: white;">'.$five.'</div></center>
          </div>
        </div>';} ?>   
        