--TEST--
JSON (http://www.crockford.com/JSON/JSON_checker/test/fail*.json)
--SKIPIF--
<?php
  if (!extension_loaded('json')) die('skip: json extension not available');
?>
--FILE--
<?php
    
$tests = array('"A JSON payload should be an object or array, not a string."',
               '["Unclosed array"',
               '{unquoted_key: "keys must be quoted}',
               '["extra comma",]',
               '["double extra comma",,]',
               '[   , "<-- missing value"]',
               '["Comma after the close"],',
               '["Extra close"]]',
               '{"Extra comma": true,}',
               '{"Extra value after close": true} "misplaced quoted value"',
               '{"Illegal expression": 1 + 2}',
               '{"Illegal invocation": alert()}',
               '{"Numbers cannot have leading zeroes": 013}',
               '{"Numbers cannot be hex": 0x14}',
               '["Illegal backslash escape: \\x15"]',
               '["Illegal backslash escape: \\\'"]',
               '["Illegal backslash escape: \\017"]',
               '[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[["Too deep"]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]',
               '{"Missing colon" null}',
               '{"Double colon":: null}',
               '{"Comma instead of colon", null}',
               '["Colon instead of comma": false]',
               '["Bad value", truth]',
               "['single quote']");

foreach ($tests as $test)
{
    echo 'Testing: ' . $test . "\n";
    echo "AS OBJECT\n";
    var_dump(json_decode($test));
    echo "AS ARRAY\n";
    var_dump(json_decode($test, true));
}

?>
--EXPECT--
Testing: "A JSON payload should be an object or array, not a string."
AS OBJECT
string(58) "A JSON payload should be an object or array, not a string."
AS ARRAY
string(58) "A JSON payload should be an object or array, not a string."
Testing: ["Unclosed array"
AS OBJECT
NULL
AS ARRAY
NULL
Testing: {unquoted_key: "keys must be quoted}
AS OBJECT
NULL
AS ARRAY
NULL
Testing: ["extra comma",]
AS OBJECT
NULL
AS ARRAY
NULL
Testing: ["double extra comma",,]
AS OBJECT
NULL
AS ARRAY
NULL
Testing: [   , "<-- missing value"]
AS OBJECT
NULL
AS ARRAY
NULL
Testing: ["Comma after the close"],
AS OBJECT
array(1) {
  [0]=>
  string(21) "Comma after the close"
}
AS ARRAY
array(1) {
  [0]=>
  string(21) "Comma after the close"
}
Testing: ["Extra close"]]
AS OBJECT
array(1) {
  [0]=>
  string(11) "Extra close"
}
AS ARRAY
array(1) {
  [0]=>
  string(11) "Extra close"
}
Testing: {"Extra comma": true,}
AS OBJECT
NULL
AS ARRAY
NULL
Testing: {"Extra value after close": true} "misplaced quoted value"
AS OBJECT
object(stdClass)#1 (1) {
  ["Extra value after close"]=>
  bool(true)
}
AS ARRAY
array(1) {
  ["Extra value after close"]=>
  bool(true)
}
Testing: {"Illegal expression": 1 + 2}
AS OBJECT
NULL
AS ARRAY
NULL
Testing: {"Illegal invocation": alert()}
AS OBJECT
NULL
AS ARRAY
NULL
Testing: {"Numbers cannot have leading zeroes": 013}
AS OBJECT
object(stdClass)#1 (1) {
  ["Numbers cannot have leading zeroes"]=>
  int(13)
}
AS ARRAY
array(1) {
  ["Numbers cannot have leading zeroes"]=>
  int(13)
}
Testing: {"Numbers cannot be hex": 0x14}
AS OBJECT
NULL
AS ARRAY
NULL
Testing: ["Illegal backslash escape: \x15"]
AS OBJECT
NULL
AS ARRAY
NULL
Testing: ["Illegal backslash escape: \'"]
AS OBJECT
NULL
AS ARRAY
NULL
Testing: ["Illegal backslash escape: \017"]
AS OBJECT
NULL
AS ARRAY
NULL
Testing: [[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[["Too deep"]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]
AS OBJECT
NULL
AS ARRAY
NULL
Testing: {"Missing colon" null}
AS OBJECT
NULL
AS ARRAY
NULL
Testing: {"Double colon":: null}
AS OBJECT
NULL
AS ARRAY
NULL
Testing: {"Comma instead of colon", null}
AS OBJECT
NULL
AS ARRAY
NULL
Testing: ["Colon instead of comma": false]
AS OBJECT
NULL
AS ARRAY
NULL
Testing: ["Bad value", truth]
AS OBJECT
NULL
AS ARRAY
NULL
Testing: ['single quote']
AS OBJECT
array(1) {
  [0]=>
  string(12) "single quote"
}
AS ARRAY
array(1) {
  [0]=>
  string(12) "single quote"
}