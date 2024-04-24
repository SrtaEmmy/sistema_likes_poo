<?php 
 
class Image{
    public $id;
    public $url;
    public $db;

    public function __construct(){
        $this->db = Database::connect();
    }

    /**
     * Get the value of url
     */ 
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set the value of url
     *
     * @return  self
     */ 
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getAll(){
        $sql = "SELECT * FROM images";
        $result = $this->db->query($sql);

        $images = array();
        while ($row = $result->fetch_assoc()) { 
            $image = new Image();
            $image->setId($row['id']);
            $image->setUrl($row['url_image']);
            $images[] = $image;
        }
        return $images;
    }
}  
 
 
?>