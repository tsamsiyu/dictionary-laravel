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
    private $_modelsClassDir;
    private $_dataClassDir;

    public function __construct(string $dataClassDir = 'App\Data\FileDb',
                                string $modelsClassDir = 'App\Models\FileDb')
    {
        $this->_modelsClassDir = $modelsClassDir;
        $this->_dataClassDir = $dataClassDir;
    }

    public function getDataClass(string $name): string
    {
        return $this->_dataClassDir . '\\' . $name;
    }

    public function getModelsClass($name)
    {
        return $this->_modelsClassDir . '\\' . $name;
    }

    public function getData($name): array
    {
        $dataClass = $this->getDataClass($name);
        if (method_exists($dataClass, 'getMap')) {
            return $dataClass::getMap();
        }
        return [];
    }

    public function collectData($name)
    {
        return collect($this->getData($name));
    }

    public function getModels($name)
    {
        $data = $this->getData($name);
        $class = $this->getModelsClass($name);
        $res = [];
        foreach ($data as $item) {
            $object = new $class;
            $this->populateModelClass($object, $item);
            $res[] = $object;
        }
        return $res;
    }

    public function collectModels($name)
    {
        return collect($this->getModels($name));
    }

    private function populateModelClass($object, $data)
    {
        foreach ($data as $key => $val) {
            $object->$key = $val;
        }
    }
}