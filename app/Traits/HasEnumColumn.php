<?php
namespace App\Traits;

use Illuminate\Support\Facades\DB;

trait HasEnumColumn
{
    public static function getEnumValues(string $column): array
    {
        $table = (new static)->getTable();

        $type = DB::selectOne("SHOW COLUMNS FROM {$table} WHERE Field = ?", [$column])->Type;

        preg_match('/^enum\((.*)\)$/', $type, $matches);

        if (!isset($matches[1])) {
            return [];
        }

        return array_map(fn($value) => trim($value, "'"), explode(',', $matches[1]));
    }
}
