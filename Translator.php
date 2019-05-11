<?php
$input = 'cantik';

$all_words = array();
//Get all words in word file 
$fn = fopen("Indo-English.txt","r");
    while(! feof($fn))  {
	    $result = fgets($fn);
        // echo $result."</br>";
        $split_words = preg_split ("[\s]", $result);
        for ($i = 0; $i < count($split_words); $i++) {
            // $value = $split_words[$i];
            array_push($all_words,  $split_words[$i]);
        }
    }
fclose($fn);
$word = array_search("$input", $all_words);
$translate = indo_to_english($word);
$translated_word = $all_words[$translate];

echo $translated_word;

function indo_to_english($tword){
    $translated = $tword + 1;
    return $translated;
}

?>