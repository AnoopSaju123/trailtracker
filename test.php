<?php
set_include_path(get_include_path() .':'. 'google-api-php-client/src');

require_once 'Google/Client.php';

require_once 'Google/autoload.php';

extract($_GET);
$client = new Google_Client();
$client->setApplicationName("trailtrackerproject");
$client->setDeveloperKey("AIzaSyDS-ATrY7iKChmvBE_eiUtrjSDex81dFbQ");
$youtube = new Google_Service_YouTube($client);

 $channelname = $youtube->search->listSearch("snippet",array("type"=>"channel","maxResults"=>"1","q"=>$channel));
 $time=0;

$channelId=$channelname['items'][0]['snippet']['channelId'];
while(true)
{
	$date=date("Y-m-d\TH:i:sP",time()-5*60);
	
	 $videos = $youtube->search->listSearch("id", array(
	      "channelId"=>$channelId,"publishedAfter"=>$date,"order"=>"date","type"=>"video","q"=>$q,"maxResults"=>"1"
	  ));
	 $time++;

	if(!empty($videos['items']))
	{
	echo $videos['items'][0]['id']['videoId'] ;
	break;
	}
        if($time>5)
	{
		echo "resend";
                break;
	}
        sleep(5);

}		






?>
