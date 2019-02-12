<?php
//https://v.qq.com/x/list/tv
//https://v.qq.com/channel/tv?listpage=1&channel=tv&sort=18&_all=1
//https://v.qq.com/x/list/tv?offset=0&iarea=814
//href="?offset=
error_reporting(0);
$cs=$_SERVER["QUERY_STRING"];
if ($cs=="" || $cs==null)
{
	$cs="https://v.qq.com/x/list/tv";
}
$vdata0=str_replace("http","https://herojuno1.herokuapp.com/vip/v.php?http",http_get_data($cs));
$vdata1=str_replace("?offset=","https://herojuno1.herokuapp.com/v.php?https://v.qq.com/x/list/tv?offset=",$vdata0);
$vdata=str_replace('href="/x/cover/','href="https://herojuno1.herokuapp.com/vip/vip3.php?p=https://v.qq.com/x/cover/',$vdata1);

function g_contents($url) {
    $ch= curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch, CURLOPT_TIMEOUT,30);
    curl_setopt($ch, CURLOPT_USERAGENT,'Mozilla/5.0');
    curl_setopt($ch, CURLOPT_ENCODING ,'');
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    @$data = curl_exec($ch);
    curl_close($ch);
    return $data;
}
function http_get_data($url) {      
        $ch = curl_init ();  
        curl_setopt ( $ch, CURLOPT_CUSTOMREQUEST, 'GET' );  
        curl_setopt ( $ch, CURLOPT_SSL_VERIFYPEER, false );  
        curl_setopt ( $ch, CURLOPT_URL, $url );  
        ob_start ();  
        curl_exec ( $ch );  
        $return_content = ob_get_contents ();  
        ob_end_clean ();         
        $return_code = curl_getinfo ( $ch, CURLINFO_HTTP_CODE );  
        return $return_content;  
} 
//header('Content-type: application/json');
echo $vdata;
?>
