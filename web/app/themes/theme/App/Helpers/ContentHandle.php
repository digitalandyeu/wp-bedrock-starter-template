<?php

namespace Theme\Helpers;

/**
 * Content handler for ACF flexible content.
 * 
 * @since 1.0.0
 */
class ContentHandle {

  /**
   * Handles content for ACF flexible blocks.
   * 
   * @param  array $content
   * @return void
   */
  public static function do_content( $content ) {

    foreach ( $content as $block ) {

      switch ( $block['acf_fc_layout'] ) {

        case 'kicker':
          echo "<span class=\"kicker\">{$block['content']}</span>";

          break;

        case 'heading':
          $type = $block['type'] ?? 'h2';
          $content = str_replace(array('<|', '|>'),array('<span class="outlined">', '</span>'), $block['content']);
          echo "<$type>{$content}</$type>";

          break;

        case 'body':
          echo str_replace( '<p>', '<p class="paragraph__' . $block["size"] . '">', $block['content'] );

          break;

        case 'image':
          echo '<img class="mb-4" src="' . $block['image']['sizes']['lqip'] . '" data-src="' . $block['image']['url'] . '" alt="' . $block['image']['alt'] . '">';

          break;

        case 'button_group':
          echo '<div class="button__group">';

          foreach ( $block['button'] as $button ) {

            $button_attrs = array(
              'type'    => $button['type'] ?: 'primary',
              'href'    => $button['link']['url'],
              'target'  => $button['link']['target'] ? 'target="_blank"': 'target="_self"',
              'label'   => $button['link']['title']
            );

            get_template_part( 'blocks/Components/Button/Button', null, $button_attrs );

          }

          echo '</div>';

          break;

        case 'icon':
          $icon_attrs = array(
            'icon'      => $block['icon'],
            'heading'   => $block['heading'],
            'content'   => $block['content']
          );

          get_template_part( 'blocks/Components/IconContent/IconContent', null, $icon_attrs );

          break;

        case 'valuation':
          get_template_part( 'blocks/Components/ValuationForm/ValuationForm' );
          
          break;

      }

    }

  }

}
