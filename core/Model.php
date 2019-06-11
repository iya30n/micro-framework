<?php
namespace App\Core;

use App\Core\App;

class Model
{
    protected static $table;

    public static function all()
    {
        return App::get('database')->selectAll(static::$table);
    }

    public static function create($values)
    {
        App::get('database')->insert(static::$table, $values);
    }

    public static function find($id)
    {
        return App::get('database')->find(static::$table, $id);
    }

    public static function where($key, $value)
    {
        return App::get('database')->where(static::$table, $key, $value);
    }

    public static function update($id, $values)
    {
        App::get('database')->update(static::$table, $id, $values);
    }

    public static function delete($id)
    {
        App::get('database')->delete(static::$table, $id);
    }
}
