<?php
function endsWith($haystack, $needle) {
    $length = strlen($needle);
    if(!$length) {
        return true;
    }
    return substr($haystack, -$length) === $needle;
}

if(!isset($_GET["url"])) {
    http_response_code(404);
    die();
}
$url = $_GET["url"];

if(!endsWith(strtolower($url), '.toml')) {
    http_response_code(400);
    die();
}

$content = file_get_contents($url);
if(!$content) {
    http_response_code(404);
    die();
}

header("Content-Type: text/plain");
echo $content;

?>