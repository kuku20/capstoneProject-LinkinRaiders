<?php

/* IEEE Reference Ciatation Format according to Wikihow:
*  BraveCoderYT[1]language-translator-php(2021)[Source code].https://github.com/BraveCoderYT/language-translator-php
*/
require_once 'vendor/autoload.php';

use Stichoza\GoogleTranslate\GoogleTranslate;

$lang_one = $_POST['lang_one'];
$lang_two = $_POST['lang_two'];
$text = $_POST['text'];

if ($lang_one == "Auto_Detect") {
    $tr = new GoogleTranslate($lang_two);

    $text = $tr->translate($text);

    echo GoogleTranslate::trans($text, $lang_two, $lang_one);
}
else{
    echo GoogleTranslate::trans($text, $lang_two, $lang_one);
    
}
?>