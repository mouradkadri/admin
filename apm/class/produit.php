<?php

class produit
{
    // Connection
    private $conn;
    // Table
    private $db_table = "produit";
    // Columns
    public $id_produit;
    public $lib_produit;
    public $prix_produit;
    public $description;
    public $img_produit;
    public $id_cat;
    public $mail_admin;

    // Db connection
    public function __construct($db)
    {
        $this->conn = $db;
    }

    // GET ALL
    public function getproduits()
    {
        $sqlQuery = "SELECT id_produit,lib_produit, prix_produit,img_produit, id_cat,description,mail_admin FROM " . $this->db_table . "";
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        return $stmt;
    }

    // CREATE
    public function createproduit()
    {

        $sqlQuery="insert into produit values (?,?,?,?,?,?,?)";
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->bind_param('isdssss', $this->id_produit,$this->lib_produit,$this->prix_produit,$this->img_produit,$this->id_cat,$this->description,$this->mail_admin);

        if ($stmt->execute()){
            return array('status'=>'success');
    }
    }

    // READ single
    public function getSingleproduit()
    {
        $sqlQuery = "SELECT
                        id_produit, 
                       lib_produit, 
                         prix_produit, 
                         img_produit,
                        id_cat,
                        description, 
                         mail_admin
       
                         
                        
                      FROM
                        " . $this->db_table . "
                    WHERE 
                      id_produit = ?";
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->bind_param('i', $this->id_produit);
        $stmt->execute();
              $id_produit = 0;
                  $lib_produit = '';
                  $prix_produit = 0;
                  $description = '';
                  $img_produit = '';
                  $id_cat = '';
                  $mail_admin = '';
         $stmt->bind_result($id_produit,$lib_produit,$prix_produit,$img_produit,$id_cat,$description,$mail_admin);
         $dataRow = $stmt->fetch();
         $this->id_produit = $id_produit;
         $this->lib_produit = $lib_produit;
         $this->prix_produit = $prix_produit;
         $this->description = $description;
         $this->img_produit = $img_produit;
         $this->id_cat = $id_cat;

       }

    // UPDATE
    public function updateproduit()
    {
        $sqlQuery = "UPDATE produit SET lib_produit=?,prix_produit=?,img_produit=?,id_cat=?,description=?,mail_admin=? WHERE id_produit = ?";
        $stmt = $this->conn->prepare($sqlQuery);
        // bind data
        $stmt->bind_param('sdsissi', $this->lib_produit,$this->prix_produit,$this->img_produit,$this->id_cat,$this->description,$this->mail_admin,$this->id_produit,);

        if ($stmt->execute()) {
            return $this->id_produit;
        }
        return false;
    }

    // DELETE
    function deleteEmployee()
    {
        $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE id_produit = ?";
        $stmt = $this->conn->prepare($sqlQuery);

        $this->id_produit = htmlspecialchars(strip_tags($this->id_produit));

        $stmt->bindParam(1, $this->id_produit);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}

?>