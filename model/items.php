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
    public function getAllNewProduct()
    {
        $sql = self::$connection->prepare("SELECT * FROM `products` ORDER BY `created_at` DESC");
        $sql->execute();
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }
    public function getNewProduct($page, $count)
    {
        $start = ($page - 1) * $count;
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
        WHERE `description` LIKE ? ");
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
        WHERE `description` LIKE ?
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
    public function getFeaturedItemByManu($manu_id,$start, $count)
    {
        $sql = self::$connection->prepare("SELECT * FROM `products`
        WHERE `feature`=1 And `manu_id` = ?
        ORDER BY `created_at` DESC
        LIMIT ?,? ");
        $sql->bind_param("iii",$manu_id, $start, $count);
        $sql->execute();
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }
    public function getAllProductsByManu($manu_id)
    {
        $sql = self::$connection->prepare("SELECT * FROM `products`
        WHERE `manu_id` = ? ");
        $sql->bind_param("i", $manu_id);
        $sql->execute();
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }
    public function getProductsByManu($manu_id, $page, $count)
    {
        $start = ($page - 1) * $count;
        $sql = self::$connection->prepare("SELECT * FROM `products`
        WHERE `manu_id` = ? 
         LIMIT ?,? ");
        $sql->bind_param("iii", $manu_id, $start, $count);
        $sql->execute();
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }

    function paginate($url, $total, $count, $currentPage)
    {
    $totalLinks = ceil($total / $count); // Tổng số trang
    $pagination = "";

    // Hiển thị nút "Trước"
    if ($currentPage > 1) {
        $prevPage = $currentPage - 1;
        $pagination .= "<a href='$url?page=$prevPage'  style='margin: 0 5px;'> Trước </a>";
    }

    // Hiển thị các trang
    for ($j = 1; $j <= $totalLinks; $j++) {
        if ($j == $currentPage) {
            // Trang hiện tại
            $pagination .= "<span  style='margin: 0 5px;'> $j </span>";
        } else {
            $pagination .= "<a href='$url?page=$j'  style=' margin: 0 5px;'> $j </a>";
        }
    }

    // Hiển thị nút "Sau"
    if ($currentPage < $totalLinks) {
        $nextPage = $currentPage + 1;
        $pagination .= "<a href='$url?page=$nextPage'  style='margin: 0 5px;'> Sau </a>";
    }

    return $pagination;
    }
    function paginateCoTuKhoa($url, $total, $count, $currentPage)
    {
        $totalLinks = ceil($total / $count); // Tổng số trang
        $pagination = "";
    
        // Hiển thị nút "Trước"
        if ($currentPage > 1) {
            $prevPage = $currentPage - 1;
            $pagination .= "<a href='$url&page=$prevPage' style=' margin: 0 5px;'> Trước </a>";
        }
    
        // Hiển thị các trang
        for ($j = 1; $j <= $totalLinks; $j++) {
            if ($j == $currentPage) {
                // Trang hiện tại
                $pagination .= "<span style='margin: 0 5px; '> $j </span>";
            } else {
                $pagination .= "<a href='$url&page=$j' style='margin: 0 5px; '> $j </a>";
            }
        }
    
        // Hiển thị nút "Sau"
        if ($currentPage < $totalLinks) {
            $nextPage = $currentPage + 1;
            $pagination .= "<a href='$url&page=$nextPage' style=' margin: 0 5px; '> Sau </a>";
        }
    
        return $pagination;
    }
}
