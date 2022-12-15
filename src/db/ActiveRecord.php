<?php

interface ActiveRecord{

    public function save():bool;
    public function delete():bool;
    public static function find($id):Object;
    public static function findall():array;
}

?>