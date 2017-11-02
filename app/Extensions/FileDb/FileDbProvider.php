<?php
/**
 * Created by PhpStorm.
 * User: tsamsiyu
 * Date: 02.11.17
 * Time: 22:41
 */

namespace App\Extensions\FileDb;

use Illuminate\Support\ServiceProvider;

class FileDbProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app->singleton(FileDbManager::class);
    }
}