<?php
namespace App\Services\Util;

/**
 * Class UtilRegExp
 */
class UtilRegExp
{
    /**
     * @param string $text
     * @return mixed
     */
    public function getIdsNum(string $text) {
        preg_match_all('/@\[.*?\]\(.*?-(\d+)\)/', $text, $output_array);
        return $output_array[1];
    }

    /**
     * @param string $text
     * @param string $textReplace
     * @return array|string|string[]|null
     */
    public function replaceIdfor(string $text, string $textReplace) {
        return preg_replace('/@\[(.*?)\]\(user-gpe-\d+\)/', $textReplace, $text);
    }
}