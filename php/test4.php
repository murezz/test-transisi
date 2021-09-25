<html>

<body>

    <table width="300" height="200" style="text-align:center;">
        <?php

        $a = 1;

        for ($i = 0; $i < 8; $i++) {
            echo "<tr>";
            for ($t = 0; $t < 8; $t++) {

                if ($a == 1 || $a == 2 || $a == 5 || $a == 7 || $a == 10 || $a == 11 || $a == 13 || $a == 14 || $a == 17 || $a == 19 || $a == 22 || $a == 23 || $a == 25 || $a == 26 || $a == 29 || $a == 31 || $a == 34 || $a == 35 || $a == 37 || $a == 38 || $a == 41 || $a == 43 || $a == 46 || $a == 46 || $a == 47 || $a == 49 || $a == 50 || $a == 53 || $a == 55 || $a == 58 || $a == 59 || $a == 61 || $a == 62) {

                    echo "<td style='background-color:#000000;color: #fff'>" . $a . "</td>";
                } else {
                    echo "<td>" . $a . "</td>";
                }


                $a++;
            }
            echo "</tr>";
        }




        ?>


    </table>
</body>

</html>