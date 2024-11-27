<?php
class Manufacture extends Db
{
    public function getAllManu()
    {
        $sql = self::$connection->prepare("SELECT * FROM `manufactures`");
        $sql->execute();
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }

    public function getManuNameByID($manu_id)
    {
        $sql = self::$connection->prepare("SELECT * FROM `manufactures` WHERE `manu_id`=?");
        $sql->bind_param("i", $manu_id);
        $sql->execute();
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }
}
