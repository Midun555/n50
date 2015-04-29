<?php

class UploaderModel extends Model
{

    public function validateUpload($file)
    {
        if ( $file['error'] != 0 )
        {
            return array(
                'error' => 1,
                'message' => 'error occured during upload [' . $file['error'] . ']'
            );
        }

        if ( $file['size'] == 0 )
        {
            return array(
                'error' => 1,
                'message' => 'file size is 0'
            );
        }

        if ( !in_array($file['type'], array('text/csv','application/vnd.ms-excel')) )
        {
            return array(
                'error' => 1,
                'message' => 'invalid file type [' . $file['type'] . ']'
            );
        }

        return array(
            'error' => 0
        );
    }


    public function processUpload($filename)
    {
        ini_set('auto_detect_line_endings', true);

        if ( ($fh = fopen($filename, 'r')) === FALSE )
        {
            return array(
                'error' => 1,
                'message' => 'file could not be opened'
            );
        }

        $categories_array = array();

        $i = 1;

        while ( ($row = fgetcsv($fh)) !== FALSE )
        {
            if ( $i == 1 )
            {
                $this->_setColumnMapping($row);
                $i++;
                continue;
            }
            $row = $this->_setKeysToColumns($row);

            $row['slug'] = $this->_generateSlug($row['name']);

            if ( $this->_skuFoundInDb($row['sku']) )
            {
                $sql = "UPDATE `" . self::PRODUCTS . "`
                        SET " . $this->prepareUpdateString($row) . "
                        WHERE `sku` = '" . $row['sku'] . "'";
                $this->db->query($sql);
            }
            else
            {
                $row['timestamp_created'] = date('Y-m-d H:i:s');

                $sql = "INSERT INTO `" . self::PRODUCTS . "` " .
                        $this->prepareInsertString($row);
                $id = $this->db->query($sql);
            }

            $categories_array = array_merge(
                $categories_array,
                explode(';', $row['categories'])
            );

            $i++;
        }

        $this->_processCategories($categories_array);

        return array(
            'error' => 0
        );
    }


    private function _setColumnMapping($row)
    {
        foreach ( $row as $key => $value )
        {
            $this->column_mapping[trim($value)] = $key;
        }
    }


    private function _setKeysToColumns($row)
    {
        $return_array = array();

        foreach ( $this->column_mapping as $column => $key )
        {
            if ( isset($row[$key]) )
                $return_array[$column] = $row[$key];
        }

        return $return_array;
    }


    private function _generateSlug($name)
    {
        $slug = preg_replace('/[^\da-z]/i', '-', $name);
        $slug = str_replace(array('---','--'), '-', $slug);
        $slug = strtolower($slug);
        $slug = rtrim($slug, '-');

        return $slug;
    }


    private function _skuFoundInDb($sku)
    {
        $sql = "SELECT *
                FROM `" . self::PRODUCTS . "`
                WHERE `sku` = '" . $sku . "'
                LIMIT 1";
        $result = $this->db->query($sql);

        return ( empty($result) ) ? false : true;
    }


    private function _processCategories($categories)
    {
        $categories = array_unique($categories);

        array_unshift($categories, 'all');

        $sql = "TRUNCATE TABLE `" . self::CATEGORIES . "`";
        $id = $this->db->query($sql);

        foreach ( $categories as $category )
        {
            $data = array(
                'name'              => $category,
                'slug'              => $this->_generateSlug($category),
                'timestamp_created' => date('Y-m-d H:i:s')
            );

            $sql = "INSERT INTO `" . self::CATEGORIES . "` " .
                    $this->prepareInsertString($data);
            $id = $this->db->query($sql);
        }
    }

}