<h2>使用函式來印出星星</h2>
<pre>
<?php
stars(3);
stars(6);
stars(9);
stars(12);
stars(15);

function stars($size)
{
    for ($i = 1; $i <= $size; $i++) {

        for ($k = 1; $k <= ($size - $i); $k++) {
            echo "&nbsp;";
        }

        for ($j = 1; $j <= (2 * $i - 1); $j++) {
            echo "*";
        }
        echo "<br>";
    }
}
?>
</pre>