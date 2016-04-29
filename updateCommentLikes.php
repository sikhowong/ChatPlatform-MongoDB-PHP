<?php 

$m = new MongoClient();
$db = $m->maindb;
$doc = $db->Comment;
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
        case 'commentid':
            $commentid = $value;
            break;
        
        default:
            break;
    }
}
$result = $db->CommentLikes->findOne(array('commentid'=> $commentid,
                              'UserID'=> $mac));

if($mac != "" && $commentid != ""){
    if($result == NULL){
        echo "inserting";
        $document = array('commentid' => $commentid,
                  'UserID' =>  $mac);
            $db->CommentLikes->insert($document);                            
            
        $doc->update(array('_id'=>new MongoId($commentid)),array('$inc'=>array('Likes'=>1)));

    }else{
        echo "matched";
    }




}



?>


