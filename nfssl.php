<?php
/*
Plugin Name: No frills social share links (NFSSL)
Plugin URI: http://infoheap.com/
Description: No Frill Social Share buttons for twitter and facebook
Author: infoheap team
Author URI: http://infoheap.com/
Version: 1.0
*/


function nfssl_the_content_filter ($content) {
  if (!is_single()) {
    return $content;
  }
  $posturl = urlencode(get_permalink());
  $posttitle = urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8'));
  $share_html = "<div class='nfssl'>Share this article: ";

  // G+
  $link = "https://plus.google.com/share?url=$posturl";
  $title = "share on Google+";
  $img = "/img/Google_plus_icon-18.png";
  $share_html .= " <a title='$title' href='$link' target='_blank'><img src='$img' alt='$title' /></a>";

  // fb
  $link = "http://www.facebook.com/share.php?u=$posturl";
  $title = "share on facebook";
  $img = "/img/F_icon-18.png";
  $share_html .= " <a title='$title' href='$link' target='_blank'><img src='$img' alt='$title' /></a>";

  // linkedin
  $link = "http://www.linkedin.com/shareArticle?mini=true&url=$posturl" . "&title=$posttitle";
  $title = "share on linkedin";
  $img = "/img/Linkedin_icon-18.png";
  $share_html .= " <a title='$title' href='$link' target='_blank'><img src='$img' alt='$title' /></a>";

  // twitter
  $link = "https://twitter.com/intent/tweet?url=$posturl" .  "&text=$posttitle";
  $title = "tweet this";
  $img = "/img/Twitter-18.png";
  $share_html .= " <a title='$title' href='$link' target='_blank'><img src='$img' alt='$title' /></a>";

  // reddit
  $link = "http://www.reddit.com/submit?url=$posturl" . "&title=$posttitle";
  $title = "submit to reddit";
  $img = "/img/Reddit-18.png";
  $share_html .= " <a title='$title' href='$link' target='_blank'><img src='$img' alt='$title' /></a>";

  // stumbleupon
  $link = "http://www.stumbleupon.com/submit?url=$posturl";
  $title = "share on stumbleupon";
  $img = "/img/Stumbleupon-18.png";
  $share_html .= " <a title='$title' href='$link' target='_blank'><img src='$img' alt='$title' /></a>";

  //digg
  $link = "http://digg.com/submit?url=$posturl" . "&title=$posttitle";
  $title = "share on digg";
  $img = "/img/Digg_Shiny_Icon-18.png";
  $share_html .= " <a title='$title' href='$link' target='_blank'><img src='$img' alt='$title' /></a>";

  // Diigo
  $link = "https://www.diigo.com/post?url=$posturl" . "&title=$posttitle";
  $title = "share on diigo";
  $img = "/img/Diigo-18.png";
  $share_html .= " <a title='$title' href='$link' target='_blank'><img src='$img' alt='$title' /></a>";

  $share_html .= "</div>\n";
  $content .= $share_html;
  return $content;
}
add_filter( 'the_content', 'nfssl_the_content_filter');


?>
