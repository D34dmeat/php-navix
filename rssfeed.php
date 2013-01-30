<?php
class RSSFeed {
// VARIABLES
    // channel vars
    var $channel_url;
    var $channel_title;
    var $channel_description;
    var $channel_lang;
    var $channel_copyright;
    var $channel_date;
    var $channel_creator;
    var $channel_subject;   
    // image
    var $image_url;
    // items
    var $items = array();
    var $nritems;
    
// FUNCTIONS
    // constructor
    function RSSFeed() {
            $this->nritems=0;
        $this->channel_url='';
        $this->channel_title='';
        $this->channel_description='';
        $this->channel_lang='';
        $this->channel_copyright='';
        $this->channel_date='';
        $this->channel_creator='';
        $this->channel_subject='';
        $this->image_url='';
    }   
    // set channel vars
    function SetChannel($url, $title, $description, $lang, $copyright, $creator, $subject) {
        $this->channel_url=$url;
        $this->channel_title=$title;
        $this->channel_description=$description;
        $this->channel_lang=$lang;
        $this->channel_copyright=$copyright;
        $this->channel_date=date(DATE_RFC822);//' +01:00' date("d m Y").' '.date("H:i:s").' '.date("O")
        $this->channel_creator=$creator;
        $this->channel_subject=$subject;
    }
    // set image
    function SetImage($url) {
        $this->image_url=$url;  
    }
    // set item
    function SetItem($url, $title, $description, $thumb, $type,
				$date,
				$rating,
				$lurl,
				$player,
				$processor) {
        $this->items[$this->nritems]['url']=$url;
        $this->items[$this->nritems]['title']=$title;
		$this->items[$this->nritems]['description']= $description;
		$this->items[$this->nritems]['thumb']=$thumb;
		$this->items[$this->nritems]['type']=$type;
		$this->items[$this->nritems]['date']=$date;
		$this->items[$this->nritems]['rating']=$rating;
		$this->items[$this->nritems]['origurl']=$lurl;
		$this->items[$this->nritems]['player']=$player;
		$this->items[$this->nritems]['processor']=$processor;
        $this->nritems++;   
    }
	

	
    // output feed

 //$output .= '<rdf:RDF xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns="http://purl.org/rss/1.0/" xmlns:slash="http://purl.org/rss/1.0/modules/slash/" xmlns:taxo="http://purl.org/rss/1.0/modules/taxonomy/" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:syn="http://purl.org/rss/1.0/modules/syndication/" xmlns:admin="http://webns.net/mvcb/" xmlns:feedburner="http://rssnamespace.org/feedburner/ext/1.0">'."\n";
//$feed .= '<item>';
//$feed .='<image>';
//$feed .='<url>$PHOTO</url>';
//$feed .='<title>YOUR RSS</title>';
//$feed .='<link>../$USERNAME.rss.php</link>';
//$feed .='<width>50px</width>';
//$feed .='<height>50px</height>';
//$feed .='</image>';
//$feed .= '<title>$TITLE</title>';
//$feed .= '<description>$DESCRI</description>';
//$feed .= '<link>$LINK</link>';
//$feed .= '</item>';

//$feed .= '</channel>';



    function Output() {
        $output =  '<?xml version="1.0" encoding="utf-8"?>'."\n";
        $output .= '<rss version="2.0"
        xmlns:content="http://purl.org/rss/1.0/modules/content/"
        xmlns:wfw="http://wellformedweb.org/CommentAPI/"
        xmlns:dc="http://purl.org/dc/elements/1.1/"
        xmlns:atom="http://www.w3.org/2005/Atom"
        xmlns:sy="http://purl.org/rss/1.0/modules/syndication/"
        xmlns:slash="http://purl.org/rss/1.0/modules/slash/" xmlns:media="http://search.yahoo.com/mrss/" xmlns:boxee="http://boxee.tv/spec/rss/" xmlns:dcterms="http://purl.org/dc/terms/">'."\n";
       // $output .= '<channel rdf:about="'.$this->channel_url.'">'."\n";
		$output .= '<channel>'."\n";
        $output .= '<title>'.filterText($this->channel_title).'</title>'."\n";
        $output .= '<link>'.filterText($this->channel_url).'</link>'."\n";
        $output .= '<description>'.filterText($this->channel_description).'</description>'."\n";
       // $output .= '<dc:language>'.$this->channel_lang.'</dc:language>'."\n";
       // $output .= '<dc:rights>'.$this->channel_copyright.'</dc:rights>'."\n";
       // $output .= '<dc:date>'.$this->channel_date.'</dc:date>'."\n";
       // $output .= '<dc:creator>'.$this->channel_creator.'</dc:creator>'."\n";
        //$output .= '<dc:subject>'.$this->channel_subject.'</dc:subject>'."\n";
		$output .= '<language>'.$this->channel_lang.'</language>'."\n";
        $output .= '<copyright>'.$this->channel_copyright.'</copyright>'."\n";
        $output .= '<pubDate>'.$this->channel_date.'</pubDate>'.'<atom:link href="'.$this->channel_url.'" rel="self"/>';
        $output .= '<generator>'.$this->channel_creator.'</generator>'."\n";
       // $output .= '<dc:subject>'.$this->channel_subject.'</dc:subject>'."\n";
		$output .= '<image><url>'.filterText($this->image_url).'</url> <title>'.filterText($this->channel_title).'</title><link>'.filterText($this->channel_url).'</link></image>'."\n";
        //$output .= '<items>'."\n";
       // $output .= '<rdf:Seq>';
       // for($k=0; $k<$this->nritems; $k++) {
       //     $output .= '<rdf:li rdf:resource="'.$this->items[$k]['url'].'"/>'."\n"; 
        //};      
       // $output .= '</rdf:Seq>'."\n";
       // $output .= '</items>'."\n";
       // $output .= '<image rdf:resource="'.$this->image_url.'"/>'."\n";
		//$output .= '<image>'.$this->image_url.'</image'."\n";
      // $output .= '</channel>'."\n";
        for($k=1; $k<$this->nritems; $k++) {
          //  $output .= '<item rdf:about="'.$this->items[$k]['url'].'">'."\n";
			$output .= '<item>'."\n";
			//$output .= '<image>'."\n";
			//$output .= '<url>'.$this-> items[$k]['thumb']. '</url>';
		//	$output .= $this-> items[$k]['thumb'];

			//$output .='<title>'.$this-> items[$k]['title'].'</title>';
			//$output .='<link>'.$this->items[$k]['url'].'</link>';
			//$output .='<width>50px</width>';
			//$output .='<height>50px</height>';
			//$output .='</image>';
            $output .= '<title>'.filterText($this->items[$k]['title']).'</title>'."\n";
            $output .= '<link>'.filterText($this->items[$k]['url']).'</link>'."\n";//
			$output .= '<media:content url="'.filterText($this->items[$k]['url']).'" type="'.$this->items[$k]['type'].'" duration="10500" height="1080" width="1920" lang="en-us" />'."\n";
            $output .= '<description>'.filterText('<a href="'.$this->items[$k]['url'].'"><img src="'.$this->items[$k]['thumb'].'"></img></a>'.$this->items[$k]['description']).'</description>'."\n";
            $output .= '<guid>'.filterText($this->items[$k]['url'].'?id='.$k).'</guid>'.'<boxee:release-date>'.$this->items[$k]['date'].'</boxee:release-date>'."\n";
		   if($this->items[$k]['type'] === "video"){
				//if($this->items[$k]['processor']){
				$output .= '<media:player url="'.$this->items[$k]['processor'].'" height="720" width="1280" />'."\n";
				//}
		   }
            $output .= '</item>'."\n";  
        }
        //$output .= '</rdf:RDF>'."\n";
		//$output .= '</items>'."\n";
		$output .= '</channel></rss>';
        return $output;
    }
};
function filterText($text){
	$search = array (
      '&',
      '<',
      '>',
      '"',
      chr(212),
      chr(213),
      chr(210),
      chr(211),
      chr(209),
      chr(208),
      chr(201),
      chr(145),
      chr(146),
      chr(147),
      chr(148),
      chr(151),
      chr(150),
      chr(133)
   );
   $replace = array (
      '&amp;',
      '&lt;',
      '&gt;',
      '&quot;',
      '&#8216;',
      '&#8217;',
      '&#8220;',
      '&#8221;',
      '&#8211;',
      '&#8212;',
      '&#8230;',
      '&#8216;',
      '&#8217;',
      '&#8220;',
      '&#8221;',
      '&#8211;',
      '&#8212;',
      '&#8230;'
   );
   return str_replace($search, $replace, $text);
    };
?>
