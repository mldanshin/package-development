<?php

namespace Danshin\Development\Services;

final class LangRepository
{
    public static function get(LangType $langType, string $keys): string
    {
        $arrayKeys = explode(".", $keys);

        $arrayKeysCount = count($arrayKeys);
        if ($arrayKeysCount < 2) {
            throw new \Exception("Invalid key length.");
        }

        $array = explode("/", __DIR__);
        array_pop($array);
        array_pop($array);

        $path = implode("/", $array);

        $array = require "$path/resources/lang/$langType->value/" . $arrayKeys[0] . ".php";

        for ($i = 1; $i < $arrayKeysCount; $i++) {
            $array = $array[$arrayKeys[$i]];
        }

        return $array;
    }
}
