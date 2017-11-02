<?php
/**
 * Created by PhpStorm.
 * User: tsamsiyu
 * Date: 02.11.17
 * Time: 22:43
 */

namespace App\Extensions\FileDb;


use Illuminate\Support\Facades\Facade;

class FileDb extends Facade
{
    public static function getFacadeAccessor()
    {
        return app(FileDbManager::class);
    }
}