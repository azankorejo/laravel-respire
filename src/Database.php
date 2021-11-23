<?php

namespace azankorejo\Respire;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class Database
{
    public function checkColumnExist($myTable, $column)
    {
        if (Schema::hasColumn($myTable, $column)) return true;
        return false;
    }

    public function updateColumn($table, $columns,$condition,$conditionVal)
    {
        try {
            DB::table($table)
                ->where($condition,$conditionVal)
                ->update($columns);
            return true;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public static function userTables() : array
    {
        $models = config("respire.password.models");
        if(gettype($models) === 'array' && count($models) > 0) {
            return (array)$models;
        }
        return [];
    }
}