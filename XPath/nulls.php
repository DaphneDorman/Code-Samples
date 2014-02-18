<?php
$xml = <<<XML
<html lang='en'>
  <head>
    <meta charset='utf-8'/>
    <title></title>
    <link rel='stylesheet' href='/assets/index.css'/>
  </head>
  <body>
    <div>
      <header>
        <h1></h1>
      </header>
      <section>
        <article></article>
        <aside></aside>
      </section>
      <footer>
        <small>
          Copyright \302\251
          <span></span>
        </small>
      </footer>
    </div>
    <script src='//code.jquery.com/jquery-latest.min.js'></script>
    <script src='/assets/index.js'></script>
  </body>
</html>
XML;
$dom = new DOMDocument('1.0', 'UTF-8');
$dom->resolveExternals = false;
$dom->substituteEntities = false;
$dom->loadXML($xml, LIBXML_NOENT);
$xpath = new DOMXPath($dom);
$null = array( 'br','hr','meta','link','base','link','meta','img'
             , 'embed','param','area','col','input' );
array_walk($null, function(&$v){$v = "not(self::{$v})";});
array_unshift($null, 'not(normalize-space())');
$null = implode(' and ', $null);
$node = $xpath->query("//*[{$null}]");
foreach ($node as $n) $n->appendChild($dom->createTextNode(''));
echo "<!doctype html>\n".$dom->saveXML($dom->documentElement);
?>
