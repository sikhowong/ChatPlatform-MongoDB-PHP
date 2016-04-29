<?php
   // connect to mongodb
date_default_timezone_set("America/New_York");
   $m = new MongoClient();
//echo new MongoDate();	
   echo "Connection to database successfully";
   // select a database
   $db = $m->maindb;
   $doc = $db->Post;
   $result = $doc -> find();
$result->sort(array('DateCreated' => -1));
//foreach ($result as $entry) {
  //  echo $entry['_id'], " name  ", ': ',  date("m/d/Y h:i:s A",$entry['DateCreated']->sec), " age :  ", $entry['Content'], "<br />";
//}
	

$content ="";
$postid ="";
$mac ="";
foreach ($_POST as $key => $value) {
    switch ($key) {
        case 'content':
            $content = $value;
            break;
        case 'postid':
            $postid = $value;
            break;
        case 'mac':
           $mac = $value;
           break;
        default:
            break;
    }
}
if($content != "" && $postid != "" && $mac != ""){
  $response = $db->execute('db.Comment.insert( {"Content" : "'.$content.'",
      "DateCreated" : new Date(),
      "UserID" : "'.$mac.'",
      "Likes" :  NumberInt(0),
      "PostID" : "'.$postid.'"} );');


  //$collection->insertOne(["Content"=>$firstKey, "DateCreated"=>date('m/d/Y h:i:s A', time()), "UserID"=> $secondKey, "Likes"=> 0, "PostID"=>1]);
}	
   echo "Database mydb selected";
?>

