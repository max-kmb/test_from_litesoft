<?php
header('Content-Type: text/html; charset=utf-8');
error_reporting(E_ALL);
//$src_str = "Аргентина - манит негра";
//$src_str = "Пол-негра";
//$src_str = "Она в аду давно.";
$src_str = "'Пустите же!' - Летит супу миска Максиму. -
'Пустите же, летит суп!'";
//$src_str = "Sum, summus - mus";
$str_encoding = mb_detect_encoding($src_str);
if ($str_encoding == "UTF-8" ) {
    $str = mb_strtolower($src_str, $str_encoding);
} else {
    $str = strtolower($src_str);
}
$str=str_replace(" ", "", $str);
if ($str_encoding == "UTF-8") {
    $str=preg_replace("/[^а-я]/u", "", $str);
    $len_str = mb_strlen($str);
    $str_rev = utf8_strrev($str);
} else {
    $str=preg_replace("/[^a-z]/", "", $str);
    $len_str = strlen($str);
    $str_rev = strrev($str);
}
if (strcmp($str, $str_rev) == 0) {
    echo 'а) если строка является палиндромом,
    то она выводится полностью:'.'<br>'.$src_str.'<br>'.$str_rev.'<br>';
} else {
    $max_result = "";
    $len_strf = (($str_encoding == "UTF-8") ? $len_str/2 : $len_str);
    for ($k = 0; ($k+1) < $len_strf; ++$k) {
        for ($i = 0; ($i+1) < ($len_strf-$k); ++$i) {
            $target_str = mb_substr($str, $k, ($len_strf - $i - $k), $str_encoding);
            $str_rev = utf8_strrev($target_str);
            if (strcmp($target_str, $str_rev) == 0) {
                if ($str_encoding == "UTF-8") {
                    if (mb_strlen($target_str) > mb_strlen($max_result)) {
                        $max_result = $target_str;
                    }
                } else {
                    if (strlen($target_str) > strlen($max_result)) {
                        $max_result = $target_str;
                    }
                }
            }
        }
    }
}
if ($max_result != "") {
        echo 'б) если строка не является палиндромом - выводится
        самый длинный подпалиндром этой строки, т.е. самая длинная
        часть строки, являющаяся палиндромом: '.
        '<br>'.$src_str.'<br>'.$max_result.'<br>';
} else {
            echo 'в) если подпалиндромы отсутствуют в строке -
            выводится первый символ строки.'.'<br>'.
            '<br>'.$src_str.'<br>'.mb_substr($src_str, 0, 1, $str_encoding);
}
function utf8_strrev($str_function)
{
    preg_match_all('/./us', $str_function, $str_array);
    return join('', array_reverse($str_array[0]));
}
