<?php

/*
 * This file is part of the Iphpjs package.
 *
 * (c) NetworkRanger <admin@iphpjs.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */


use Iphpjs\Encoder\Escape\Unicode;

require __DIR__ . '/../vendor/autoload.php';

spl_autoload_register(function ($class) {
    $filename = dirname(__DIR__) . str_replace('\\', '/', substr($class, strpos($class, '\\'))) . '.php';
    if (file_exists($filename)) {
        require $filename;
        return;
    }
    $filename = dirname(__DIR__) . '/Contract/' . studly_case(class_basename($class)) . '.php';
    if (file_exists($filename)) {
        require $filename;
        return;
    }
});

$str = '1你好吗?';

echo json_encode($str), PHP_EOL;

$u = new Unicode();
$a = $u->encode($str);
$b = $u->decode($a);
echo $a, PHP_EOL;

//
//echo ord($str[0]),PHP_EOL;
//echo ord($str[1]),PHP_EOL;
//echo ord($str[2]),PHP_EOL;