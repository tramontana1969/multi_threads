<?php
function getTime($name1, $name2)
{
    $start = microtime(true);
    $file1 = fopen($name1, 'w');
    $start1 = microtime(true);
    for ($i = 0; $i <= 50000; $i++) {
        $num = random_int(1, 20);
        $text = "{$num}, ";
        fwrite($file1, $text);
    }
    fclose($file1);
    $end1 = microtime(true);
    $time1 = $end1 - $start1;
    echo "file 1 created for:". $time1."\n";

    $start2 = microtime(true);
    $file2 = fopen($name2, 'w');
    for ($i = 0; $i <= 50000; $i++) {
        $num = random_int(1, 20);
        $text = "{$num}, ";
        fwrite($file2, $text);
    }
    $end2 = microtime(true);
    $time2 = $end2 - $start2;
    fclose($file2);
    echo "file 2 created for:". $time2."\n";

    $end = microtime(true);
    echo $end - $start;
}
getTime('text1.csv', 'text2.csv');