<?php
/**
 * Created by PhpStorm.
 * User: tsamsiyu
 * Date: 05.11.17
 * Time: 0:13
 */

namespace App\Data\FileDb;


class LanguageParts
{
    public static function getMap()
    {
        return [
            [
                'id' => 1,
                'name' => 'Verb'
            ],
            [
                'id' => 2,
                'name' => 'Noun'
            ],
            [
                'id' => 3,
                'name' => 'Adjective'
            ],
            [
                'id' => 4,
                'name' => 'Pronoun'
            ],
            [
                'id' => 5,
                'name' => 'Union'
            ],
            [
                'id' => 6,
                'name' => 'Preposition'
            ]
        ];
    }
}