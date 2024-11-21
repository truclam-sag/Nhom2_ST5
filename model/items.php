<?php
class Product extends Db
{
    public function getAllProducts()
    {
        $sql = self::$connection->prepare("SELECT * FROM `products`");
        $sql->execute();
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }
    public function getNewProduct($start, $count)
    {
        $sql = self::$connection->prepare("SELECT * FROM `products` ORDER BY `created_at` DESC LIMIT ?,? ");
        $sql->bind_param("ii", $start, $count);
        $sql->execute();
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }
    public function searchAll($keyword)
    {
        $sql = self::$connection->prepare("SELECT * FROM `products`
        WHERE `name` LIKE ? ");
        $keyword = "%$keyword%";
        $sql->bind_param("s", $keyword);
        $sql->execute();
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }
    public function search($keyword, $page, $count)
    {
        $start = ($page - 1) * $count;
        $sql = self::$connection->prepare("SELECT * FROM `products`
        WHERE `name` LIKE ?
        LIMIT ?,? ");
        $keyword = "%$keyword%";
        $sql->bind_param("sii", $keyword, $start, $count);
        $sql->execute();
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }
    public function getFeaturedItem($start, $count)
    {
        $sql = self::$connection->prepare("SELECT * FROM `products`
        WHERE `feature`=1
        ORDER BY `created_at` DESC
        LIMIT ?,? ");
        $sql->bind_param("ii", $start, $count);
        $sql->execute();
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }
}
