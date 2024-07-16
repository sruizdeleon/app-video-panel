<?php

function adaptUrlYoutube($url)
{
  if (strpos($url, 'https://www.youtube.com/watch?v=') !== false) {
    $videoReference = getVideoReference($url);
    $newUrl = "https://www.youtube.com/embed/" . $videoReference;
    return $newUrl;
  } elseif (strpos($url, 'https://www.youtube.com/embed/') !== false) {
    return $url;
  } else {
    return 'https://www.youtube.com/';
  }
}

function getVideoReference($url)
{
  if (strpos($url, 'https://www.youtube.com/watch?v=') !== false) {
    $query = parse_url($url, PHP_URL_QUERY);
    parse_str($query, $params);
    return $params['v'] ?? false;
  }
  return false;
}

?>