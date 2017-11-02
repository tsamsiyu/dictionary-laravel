<?php
/**
 * Created by PhpStorm.
 * User: tsamsiyu
 * Date: 02.11.17
 * Time: 22:37
 */

namespace App\Extensions\FileDb;


class FileDbManager
{
    private $_cache = [];

    public function getPath($name)
    {
        return app_path('Data/' . $name . '.php');
    }

    /**
     * @param $name
     * @return mixed
     */
    public function getData($name)
    {
        if (!array_key_exists($name, $this->_cache)) {
            $path = $this->getPath($name);
            /** @noinspection PhpIncludeInspection */
            $this->_cache[$name] = include $path;
        }
        return $this->_cache[$name];
    }

    public function collectData($name)
    {
        return collect($this->getData($name));
    }

/*    public function getModels()
    {

    }

    public function collectModels()
    {

    }*/
}