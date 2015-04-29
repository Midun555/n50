<?php

class ProductModel extends Model
{

    public function getCollection($category)
    {
        $sql = "SELECT *
                FROM `" . self::PRODUCTS . "`
                WHERE `status` = 1";

        if ( $category != 'all' )
                $sql .= " AND `categories` LIKE '%" . $category . "%'";

        $result = $this->db->query($sql);

        for ( $i = 0; $i < count($result); $i++ )
        {
            $result[$i]['image'] = $this->getImages($result[$i]['sku'], true);
        }

        return $result;
    }


    public function getData($slug)
    {
        $sql = "SELECT *
                FROM `" . self::PRODUCTS . "`
                WHERE
                    `slug` = '" . $slug . "' AND
                    `status` = 1
                LIMIT 1";
        $result = $this->db->query($sql);

        if ( empty($result) )
            return false;

        $result = $result[0];

        $result['images'] = $this->getImages($result['sku']);

        $result['related_products'] = $this->_getRelatedProducts($result['id']);

        return $result;
    }


    public function getImages($sku, $single = false)
    {
        if ( $single )
        {
            if ( file_exists('media/products/' . $sku . '_main.jpg') )
            {
               return '/media/products/' . $sku . '_main.jpg';
            }
            else
            {
                return '/media/products/placeholder.jpg';
            }
        }
        else
        {
            $images = glob('media/products/' . $sku . '_*.jpg');

            if ( empty($images) )
                return array('/media/products/placeholder.jpg');

            $return_array = array();

            foreach ( $images as $image )
            {
                $return_array[] = '/' . $image;
            }

            return $return_array;
        }
    }


    private function _getRelatedProducts($id)
    {
        $sql = "SELECT *
                FROM `" . self::PRODUCTS . "`
                WHERE
                    `id` != '" . $id . "' AND
                    `status` = 1
                ORDER BY RAND()
                LIMIT 4";

        $result = $this->db->query($sql);

        for ( $i = 0; $i < count($result); $i++ )
        {
            $result[$i]['image'] = $this->getImages($result[$i]['sku'], true);
        }

        return $result;
    }

}