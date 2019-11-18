<!DOCTYPE html>
<html lang='ko' dir='ltr'><head><title>부민/구덕캠퍼스 학식정보</title>
  <link rel='stylesheet' type='text/css' href='css/Cafeteria.css'>
</head><body>
  <?php
  include_once('simplehtmldom_1_8_1/simple_html_dom.php');
  date_default_timezone_set('Asia/Seoul');
  if(!isset($_POST['date'])){
      $today = date("Ymd");
  }
  else{
    $today = $_POST['date'];
  }
  $D_url = "http://www.donga.ac.kr/gzSub_007005005.aspx?DT=".$today;
  $html = file_get_html($D_url);
  function getInfo($sub){
    $strTok =explode(' ' , $sub);
    $cnt = count($strTok);
    for($i = 0 ; $i < $cnt ; $i++){
    	echo($strTok[$i] . "<br/>");
    }
  }
  ?>
<div class ='section'>
<div class ='date'align='right'>
<span><?=$today?></span>
</div>
<div class='article'>
<div class ='font2'>
<?=$html->find('table', 2)->find('tr',0)->children(1)->plaintext ?><br>
</div>
<div class ='font'>
  <?php
$sub1 =$html->find('table', 2)->find('tr',1)->children(1)->plaintext;
$sub2 =$html->find('table',2)->find('tr',2)->children(1)->plaintext;
$sub3 =$html->find('table',2)->find('tr',3)->children(1)->plaintext;
getInfo($sub1);
getInfo($sub2);
getInfo($sub3);
?>
</div></div><br><br><br>
<!--국제회관 기숙사 정보 받아오기 -->
<div class='article'>
<div class='font2'>
<?=$html->find('table', 2)->find('tr',0)->children(2)->plaintext ?><br>
</div>
<div class ='font'>
<?php
$sub= $html->find('table', 2)->find('tr',1)->children(2)->plaintext;
getInfo($sub);
$sub= $html->find('table',2)->find('tr',2)->children(2)->plaintext;
getInfo($sub);
$sub= $html->find('table',2)->find('tr',3)->children(2)->plaintext;
getInfo($sub);
?>
</div></div><br><br><br>
<!--부민(교직원) -->
<div class='article'>
<div class='font2'>
<?=$html->find('table', 2)->find('tr',0)->children(3)->plaintext?><br>
</div>
<div class ='font'>
  <?php
$sub= $html->find('table', 2)->find('tr',1)->children(3)->plaintext;
getInfo($sub);
$sub= $html->find('table',2)->find('tr',2)->children(3)->plaintext;
getInfo($sub);
$sub= $html->find('table',2)->find('tr',3)->children(3)->plaintext;
getInfo($sub);
?>
</div></div><br><br>
<!--강의동학생회관 학식정보 받아오기-->
<div class='article'>
<div class='font2'>
<?=$html->find('table', 2)->find('tr',0)->children(4)->plaintext?><br>
</div><br><br>
<div class ='font'>
<?php
$sub= $html->find('table', 2)->find('tr',1)->children(4)->plaintext;
getInfo($sub);
$sub= $html->find('table',2)->find('tr',2)->children(4)->plaintext;
getInfo($sub);
$sub= $html->find('table',2)->find('tr',3)->children(4)->plaintext;
getInfo($sub);
?>
</div></div><br><br><br>
</div>
<div style='position:fixed; bottom: 20px;right:20px;'>
<form action ='CafeteriaBumin_Guduk.php' method = "post">
  <input type='hidden' method = "post" name='date' value='<?=date("Ymd",strtotime($today."+1 days"))?>'>
  <input type ='image' name='submit' src='images/right.png' value='' id='rightButton'></form></div>
<div style='position:fixed; bottom: 20px;left:20px;'>
<form action ='CafeteriaBumin_Guduk.php' method = "post">
  <input type='hidden' name='date' value='<?=date("Ymd",strtotime($today."-1 days"))?>'>
  <input type ='image' name='submit' src='images/left.png' value='' id='rightButton'></form></div>
</body></html>
