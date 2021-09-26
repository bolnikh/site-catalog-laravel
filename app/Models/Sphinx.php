<?php

namespace App\Models;

use PDO;
use phpDocumentor\Reflection\Types\Integer;


class Sphinx {

    private $conn;
    private $index;

    public function __construct()
    {
        $this->conn = new PDO('mysql:host='
            .config('sphinx.host')
            .';port='
            .config('sphinx.port').';', '', '', array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ));

        $this->index = config('sphinx.index');
    }

/*
    public function getTotal($query) {
        $str = $this->prepareStr($query);

        $sql = "SELECT COUNT(*) AS total
                FROM {$this->index}
                WHERE MATCH('$str')
                ";

        $row = $this->conn->query($sql)->fetch();

        return $row['total'];
    }
*/
    public function getResult($query) {
        $str = $this->prepareStr($query);

        $sql = "SELECT id
                FROM {$this->index}
                WHERE MATCH('$str')
                LIMIT 500
                ";

        $rows = $this->conn->query($sql)->fetchAll();

        foreach ($rows as $row) {
            $ids[] = (int)$row['id'];
        }

        return $ids;
    }


    public function quote($var) {
        return $this->conn->quote($var);
    }


    private function prepareStr($str) {
        $str = str_replace(array('"', "'"), ' ', $str);
        $str = preg_replace("/\s{2,}/"," ", $str);
        $str = trim($str);
        //$str = str_replace(' ', '|', $str);
        //$str = '"'.$str.'"/1';

        return $str;
    }
}
