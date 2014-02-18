<?php

$filenames = [
  'template'  => 'template.xsl',
  'data'      => 'records.xml',
];

$xsl    = new XSLTProcessor();
$xpath  = '';
$output = '';
$domdoc = '';
$xmldoc = new DOMDocument('1.0', 'UTF-8');
$xsldoc = new DOMDocument('1.0', 'UTF-8');

$xsldoc->load($filenames['template']);
$xsl->importStyleSheet($xsldoc);
$xmldoc->load($filenames['data']);

$domdoc = $xsl->transformToDoc($xmldoc);
$domdoc->preserveWhiteSpace = false;
$domdoc->formatOutput = true;
$xpath = new DOMXpath($domdoc);

$node = $xpath->query("//*[not(node())]");
$null = array( 'br','hr','meta','link','base','link','meta','img'
             , 'embed','param','area','col','input' );
foreach ($node as $n)
    if (!in_array($n->nodeName, $null))
        $n->appendChild($domdoc->createTextNode(''));

$output = '<!DOCTYPE html>'
        . PHP_EOL
        . $domdoc->saveXML($domdoc->documentElement);

echo $output;

?>
