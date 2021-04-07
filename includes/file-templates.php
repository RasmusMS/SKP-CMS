<?php

// These are the templates for the code I will push to newly created files,
// or for future sections added to an existing file.

// This is the template for the featurette
function tpl_file_featurette($sectionID) {
$code = "";
$code .= "<?php\n";
$code .= "include_once('includes/templates.php');\n";
$code .= "include_once('includes/objects/section.php');\n";

$code .= '$sectionID = ' . $sectionID . ';' . "\n";

$code .= '$section = new Section;' . "\n";
$code .= '$allContent = $section->fetch_content($sectionID);' . "\n";

$code .= 'foreach($allContent as $row) {' . "\n";
$code .= '$content = $row["content"];' . "\n";
$code .= '$type = $row["type"];' . "\n";

$code .= 'switch ($type) {' . "\n";
$code .= "case 'Heading':" . "\n";
$code .= '$header = $content;' . "\n";
$code .= "break;" . "\n";

$code .= "case 'Text':" . "\n";
$code .= '$text = $content;' . "\n";
$code .= "break;" . "\n";

$code .= "case 'Img':" . "\n";
$code .= '$imgmg = $content;' . "\n";
$code .= "break;" . "\n";

$code .= "default:" . "\n";
$code .= 'echo "Wrong type! Type doesn\'t exists: $content";' . "\n";
$code .= "break;" . "\n";
$code .= "}" . "\n";

$code .= "}" . "\n";

$code .= 'tpl_featurette($header, $text, $img);' . "\n";

$code .= "?>" . "\n";

return $code;
}
?>
