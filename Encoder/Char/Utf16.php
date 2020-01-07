<?php

/*
 * This file is part of the Iphpjs package.
 *
 * (c) NetworkRanger <admin@iphpjs.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Iphpjs\Encoder\Char;

use Iphpjs\Contract\EncoderInterface;

class Utf16 implements EncoderInterface
{

    public function encode(string $string): string
    {
        return \iconv('UTF-8', 'UTF-16', $string);
    }

    public function decode(string $string): string
    {
        return \iconv('UTF-16', 'UTF-8', $string);
    }
}