<?php

class ExporterModel extends Model
{

    public $csv_columns = array(
        'name',
        'sku',
        'price',
        'description',
        'categories',
        'build_time',
        'builder',
        'featured',
        'status'
    );


    public function processExport()
    {
        $columns = '`' . implode('`,`', $this->csv_columns) . '`';

        $sql = "SELECT " . $columns . "
                FROM `" . self::PRODUCTS . "`";

        $result = $this->db->query($sql);

        $this->_forceDownload($result);
    }


    private function _forceDownload($products)
    {
        $filename  = 'n50-products-export.csv';

        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Content-Description: File Transfer');
        header("Content-type: text/csv");
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        header('Expires: 0');
        header('Pragma: public');

        $fh = fopen('php://output', 'w');

        fputcsv($fh, $this->csv_columns);

        foreach ( $products as $product )
        {
            fputcsv($fh, $product);
        }

        fclose($fh);
        exit();
    }

}