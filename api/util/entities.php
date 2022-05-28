<?php
require_once __DIR__ . "/../connection.php";

function getEntities($limit=0){
    $db = getConnection();

    $limitSQL = $limit>0 ? "LIMIT $limit" : "";

    $stmt = $db->prepare("SELECT
                            *
                            FROM `ENTIDADES`
                            ORDER BY ID DESC 
                            $limitSQL;");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
}
function getEntitiesBy($field, $value, $limit=0){
    $db = getConnection();

    $limitSQL = $limit>0 ? "LIMIT $limit" : "";

    $stmt = $db->prepare("SELECT
                            *
                            FROM `ENTIDADES`
                            WHERE ${field}=:VAL
                            ORDER BY ID DESC 
                            $limitSQL;");
    $stmt->bindValue(":VAL", $value, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
}
function deleteEntity($entity){
    $db = getConnection();
    $stmt = $db->prepare("DELETE FROM `ENTIDADES` WHERE ID=:ID;");
    $stmt->bindValue(":ID", $entity->ID, PDO::PARAM_INT);
    return $stmt->execute();
}
function insertEntity($entity, $fields){
    $db = getConnection();
    if ($fields) {
        $query = "INSERT INTO `ENTIDADES` SET ";
        foreach ($fields as $i => $field) {
            $query .= "`$field`=:$field";
            if($i<count($fields)-1){
                $query .= ", ";
            } else {
                $query .= ";";
            }
        }
        $stmt = $db->prepare($query);
        foreach ($fields as  $field) {
            $stmt->bindValue(":$field", $entity->$field, PDO::PARAM_STR);
        }
        $stmt->execute();
        $rsp = new stdClass;
        $rsp->ID = $db->lastInsertId();
        return $rsp;
    }
    return False;    
}
function updateEntity($entity, $fields){
    $db = getConnection();
    if ($fields) {
        $query = "UPDATE `ENTIDADES` SET ";
        foreach ($fields as $i => $field) {
            $query .= "`$field`=:$field";
            if($i<count($fields)-1){
                $query .= ", ";
            }
        }
        $query .= " WHERE ID=:ID;";
        $stmt = $db->prepare($query);
        foreach ($fields as  $field) {
            $stmt->bindValue(":$field", $entity->$field, PDO::PARAM_STR);
        }
        $stmt->bindValue(":ID", $entity->ID, PDO::PARAM_STR);
        $stmt->execute();
        return True;
    }
    return False;
}