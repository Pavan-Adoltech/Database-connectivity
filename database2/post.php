<?php
require_once('data.php');

class post
{
    private $db;
    function __construct()
    {
        $this->db=new Database();

    }   
    
    function getPosts()
    {
        $this->db->query("SELECT * from proj3");
        return $this->db->resultset();
    }

    function getPostsById($id)
    {
        $this->db->query("SELECT * FROM proj3 WHERE id=:id");
        $this->db->bind(":id",$id);
        return $this->db->single();

    }

    
    
    function addPosts($data)
    {
        $this->db->query("INSERT INTO proj3 (ownername,street_name)VALUES(:ownername,:street_name)");

    
        $this->db->bind(':ownername',$data['ownername']);
        $this->db->bind(':street_name',$data['street_name']);

        if($this->db->execute())
        {
            return true;
        }
        else 
        {
            return false;
        }
    }
    
    
    
    function updatePosts($data)
    {
        $this->db->query("UPDATE proj3 SET ownername=:ownername,street_name=:street_name WHERE id= :id");

        $this->db->bind(':id',$data['id']);
        $this->db->bind(':ownername',$data['ownername']);
        $this->db->bind(':street_name',$data['street_name']);

        if($this->db->execute())
        {
            return true;
        }
        else 
        {
            return false;
        }
     }
    
    

        function deletePosts($id)
    {
        $this->db->query("DELETE FROM proj3  WHERE id= :id");

        $this->db->bind(':id',$id['id']);
       

        if($this->db->execute())
        {
            return true;
        }
        else 
        {
            return false;
        }
     }
}
?>
