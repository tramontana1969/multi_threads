<?php

use Swoole\Coroutine as Co;
Co\Run(function ()
{
    $start = microtime(true);
    go(function()
    {
        $start = microtime(true);
        $file1 = fopen('text1.md', 'w');
        for ($i = 0; $i <= 50000; $i++) {
            $num = random_int(1, 20);
            $text = "{$num}, ";
            fwrite($file1, $text);
        }
        fclose($file1);
        $end = microtime(true);
        $time = $end - $start;
        echo "file 1 created for: ". $time."\n";
    });

    go(function()
    {
        $start = microtime(true);
        $file2 = fopen('text2.md', 'w');
        for ($i = 0; $i <= 50000; $i++) {
            $num = random_int(1, 20);
            $text = "{$num}, ";
            fwrite($file2, $text);
        }
        fclose($file2);
        $end = microtime(true);
        $time = $end - $start;
        echo "file 2 created for: ". $time ."\n";
    });
    $end = microtime(true);
    echo $end - $start . "\n";
});