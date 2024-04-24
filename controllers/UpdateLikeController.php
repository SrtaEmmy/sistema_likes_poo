<?php 
require_once('models/Like.php');
 
class UpdateLikeController{

    public function update(){
        
        if($_SERVER['REQUEST_METHOD']==='POST'){
            $like = new Like();
            $like->setId_img($_POST['id_image']);
            $like->setId_user($_POST['id_user']);

            $getLike = $like->update();
            echo json_encode(array('idImg'=>$like->getId_img(), 'likes'=>$getLike));
        }
    }
    
}  
 
 
?>