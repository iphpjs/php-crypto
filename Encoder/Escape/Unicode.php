<?php

/*
 * This file is part of the Iphpjs package.
 *
 * (c) NetworkRanger <admin@iphpjs.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Iphpjs\Encoder\Escape;

use Iphpjs\Contract\EncoderInterface;

class Unicode implements EncoderInterface
{
    public function encode(string $string): string
    {
        \preg_match_all('/./u', $string, $matches);

        $str = '';
        foreach ($matches[0] as $m) {
            $str .= '\u' . \substr(\bin2hex(\iconv('UTF-8', 'UCS-4', $m)), 4);
        }
        return $str;
    }

    public function decode(string $string): string
    {
        $str = \sprintf('{"decode": "%s"}', $string);
        return \json_decode($str, true)['decode'];
    }
}