<html lang='ko' dir='ltr'><head><title>한림생활관 학식정보</title>
  <link rel='stylesheet' type='text/css' href='..\css\Cafeteria.css'>
</head><body>
<?php
include_once('..\simplehtmldom_1_8_1/simple_html_dom.php');
date_default_timezone_set('Asia/Seoul');
session_start();
if(!isset($_POST['date'])){
    $today = date("Y-m-d");
}
else{
  $today = $_POST['date'];
}
$D_url = "http://hanlim.donga.ac.kr/SubPage/SUB001002/SUB001002007.asp?seldate=".$today;
$html = file_get_html($D_url);

?>
<div class ='section'>
<div class ='date' align='right'>
<?=$today?>
</div><br>
<div class='article'>
<div class ='font2'>
<?=$html->find('table',14)->find('tr',1)->find('td',0)?><br>
</div><br>
<div class ='font'>
<?=$html->find('table',14)->find('tr',1)->find('td',1)?>
</div><br><br>
<div class ='font2'>
<?=$html->find('table',14)->find('tr',2)->find('td',0)?><br>
</div><br>
<div class ='font'>
<?=$html->find('table',14)->find('tr',2)->find('td',1)?>
</div><br><br>
<div class ='font2'>
<?=$html->find('table',14)->find('tr',3)->find('td',0)?><br>
</div><br>
<div class ='font'>
<?=$html->find('table',14)->find('tr',3)->find('td',1)?>
</div></div></div>
<div style='position:fixed; bottom: 20px;right:20px;'>
<form action ='CafeteriaHanlim.php' method = "post">
  <input type='hidden' method = "post" name='date' value='<?=date("Y-m-d",strtotime($today."+1 days"))?>'>
  <input type ='image' name='submit' src='..\images\right.png' value='' id='rightButton'></form></div>
<div style='position:fixed; bottom: 20px;left:20px;'>
<form action ='CafeteriaHanlim.php' method = "post">
  <input type='hidden' name='date' value='<?=date("Y-m-d",strtotime($today."-1 days"))?>'>
  <input type ='image' name='submit' src='..\images\left.png' value='' id='rightButton'></form></div>
</body></html>
</body></html>
