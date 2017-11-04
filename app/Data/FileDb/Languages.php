<?php
/**
 * Created by PhpStorm.
 * User: tsamsiyu
 * Date: 05.11.17
 * Time: 0:01
 */

namespace App\Data\FileDb;


class Languages
{
    const EN = 1;
    const RU = 2;

    public static function getMap()
    {
        return [
            [
                'id' => self::EN,
                'name' => 'English'
            ],
            [
                'id' => self::RU,
                'name' => 'Russian'
            ]
        ];
    }
}