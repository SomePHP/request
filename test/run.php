<?php
$testParams = implode('&',
  array(
    'test[0]=5&test[1]=more',
    'empty=',
    'json={%22obj%22:{%22arry%22:[1,2,3,4]}}',
    'json_array=[%22apple%22,%20%22cheese%22]',
    'dbl_quoted_string=%22/*code*/%22',
  )
);


parse_str($testParams, $_REQUEST);
require_once "index.php";
