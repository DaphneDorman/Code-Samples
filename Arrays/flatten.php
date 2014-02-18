<?php
function flatten ( $array, $prefix = '' )
{
  $output = array();
  $array = (array)$array;
  foreach ($array AS $k => $v):
    if (!is_array($v)):
      $output[$prefix.$k] = $v;
    else:
      $output += flatten($v, $prefix.$k.'/');
    endif;
  endforeach;
  return $output;
}
?>
