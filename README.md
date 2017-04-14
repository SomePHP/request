This is a simple PHP class which parses request parameters. It handles JSON, bracket array notation, and standard values.

### License
MIT - MIT License
File: [LICENSE](LICENSE)

### Examples
```php
<?php
// Example request: https://example.com/?json={"test": 4}
// Parse the 'json' parameter from the request.
$req = new Request(array('json'));
echo "<pre>req->json: ". print_r($req->json, true) ."</pre>";
```

### Installation
##### Composer
composer require somephp/request

### Contents
| Resource | Description |
| -------- | ----------- |
|  | |

### Contributions
Liberal contribution friendly; Create merge request, describe why you want to MR.  MR is peer reviewed.


