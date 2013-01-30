<?php
require_once('plx_parser.php');
require_once('rssfeed.php');
$plist_url = 'http://www.navixtreme.com/playlist/96835/justme4u2c_movies_1_to_198_of_1237.plx';

if($_REQUEST['plist']){

$plist_url = 'http://www.navixtreme.com/playlist/'. $_REQUEST['plist'].'.plx';

}

if($_REQUEST['url']){

$plist_url = $_REQUEST['url'];

}
header('Content-Type: text/xml; charset=' . 'UTF-8', true);
header('Status: 200 OK');
//$Q = $_REQUEST['url'];
//echo $plist_url;

$p = new PlxParser( $plist_url );
//echo "v: " . $p->version . "<br/>b: " . $p->background . "<br/>t: " . $p->title . "<br/>"; 
$myfeed = new RSSFeed();
$myfeed->SetChannel('http://darc.t15.org/feed/',
          $p->title,
                 $p->description  ,
          'en-us',
          'I copy and write',
                  'me',
          'Navi-x');
$myfeed->SetImage($p->background);


$e = $p->next();



//while(isset($e)) {}
while(isset($e)) {
$Item_url =$e->url;
if($e->type ==="playlist"){
$Item_url ='http://darc.t15.org/feed/?url='.$e->url;
}

$myfeed->SetItem($Item_url,
				   $e->name,
                   $e->description,
				   $e->thumb,
				   $e->type,
				$e->date,
				$e->rating,
				$e->url,
				$e->player,
				$e->processor);
	//echo $e->url;
	$e = $p->next();
}
echo $myfeed->output();

	// $e->type,
	// $e->name,
	// $e->thumb,
	// $e->date,
	// $e->rating,
	// $e->url,
	// $e->description,
	// $e->player,
	// $e->processor,
//require_once('nipl_parser.php');
//$n = new NiplParser("http://www.navixtreme.com/proc/vidxden", "http://www.vidxden.com/5n10nnryx6aw");///$e = $n->parse();
//echo $n->parse();

?>
