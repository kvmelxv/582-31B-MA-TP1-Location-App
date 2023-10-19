<?php

class Crud extends PDO {

    public function __construct(){
        parent::__construct('mysql:host=localhost; dbname=e2395368; port=3306; charset=utf8', 'e2395368', 'v98WPmdZVlChAT7JtvhZ');
    }

    public function select($table, $field, $order){
        $sql="SELECT * FROM $table ORDER BY $field $order";
        $stmt = $this->query($sql);
        return $stmt->fetchAll();
    }

    public function selectId($table, $value, $field){
        $sql= "SELECT * FROM $table WHERE $field = '$value'";
        $stmt = $this->query($sql);
        $count = $stmt->rowCount();
        if($count == 1){
            return $stmt->fetch();
        }else{
            header('location:utilisateur-index.php');
        }  
    }

    public function selectUsersWithType($typeId) {
        $sql = "SELECT * FROM Utilisateur WHERE Type_idType = :typeId";
        $stmt = $this->prepare($sql);
        $stmt->bindParam(':typeId', $typeId);
        $stmt->execute();

        return $stmt->fetchAll();
    }
    

    public function insert($table, $data){

        $nomChamp = implode(", ",array_keys($data));
        $valeurChamp = ":".implode(", :", array_keys($data));

        $sql = "INSERT INTO $table ($nomChamp) VALUES ($valeurChamp)";
        $stmt = $this->prepare($sql);
        foreach($data as $key => $value){
            $stmt->bindValue(":$key", $value);
        }
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
     
    }

    
    public function delete($table, $value, $field){

        $sql = "DELETE FROM $table WHERE $field = :value";
        $stmt = $this->prepare($sql);
        $stmt->bindValue(":value", $value);
        $stmt->execute();
        header('location:utilisateur-index.php');
    }


    public function update($table, $data, $field) {
        $queryFields = [];
        foreach ($data as $key => $value) {
            $queryFields[] = "$key = :$key";
        }
        $setClause = implode(", ", $queryFields);
    
        $sql = "UPDATE $table SET $setClause WHERE $field = :$field";
    
        $stmt = $this->prepare($sql);
        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        $stmt->bindValue(":$field", $data[$field]);
        $stmt->execute();
    
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    public function validateFormDataUser($data) {

        if (empty($data['username']) || empty($data['nom']) || empty($data['prenom']) || empty($data['telephone']) || empty($data['courriel']) || empty($data['Type_idType'])) {
            return false;
        }

        return true;
    }

    public function validateFormDataApp($data) {

        if (empty($data['description']) || empty($data['adresse']) || empty($data['NombreChambre']) || empty($data['NombreSalleDeBain']) || empty($data['surface']) || empty($data['prix']) || empty($data['Utilisateur_Username'])) {
            return false;
        }

        return true;
    }

    public function validateFormDataBook($data) {

        if (empty($data['DateDebut']) || empty($data['DateFin'])) {
            return false;
        }

        return true;
    }

}

?>