<?php

/*
 * This file is part of the Iphpjs package.
 *
 * (c) NetworkRanger <admin@iphpjs.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Iphpjs\Code;

use Iphpjs\Contract\CodeInterface;

class Hex implements CodeInterface
{

    public function encode(string $string): string
    {
        return \bin2hex($string);
    }

    public function decode(string $string): string
    {
        return \hex2bin($string);
    }
}