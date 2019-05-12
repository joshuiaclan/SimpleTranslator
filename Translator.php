<!DOCTYPE html>
<?php
$t = @$_GET["translate"];
?>
<html>
<head>
    <title>Simple Translator</title>
    <script src="main.js"></script>
    <link rel="stylesheet" href="custom.css">
</head>
<body>
    <div class="container text-center mt-5">
        <form method="GET">
          <div class="row form-group mx-sm-3 mb-2">
            <input type="text" class="col-9 form-control" name="translate" value="<?php echo $t;?>">
            <input type="submit" class="col-3 btn btn-primary" value="translate">
        </form>
    </div>
</body>
</html>
<?php
    // Arrays
    $all_words = array();
    $sentence = array();
    // word
    $input = @$_GET["translate"];
    $word_count = str_word_count($input);   

    //Get all words in word file 
    $fn = fopen("Indo-English.txt","r");
        while(! feof($fn))  {
            $result = fgets($fn);
            $split_words = preg_split ("[\s]", $result);
            for ($i = 0; $i < count($split_words); $i++) {
                array_push($all_words,  $split_words[$i]);
            }
        }
    fclose($fn);
    if ($word_count > 1){
        $sentence = preg_split ("[\s]", $input);
        for ($i = 0; $i < count($sentence); $i++) {
            $word = array_search($sentence[$i], $all_words);
            $translate = indo_to_english($word);
            $translated_word = $all_words[$translate];
            echo " ".$translated_word;
        }
    } else {
    // find word
        $word = array_search("$input", $all_words);
        if($word == null){
            echo "$input";
        } else {
            $translate = indo_to_english($word);
            $translated_word = $all_words[$translate];
            echo "</br>Translated word: ".$translated_word;
        }
    }
    // functions
    function indo_to_english($tword){
        $translated = $tword + 1;
        return $translated;
    }
?>