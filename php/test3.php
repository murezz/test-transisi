<html>

<body>
    <form action="" method="post">
        Maskkan nama <input type="text" name="input"><br>
        <button type="submit">Submit</button>
    </form>
</body>

</html>

<?php

error_reporting(0);

function generateUBT($input)
{
    $arr_input = explode(' ', $input);

    // unigram
    $unigram = '';
    foreach ($arr_input as $item) {
        $unigram .= $item . ', ';
    }
    $unigram = substr($unigram, 0, -2);

    // bigram
    $x = 0;
    $bigram = '';
    foreach ($arr_input as $item) {
        if ($x < 1) {
            $bigram .= $item . ' ';
            $x++;
        } else {
            $bigram .= $item . ', ';
            $x = 0;
        }
    }
    $bigram = substr($bigram, 0, -2);

    // trigram
    $y = 0;
    $trigram = '';
    foreach ($arr_input as $item) {
        if ($y < 2) {
            $trigram .= $item . ' ';
            $y++;
        } else {
            $trigram .= $item . ', ';
            $y = 0;
        }
    }
    $trigram = substr($trigram, 0, -2);


    $result = 'Unigram : ' . $unigram . '<br>';
    $result .= 'Bigram : ' . $bigram . '<br>';
    $result .= 'Trigram : ' . $trigram;

    return $result;
}

$input = $_POST['input'];

echo generateUBT($input);
