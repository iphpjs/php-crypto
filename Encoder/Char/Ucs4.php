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

class Ucs4 implements EncoderInterface
{

    public function encode(string $string): string
    {
        return \iconv('UTF-8', 'UCS-4', $string);
    }

    public function decode(string $string): string
    {
        $arr = \explode("\n", \wordwrap(\bin2hex($string), 8, "\n", true));
        $str = '';
        foreach ($arr as $value) {
            $str .= '\u' . \substr($value, 4);
        }

        $str = \sprintf('{"decode": "%s"}', $str);
        return \json_decode($str, true)['decode'];
    }
}