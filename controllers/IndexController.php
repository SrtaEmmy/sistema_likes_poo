<?php 
require_once('models/Image.php'); 
  

class IndexController{
    public function getImages(){
        session_start();
        $_SESSION['id_user'] = 1;
        $id_user = $_SESSION['id_user'];
        $image = new Image();
        $images =  $image->getAll();

        require_once('views/index.php');
    }


}

 
 
?>