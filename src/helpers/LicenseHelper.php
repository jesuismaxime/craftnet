<?php

namespace craftcom\helpers;

class LicenseHelper
{
    /**
     * Generates a new license key.
     *
     * @param int $length
     * @param string $extraChars
     * @return string
     */
    public static function generateKey(int $length, string $extraChars = ''): string
    {
        $licenseKey = '';

        $codeAlphabet = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'.$extraChars;
        $alphabetLength = strlen($codeAlphabet);
        $log = log($alphabetLength, 2);
        $bytes = (int)($log / 8) + 1; // length in bytes
        $bits = (int)$log + 1; // length in bits
        $filter = (int)(1 << $bits) - 1; // set all lower bits to 1

        for ($i = 0; $i < $length; $i++) {
            do {
                $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
                $rnd = $rnd & $filter; // discard irrelevant bits
            } while ($rnd >= $alphabetLength);

            $licenseKey .= $codeAlphabet[$rnd];
        }

        return $licenseKey;
    }

}
