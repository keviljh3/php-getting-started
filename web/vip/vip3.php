<?php
error_reporting(E_ALL ^ E_NOTICE);
ini_set('date.timezone','Asia/Shanghai'); 

$cs=$_SERVER["QUERY_STRING"];
$vurl = $_GET["p"];
$vipnum = $_GET["vipchoice"];
if ($vurl!="" && $vurl!=null)
{
if(strpos($cs,'v.qq.com')!== false && strpos($cs,'&vid=')!== false)
{ 
 //包含
$data0=explode("/cover/",$cs);
$data=explode("/",$data0[1]);
$siddata=explode(".html",$data[1]);
$sid=$siddata[0];
$viddata=explode("vid=",$cs);
$vid=$viddata[1];
$vurl="https://v.qq.com/x/cover/".$sid."/".$vid.".html";
}
//写vurl
$myfile = fopen("zjurl3.txt", "w") or die("Unable to open file!");
fwrite($myfile,$vurl);
fclose($myfile);
echo "<html>";
echo "<head>iosVIP - ";
print('<!--</head><body>-->');
echo "</head><body>";
echo "Save OK -";
if ($vipnum=="" || $vipnum==null)
{
$file_path = "vip_set3.txt";
if(file_exists($file_path)){
$fp = fopen($file_path,"r");
$vipnum = fread($fp,filesize($file_path));
}
}else
{
$myfile = fopen("vip_set3.txt", "w") or die("Unable to open file!");
fwrite($myfile,$vipnum);
fclose($myfile);
}

echo "现在选择: ".$vipnum."<br>";

$file = fopen("vip_web.txt", "r"); //打开txt文件
$user=array();
$i=0;
//输出文本中所有的行，直到文件结束为止。
while(! feof($file))
{
 $user[$i]= fgets($file);//fgets()函数从文件指针中读取一行
 $i++;
}
fclose($file);
$user=array_filter($user);
//print_r($user); //直接输出数组
$url=$user[$vipnum].$vurl;

for ($x=0; $x<=count($user)-1; $x++)
{ //遍历数组，每个元素单行输出
print('<a style="text-decoration:none;" href="');
echo "http://x3.713713.xyz/vip/vip3.php?"."vipchoice=".$x."&p=".$vurl;
print('">');
echo "【".$x."】";
print('</a>');
}



print('<iframe src="');
echo $url;
print('" width="100%" height="500" scrolling="no" />');
echo "</iframe></body></html>";
echo $vurl."<br>";
$num=0;
foreach ($user as $use) { //遍历数组，每个元素单行输出
    echo $num."--".$use ."<br>";
	$num++;
}

}
?>