<?php
/**
 * Parse declared request parameters for json, array, value, or null.
 */
class Request {
  function __construct($param = false) {
    if (! is_array($param)) {
      throw new Exception('Request: Expects param array.');
    }

    // Loop through all declared parameters and parse them acccordingly.
    foreach($param as $item) {

      // Set empty values to null.
      if (empty($item) || empty($_REQUEST[$item])) {
        $value = null;

      // Check value for an array.
      } else if (is_array($_REQUEST[$item])) {
        $value = $_REQUEST[$item];

      // Check value for json.
      } else if ($json = json_decode($_REQUEST[$item])) {
          $value = $json;

      // Let php parse anything remaining. (ararys, or single values.)
      } else {
        $value = $_REQUEST[$item];
      }

      // Save the parameter.
      $this->{$item} = $value;
    }
  }

}
