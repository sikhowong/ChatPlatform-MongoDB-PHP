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
foreach ($result as $entry) {
    echo $entry['_id'], " name  ", ': ',  date("m/d/Y h:i:s A",$entry['DateCreated']->sec), " age :  ", $entry['Content'], "<br />";
}
	

$firstKey ="";
$secondKey ="";
$thirdKey ="";
foreach ($_POST as $key => $value) {
    switch ($key) {
        case 'firstKey':
            $firstKey = $value;
            break;
        case 'secondKey':
            $secondKey = $value;
            break;
        case 'thirdKey':
           $thirdKey = $value;
           break;
        default:
            break;
    }
}
if($firstKey != "" && $secondKey != ""){
  $response = $db->execute('db.Post.insert( {"Content" : "'.$firstKey.'",
      "DateCreated" : new Date(),
      "UserID" : "'.$secondKey.'",
      "Likes" :  NumberInt(0),
      "PostID" : NumberInt(1)} );');


  //$collection->insertOne(["Content"=>$firstKey, "DateCreated"=>date('m/d/Y h:i:s A', time()), "UserID"=> $secondKey, "Likes"=> 0, "PostID"=>1]);
}	
   echo "Database mydb selected";
?>
