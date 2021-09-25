<html>

<body>
    <form action="" method="post">
        Masukkan nama <input type="text" name="input"><br>
        <button type="submit">Submit</button>
    </form>
</body>

</html>

<?php

error_reporting(0);

function enkripsi($text)
{
    $alphabet    = range("A", "Z");
    $text        = strtoupper($text);
    $textCount    = strlen($text);
    $result        = [];
    for ($i = 0; $i < $textCount; $i++) {
        if ($i % 2 === 0) {
            $result[] = $alphabet[$i + 1 + array_search($text[$i], $alphabet)];
        } else {
            $result[] = $alphabet[array_search($text[$i], $alphabet) - ($i + 1)];
        }
    }
    return implode("", $result);
}

$input = $_POST['input'];

echo enkripsi($input);
