<?php
// Qui dit fonctions, dit qu'on doit avoir un namesapce
namespace Core\Helpers;

function truncate (string $string, int $lg_max = 100): string {
    if (strlen($string) > $lg_max) {
        $string = substr($string, 0, $lg_max);
        $last_space = strrpos($string, " ");
        return substr($string, 0, $last_space) . "...";
    }
    return $string;
}
