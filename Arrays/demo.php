<?php

################################################################################
# Bill Brown
# macnimble@gmail.com
# 510-316-7554
################################################################################

require 'expand.php';
require 'flatten.php';

$array = json_decode('{
  "one": {
    "two": 3,
    "four": [ 5, 6, 7 ]
  },
  "eight": {
    "nine": {
      "ten": 11
    }
  }
}', true);
echo '<hr/><pre>Original ',print_r($array,1),'</pre>';

$array = flatten($array);
echo '<hr/><pre>Flattened ',print_r($array,1),'</pre>';

$array = expand($array);
echo '<hr/><pre>Expanded ',print_r($array,1),'</pre>';

?>
