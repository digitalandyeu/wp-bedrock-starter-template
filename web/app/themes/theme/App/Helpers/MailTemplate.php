<?php

namespace Theme\Helpers;

/**
 * ImageHelper
 * 
 * Resolve images
 */
class MailTemplate
{
  public static function get_body($data, $template = 'default')
  {
    if ($data) {
      ob_start();
      get_template_part( 'templates/mail', $template, $data );
      $body = ob_get_clean();
      return $body;
    }
  }
}