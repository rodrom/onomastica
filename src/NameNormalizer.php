<?php

/**
 * This file is part of the rodrom/onomastica package.
 *
 * (c) rodrom <https://github.com/rodrom>
 *
 * Licensed under the MIT License. See the LICENSE file for details.
 */

namespace Rodrom\Onomastica;

class NameNormalizer
{
    protected static array $connectors = [
        // SPANISH
        'de', 'del', 'el', 'la', 'las', 'los', 'y',
        // CATALAN
        'dels', 'el', 'els', 'i', 'les',
        // GALLEGO, PORTUGUES
        'da', 'do', 'das', 'dos',
        // OTHER LANGUAGES
        // OTHER ROMAN DERIVATIVE LANGUAGES
        'des', 'du', 'di', 'le',
        // GERMANIC
        'von', 'van',
    ];

    public static function normalize(string $name): string
    {
        $name = static::normalizeApostrophes($name);
        $name = trim(preg_replace('/\s+/', ' ', $name));

        $parts = explode(' ', mb_strtolower($name, 'UTF-8'));

        $normalized = array_map(function ($word) {
            if (preg_match('/^([dl])[\'´`"’](.+)$/u', $word, $m)) {
                $prefix = mb_strtolower("{$m[1]}’", 'UTF-8');
                $rest = mb_convert_case($m[2], MB_CASE_TITLE, 'UTF-8');
                return $prefix . $rest;
            }

            if (in_array($word, static::$connectors, true)) {
                return $word;
            }

            return mb_convert_case($word, MB_CASE_TITLE, 'UTF-8');
        }, $parts);

        return implode(' ', $normalized);
    }

    protected static function normalizeApostrophes(string $text): string
    {
        // Normalize apostophres
        $text = str_replace(['´', '`', "'", '‘', '’'], '’', $text);
        // Delete extra inner whites after contractions like "d’  Amato" or "l’  Estat"
        $text = preg_replace("/([dl])’\s+(\p{L})/ui", '$1’$2', $text);

        // Delete extra inner white before contractions like "d  ’Amato" or "l    ’Estat"
        $text = preg_replace("/([dl])\s+’(\p{L})/ui", '$1’$2', $text);

        return $text;
    }
}
