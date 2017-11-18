<?php
header('Cache-Control: no-cache, no-store, must-revalidate'); // HTTP 1.1.
header('Pragma: no-cache'); // HTTP 1.0.
header('Expires: 0'); // Proxies.
$driver = $output;
$driver = preg_match('/([\w-_]{28})/',$driver,$driver)?$driver[1]:null;
$e = time() + 14000;
$md5 = md5($driver);
$md52 = md5($e);
	$cachefile = 'cache/'.$driver.'-embedv';
	// define how long we want to keep the file in seconds. I set mine to 4 hours.
	$cachetime = 13999;
	// Check if the cached file is still fresh. If it is, serve it up and exit.
	if (file_exists($cachefile) && time() - $cachetime < filemtime($cachefile)) {
    include($cachefile);
    	exit;
	}
	// if there is either no file OR the file to too old, render the page and capture the HTML.
	ob_start();
 

$ch = curl_init("https://drive.google.com/get_video_info?docid=$driver");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
// get headers too with this line
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
$result = curl_exec($ch);
// get cookie
// multi-cookie variant contributed by @Combuster in comments
preg_match_all('/^Set-Cookie:\s*([^;]*)/mi', $result, $matches);
$cookies = array();
foreach($matches[1] as $item) {
    parse_str($item, $cookie);
    $cookies = array_merge($cookies, $cookie);
}
$cookiz = str_replace("DRIVE_STREAM=" ,"" , $matches[1]); 
 
$data = $result;
parse_str($data,$data);
		$sources = explode(',',$data['fmt_stream_map']);
		if(!$sources)return false;
		foreach($sources as $source){
			$source = explode('|',$source);
			//$quality = str_replace([18,59,22,37],[360,480,720,1080],$source[0]);
			$source[1] = preg_replace('/[^\/]+\.google\.com/','redirector.googlevideo.com',$source[1]);
			$source[1] = preg_replace('/app=[^\/&]+/',"app=free",$source[1]);
 
			$expire = preg_match('/expire=([\d]+)/',$source[1],$expire)?$expire[1]:false;
		}
			 $sources = str_replace("|" ,"<file>" , $sources); 
 
			$sources = preg_replace('@<file>https://(.*)@si','<file>https://$1&apps=filmesx.co</file>',$sources);
			$sources = str_replace("c.drive.google.com" ,"googlevideo.com" , $sources); 
 	ob_start();
print_r($sources, false);
 
$output = ob_get_contents();
$output = str_replace("%2C" ,"," , $output ); 
//$output = str_replace("&" ,"%26" , $output ); 
$output = str_replace("18<file>" ,"<quality>360</quality><file>" , $output ); 
$output = str_replace("59<file>" ,"<quality>480</quality><file>" , $output ); 
$output = str_replace("22<file>" ,"<quality>720</quality><file>" , $output ); 
$output = str_replace("37<file>" ,"<quality>1080</quality><file>" , $output ); 
ob_end_clean();

 
$regex3='|</quality><file>(.+?)</file>|';
preg_match_all($regex3,$output,$parts3);
$sort3 = $parts3[1];
 
	$links3=$sort3;  
 
 

$regex2='|<quality>(.+?)</quality>|';
preg_match_all($regex2,$output,$parts2);
$sort2 = $parts2[1];
 
	$links2=$sort2;  

 


 

include("servers.php");
include("config.php");
$drv = "<div>".$driver."</div><t>".$e."</t>";
$drvid = $driver;
$enc = base64_encode(openssl_encrypt($drvid,$encrypt_method, $key, 0, $iv));
 

?>
 
<!DOCTYPE html>
<html>
<head>
<title></title>
<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<link href="/jwplayer/skins/prime.min.css" rel="stylesheet" type="text/css" />
<link href="/jwplayer/jw-logo/jw-logo-bar.css" rel="stylesheet" type="text/css" />
<style type="text/css">body,html{padding:0px;margin:0px;background:#000000;}</style>
<style type="text/css">
*{margin:0;padding:0}#picasa{position:absolute;width:100%!important;height:100%!important}
</style>
</head>
<body>
<script type="text/javascript" src="/jwplayer/jquery-2.2.3.min.js"></script>
<script type="text/javascript" src="/jwplayer/jwplayer.js"></script>
<script type="text/javascript">jwplayer.key="Ywok59g9j93GtuSU7+axNzjIp/TBfiK4s0vvYg==";</script>
<script type="text/javascript" src="/jwplayer/jw-logo/jw-logo-bar.js"></script>

<div id="my"></div>
 
<script type="text/javascript">
jwplayer.defaults = {
  aspectratio: "16:9",
  autostart: true,
                  abouttext: "Filmesx.co",
                aboutlink: "https://Filmesx.co",
  controls: true,
  displaydescription: false,
  displaytitle: true,
 
  flashplayer: "/wp-content/play/jwplayer/jwplayer.flash.swf",
  height: 260, 
  mute: false,
  primary: "html5",
  repeat: false,
    skin: {
  name: "prime"
  },
  sharing:{
			    link: "",
			    code: "",
				heading: "Share",
				sites: ["facebook","twitter","tumblr","googleplus","reddit","linkedin","interest","email"],
			},
  stagevideo: false,
  stretching: "uniform",
  width: "100%"
};
var playerInstance = jwplayer("my");
playerInstance.setup({
 
 sources: [
 
<?php
$i = 0;
foreach($links2 as $link2){
$i++;
$var = explode('&',$links3[$i -1]);
$domain = $var[0];
$domain = base64_encode(preg_replace('@(.*)videoplayback(.*)@si',"$1",$domain));
$links3[$i -1] = preg_replace('@https://(.*).com/videoplayback@si',"",$links3[$i -1]);
$sub = preg_replace('@https://(.*).com/videoplayback@si',"$1",$links3[$i -1]);
$links3[$i -1] = preg_replace('@&ip=(.+?)&@si',"&ip=$1&ck=$cookiz[0]&dom=$domain&",$links3[$i -1]);
$links3[$i -1] = preg_replace('@&driveid=(.+?)&@si',"&driveid=$enc&api=$cookiz[0]&",$links3[$i -1]);
?>

 {
        file: "<?php echo $proxy; ?><?php echo $links3[$i -1]; ?><?php $denc = base64_encode($links3[$i -1]); $denc = str_replace("-", "/", $denc); $denc = str_replace("+", "_", $denc); ?>",
        label: "<?php echo $links2[$i -1]; ?>p",
provider: "http",
        type: "mp4"<?php if($links2[$i -1] == "720") { ?>,
	"default": "true"
	<?php } ?>
      },
<?php
} 
?> 


],

 
});
 
document.cookie = "<?php echo $md52; ?>=<?php echo $md5; ?>; expires=Thu, 18 Dec 37 12:00:00 UTC; path=/"; 
 
playerInstance.on('error' , function(){
 
 // put failsafe here
}); 

 
 
</script>
</div>
</body>
</html>
<?php
	// We're done! Save the cached content to a file
	$fp = fopen($cachefile, 'w');
	fwrite($fp, ob_get_contents());
	fclose($fp);
	// finally send browser output
	ob_end_flush();
?>
