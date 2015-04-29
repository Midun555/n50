<?php

class CategoryModel extends Model
{

    public function getLinks()
    {
        $sql = "SELECT `name`,`slug`
                FROM `" . self::CATEGORIES . "`
                WHERE `status` = 1";
        $result = $this->db->query($sql);

        return $result;
    }


    public function getNameFromSlug($slug)
    {
        $sql = "SELECT `name`
                FROM `" . self::CATEGORIES . "`
                WHERE
                    `slug` = '" . $slug . "' AND
                    `status` = 1
                LIMIT 1";
        $result = $this->db->query($sql);

        return ( empty($result) ) ? false : $result[0]['name'];
    }

}