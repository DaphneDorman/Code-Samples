<?php
function expand ( Array $array, $prefix = '/')
{
  $output = array();
  foreach ($array as $key => $val):
      $list = explode($prefix, trim($key, $prefix));
      $last = &$output;
      foreach ($list as $v):
          $last =& $last[$v];
      endforeach;
      if (!is_array($last)) $last = $val;
  endforeach;
  return $output;
}
?>
