<?php 

$m = new MongoClient();
$db = $m->maindb;
$doc = $db->Post;
//$newdata = array('$set' => array("Likes"=> 22));
//$doc->update(array('_id'=>new MongoId('56f8b3d0502b5c8e5c649bab')),array('$inc'=>array('Likes'=>1)));
//$result = $doc->findOne(array('_id'=> new MongoId('57003513502b5c8e5c649bc4')));
//print_r($result);




$mac = "";
$postid = "";
foreach ($_POST as $key => $value) {            
    switch ($key) {
        case 'mac':
            $mac = $value;
            break;
        case 'postid':
            $postid = $value;
            break;
        
        default:
            break;
    }
}
$result = $db->Likes->findOne(array('postid'=> $postid,
                              'UserID'=> $mac));

if($mac != "" && $postid != ""){
	if($result == NULL){
		echo "inserting";
		$document = array('postid' => $postid,
				  'UserID' =>  $mac);
	        $db->Likes->insert($document);				              
        	
		$doc->update(array('_id'=>new MongoId($postid)),array('$inc'=>array('Likes'=>1)));

	}else{
		echo "matched";
	}




}



?>

