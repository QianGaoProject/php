<?php
/**
 * loadContent
 * Load the Content
 * @param $default
 */
 
 /**
 * function returns current page filename to set a menu active
 */
function getCurrentPage($where){
    $currentPage = filter_input(INPUT_GET, $where, FILTER_SANITIZE_STRING);
    $currentPage = (empty($currentPage)) ? 'home' : $currentPage;
    return $currentPage;
}



function loadContent($where, $default='') {
  // Get the content from the url 
  // Sanitize it for security reasons
  $content = filter_input(INPUT_GET, $where, FILTER_SANITIZE_STRING);
  $default = filter_var($default, FILTER_SANITIZE_STRING);
  // If there wasn't anything on the url, then use the default
  $content = (empty($content)) ? $default : $content;
  // If you found have content, then get it and pass it back
  if ($content) {
	// sanitize the data to prevent hacking.
	$html = include 'content/'.$content.'.php';
	return $html;
  }
}

function loadHeaderContent($where, $default='') {
  // Get the content from the url 
  // Sanitize it for security reasons
    $filesToInclude = array();
    $filesToInclude[]='css/header.php';
    $filesToInclude[]='js/header.php';
//$html = include
    $content = filter_input(INPUT_GET, $where, FILTER_SANITIZE_STRING);
    $default = filter_var($default, FILTER_SANITIZE_STRING);
    // If there wasn't anything on the url, then use the default
    $content = (empty($content)) ? $default : $content;
    // If you found have content, then get it and pass it back
    if ($content) {
	// sanitize the data to prevent hacking.
        if($content=="sucess" && $content=="submitError"){
        return $filesToInclude=array();
        } else{
        $filesToInclude[] = 'css/'.$content.'.php';
        $filesToInclude[] = 'js/'.$content.'.php';
	return $filesToInclude;
        }
    }
}

function loadContentEnglish($where, $default='') {
  // Get the content from the url 
  // Sanitize it for security reasons
  $content = filter_input(INPUT_GET, $where, FILTER_SANITIZE_STRING);
  $default = filter_var($default, FILTER_SANITIZE_STRING);
  // If there wasn't anything on the url, then use the default
  $content = (empty($content)) ? $default : $content;
  // If you found have content, then get it and pass it back
  if ($content) {
	// sanitize the data to prevent hacking.
	$html = include 'content/en/'.$content.'.php';
	return $html;
  }
}