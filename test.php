<?php
function getTime($name1, $name2)
{
    $start = microtime(true);
    $file1 = fopen($name1, 'w');
    $file2 = fopen($name2, 'w');
    for ($i = 0; $i <= 50000; $i++) {
        $num = random_int(1, 20);
        $text = "{$num}, ";
        fwrite($file1, $text);
    }
    for ($i = 0; $i <= 50000; $i++) {
        $num = random_int(1, 20);
        $text = "{$num}, ";
        fwrite($file2, $text);
    }
    fclose($file1);
    fclose($file2);
    $end = microtime(true);
    echo $end - $start;
}
getTime('text1.md', 'text2.md');