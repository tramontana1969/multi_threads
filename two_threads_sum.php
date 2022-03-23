<?php
use Swoole\Coroutine as Co;

Co\Run(function ()
{
    $start = microtime(true);
    go(function()
    {
        $file1 = fopen('text1.md', 'r');
        $start1 = microtime(true);
        $a = 0;
        $arr1 = fgetcsv($file1);
        for($i = 0; $i < count($arr1) - 1; $i++) {
            $a += $arr1[$i];
        }
        echo "The first sum is ".$a."\n";
        fclose($file1);
        $end1 = microtime(true);
        $time1 = $end1 - $start1;
        echo "File 1 counted for:" . $time1 . "\n";
    });

    go(function()
    {
        $start2 = microtime(true);
        $file2 = fopen('text2.md', 'r');
        $arr2 = fgetcsv($file2);
        $b = 0;
        for($i = 0; $i < count($arr2) - 1; $i++) {
            $b += $arr2[$i];
        }
        echo "The second sum is ".$b."\n";
        $end2 = microtime(true);
        $time2 = $end2 - $start2;
        fclose($file2);
        echo "file 2 counted for:" . $time2 . "\n";
    });
    $end = microtime(true);
    echo $end - $start."\n";
});