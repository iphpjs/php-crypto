<?php

/*
 * This file is part of the Iphpjs package.
 *
 * (c) NetworkRanger <admin@iphpjs.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Iphpjs\Encoder;

use Iphpjs\Contract\EncoderInterface;

class RawUrl implements EncoderInterface
{

    public function encode(string $string): string
    {
        return \rawurlencode($string);
    }

    public function decode(string $string): string
    {
        return \rawurldecode($string);
    }
}