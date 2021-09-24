<!DOCTYPE html>
<html lang="en">

<body>

    <form action="" method="post">
        Maskkan nama <input type="text" name="input"><br>
        <input type="submit">
    </form>

</body>

</html>


<?php
error_reporting(0);

$input = $_POST['input'];

function count_lowercase($str)
{
    echo preg_match_all("/[a-z]/", $str);
}

if (isset($input) > 0) {
    echo "<br>";
    echo $input . ' ' . "mengandung" . ' ';
    count_lowercase($input);
    echo ' ' . "buah huruf kecil";
} else {
    echo "";
}
