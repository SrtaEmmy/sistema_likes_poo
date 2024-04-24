<?php 
 
class Like{
    public $id;
    public $id_user;
    public $id_img;
    public $db;

    public function __construct(){
        $this->db = Database::connect();
    }


    

    /**
     * Get the value of id_user
     */ 
    public function getId_user()
    {
        return $this->id_user;
    }

    /**
     * Set the value of id_user
     *
     * @return  self
     */ 
    public function setId_user($id_user)
    {
        $this->id_user = $id_user;

        return $this;
    }

    /**
     * Get the value of id_img
     */ 
    public function getId_img()
    {
        return $this->id_img;
    }

    /**
     * Set the value of id_img
     *
     * @return  self
     */ 
    public function setId_img($id_img)
    {
        $this->id_img = $id_img;

        return $this;
    }



    // verifica si el like de un usuario existe para agregarlo o retirarlo
    public function update(){
        $idImage = $this->getId_img();
        $idUser = $this->getId_user();

        $verify_like_exists = "SELECT * FROM liked WHERE id_user = '$idUser' AND id_image = '$idImage'";
        $result = $this->db->query($verify_like_exists);

        if($result->num_rows > 0){
            $delete_like = "DELETE FROM liked WHERE id_user='$idUser' AND id_image='$idImage'";
            $this->db->query($delete_like);

        }else{
            $insert_like = "INSERT INTO liked (id_user, id_image) VALUES('$idUser', '$idImage')";
            $this->db->query($insert_like);
        }

        // devolver likes actualizados
        $getLikes = "SELECT COUNT(*) AS cantidad FROM liked WHERE id_image='$idImage'";
        $result = $this->db->query($getLikes);

        $row = $result->fetch_assoc();
        return $row['cantidad'];

    }


    // obtiene todos los likes de todas las imagenes
    function getAll(){
        $get_ids = "SELECT id FROM images";
        $result = $this->db->query($get_ids);

        $dataLikes = array();

        while ($row = $result->fetch_assoc()) { 
           $id_image = $row['id'];

           $num_likes = "SELECT COUNT(*) AS cantidad FROM liked WHERE id_image='$id_image'";
            $result_likes = $this->db->query($num_likes);
             
            $row_likes = $result_likes->fetch_assoc();
            
            $dataLikes[] = array('idImg'=>$id_image, 'likes'=>$row_likes['cantidad']);
        }

        return $dataLikes;
    }












}  
 
 
?>