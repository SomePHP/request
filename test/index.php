<?php
require_once '../src/Request.php';

// Simple Test Class
class Test {
  public $pass = false;

  function __construct($title) {
    $this->title = $title;
  }

  function result() {
    echo ($this->pass ? 'passed' : 'failed') ." - Test: $this->title<br>";
  }
}
$testUrl = implode('', 
  array(
    'http://192.168.1.65/test-SimplePHP-request/',
    '?test[0]=5&test[1]=more',
    '&empty=',
    '&json={%22obj%22:{%22arry%22:[1,2,3,4]}}',
    '&json_array=[%22apple%22,%20%22cheese%22]',
    '&dbl_quoted_string=%22/*code*/%22',
  )
);

echo 'Test url: <a href="'. $testUrl .'">"'. $testUrl .'</a><br><br>';


$test = new Test('Throw exception when missing "param" in constructor.');
try {
  $req = new Request();
} catch(Exception $e) {
  $test->pass = $e->getMessage();
}
unset($req); $test->result();


$test = new Test('Array parsed from url bracketsl"x[1]&x[2]".');
$req = new Request(array('test'));
$test->pass = is_array($req->test);
unset($req); $test->result();


$test = new Test('JSON parsed from url parameters.');
$req = new Request(array('json'));
$test->pass = is_object($req->json);
unset($req); $test->result();


$test = new Test('Empty value returns null for a parameter');
$req = new Request(array('empty'));
if (is_null($req->empty)) {
  $test->pass = true;
}
unset($req); $test->result();


$test = new Test('Multiple mixed parameters are returned.');
$req = new Request(array('test', 'json', 'empty'));
if (count((array) $req) === 3) {
  $test->pass = true;
}
unset($req); $test->result();


$test = new Test('Missing parameters are set to null.');
$req = new Request(array('test', 'json', 'missing'));
if (is_null($req->missing)) {
  $test->pass = true;
}
unset($req); $test->result();


$test = new Test('String returned for double quoted value.');
$req = new Request(array('test', 'json', 'dbl_quoted_string'));
if ($req->dbl_quoted_string === '/*code*/') {
  $test->pass = true;
}
unset($req); $test->result();


$test = new Test('Array returned for JSON brackets. ');
$req = new Request(array('test', 'json', 'json_array'));
if (is_array($req->json_array)) {
  $test->pass = true;
}

/*
unset($req); $test->result();
$test = new Test('');
$req = new Request(array('test', 'json'));
if (is_null($req->missing)) {
  $test->pass = true;
}
unset($req); $test->result();
*/
