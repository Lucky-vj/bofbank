<?php


echo 'short_open_tag = ' . ini_get('short_open_tag') . "<br>";
echo 'display_errors = ' . ini_get('display_errors') . "<br>";
echo 'register_globals = ' . ini_get('register_globals') . "<br>";
echo 'post_max_size = ' . ini_get('post_max_size') . "<br>";
echo 'post_max_size+1 = ' . (ini_get('post_max_size')+1) . "<br>";

?>