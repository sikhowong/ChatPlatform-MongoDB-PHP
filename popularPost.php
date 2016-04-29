<?php
   // connect to mongodb

   $m = new MongoClient();

//  echo "Connection to database successfully";
   // select a database
  $db = $m->maindb;
  $doc = $db->Post;
  $result = $doc -> find();
  $result->sort(array('Likes' => -1));

  $arr = array();
  $count = 0;
  foreach ($result as $entry) {
    $arr[$count]['id'] =  utf8_encode($entry['_id']);
    $arr[$count]['Content'] = $entry['Content'];
    $arr[$count]['DateCreated'] = date("m-d-Y h:i:s A",$entry['DateCreated']->sec);
    $arr[$count]['Likes'] = $entry['Likes'];
    $arr[$count]['UserID'] = $entry['UserID'];

    $count++;
  }
//echo "<br />";	
echo json_encode($arr);

?>
