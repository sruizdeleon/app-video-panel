<?php

function adaptUrlYoutube($url) {
  $videoId = getIdVideoYoutube($url);
  $newUrl = "https://www.youtube.com/embed/" . $videoId;
  return $newUrl;
}

function getIdVideoYoutube($url) {
  $query = parse_url($url, PHP_URL_QUERY);
  parse_str($query, $params);
  return $params['v'];
}

?>