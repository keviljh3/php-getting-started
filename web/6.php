<?
ini_set('user_agent','Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.22 (KHTML, like Gecko) QQBrowser/5.6.1 Safari/537.22'); 
error_reporting(E_ALL ^ E_NOTICE);
ini_set('date.timezone','Asia/Shanghai'); 

$url="http://kj1.915678.com/bmjg.js";

$data1=file_get_contents($url);

/* $ch = curl_init(); 
curl_setopt ($ch, CURLOPT_URL, $url); 
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT,10); 
$data1 = curl_exec($ch);  */

$data=explode(",",$data1);

$abc=array("��","��","��","��","��","��","ţ","��","��","��","��","��");

print('<!DOCTYPE HTML>
<html>
<head>
  <title>6hc����x1</title>
  <meta http-equiv=Content-Type content="text/html;charset=UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no" />
</head>
<body bgcolor="black">
<font color="#C0C0C0">');

echo "��ǰ:".str_replace('{"k":"',"",$data[0])."��<br><br>";
echo "ƽ��:".$data[1].$abc[$data[1] % 12].",".$data[2].$abc[$data[2] % 12].",".$data[3].$abc[$data[3] % 12].",".$data[4].$abc[$data[4] % 12].",".$data[5].$abc[$data[5] % 12].",".$data[6].$abc[$data[6] % 12]."<br><br>";
echo "����:".$data[7].$abc[$data[7] % 12]."<br><br>";
echo "����:".$data[8]."�� ����".$data[11]." ".$data[9]."��".$data[10]."��";
echo "</font></body></html>";
?>?