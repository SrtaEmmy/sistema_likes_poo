<?php 
require_once('models/Like.php');
 
class GetLikesController{
    public function getAll(){
        if($_SERVER['REQUEST_METHOD']==='POST'){
            $like = new Like();
            $dataLikes = $like->getAll();

            echo json_encode($dataLikes);
        }
        
    }
}  
 
 
?>