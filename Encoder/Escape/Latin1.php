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

class Latin1 implements EncoderInterface
{
    public function encode(string $string): string
    {
        \preg_match_all('/./', $string, $matches);

        $str = '';
        foreach ($matches[0] as $m) {
            $str .= '\x' . bin2hex($m);
        }
        return $str;
    }

    public function decode(string $string): string
    {
        return hex2bin(\str_replace('\x', '', $string));
    }
}