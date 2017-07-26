<?php
class Request {
	/*
  * Parse request parameters.  Decode JSON, default to null.
  *
  * @param str[] $paramList  An Array of expected request parameters.
  *
  * @return object  Contains all params with null for missing params,
  *   values if they exist, or a json decoded object/array.
  */
  function Request($paramList) {
		foreach($parameter as $param) {
			if (isset($_REQUEST[$param]) && ! empty($_REQUEST[$param])) {
        $this->$param = $_REQUEST[$param];
      } else {
        $this->$param = null;
      }

      if (json_decode($this->$param)) {
        $this->$param = json_decode($this->$param);
      }
    }
  }    
}
