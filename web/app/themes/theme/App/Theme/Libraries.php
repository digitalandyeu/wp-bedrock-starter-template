<?php

namespace Theme\Theme;

/**
 * Icon map for SVGs used site-wide.
 *
 * @since 1.0.0
 */
class Libraries {

    /**
     * Get an icon by name.
     *
     * @param  string $name The name of the icon.
     * @return string
     */
    public static function get( $name ) {

        switch ( $name ) {

            // newsPage icon
            case 'page': return <<<HTML
        <svg width="28" height="38" viewBox="0 0 28 38" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M27.8668 38H0.00012207V0H27.8668V38ZM2.97126 35.0424H24.8917V2.95764H2.97126V35.0424Z" fill="#2300FF"/>
        </svg>
      HTML;

            // newsSearch icon
            case 'search': return <<<HTML
        <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M18.3333 31.6667C25.6971 31.6667 31.6667 25.6971 31.6667 18.3333C31.6667 10.9695 25.6971 5 18.3333 5C10.9695 5 5 10.9695 5 18.3333C5 25.6971 10.9695 31.6667 18.3333 31.6667Z" stroke="#3E20FF" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
          <path d="M36.6667 37.0834L27.5 27.9167" stroke="#3E20FF" stroke-width="3"/>
        </svg>
      HTML;

            // newsAlerts icon
            case 'alerts': return <<<HTML
      <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
        <g clip-path="url(#clip0)">
        <path d="M21.6667 3.33331L5 23.3333H20L18.3333 36.6666L35 16.6666H20L21.6667 3.33331Z" stroke="#3E20FF" stroke-width="3"/>
        </g>
        <defs>
        <clipPath id="clip0">
        <rect width="40" height="40" fill="white"/>
        </clipPath>
        </defs>
      </svg>
      HTML;

            // newsStories icon
            case 'stories': return <<<HTML
        <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M28.3333 16.6666H5" stroke="#3E20FF" stroke-width="3"/>
          <path d="M35 10H5" stroke="#3E20FF" stroke-width="3"/>
          <path d="M35 23.3334H5" stroke="#3E20FF" stroke-width="3"/>
          <path d="M28.3333 30H5" stroke="#3E20FF" stroke-width="3"/>
        </svg>
      HTML;

            // newsWire icon
            case 'wire': return <<<HTML
        <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M23.3333 3.33337H9.99996C9.1159 3.33337 8.26806 3.68456 7.64294 4.30968C7.01782 4.93481 6.66663 5.78265 6.66663 6.66671V33.3334C6.66663 34.2174 7.01782 35.0653 7.64294 35.6904C8.26806 36.3155 9.1159 36.6667 9.99996 36.6667H30C30.884 36.6667 31.7319 36.3155 32.357 35.6904C32.9821 35.0653 33.3333 34.2174 33.3333 33.3334V13.3334L23.3333 3.33337Z" stroke="#3E20FF" stroke-width="3"/>
          <path d="M23.3334 3.33337V13.3334H33.3334" stroke="#3E20FF" stroke-width="3"/>
          <path d="M26.6667 21.6666H13.3334" stroke="#3E20FF" stroke-width="3"/>
          <path d="M26.6667 28.3334H13.3334" stroke="#3E20FF" stroke-width="3"/>
          <path d="M16.6667 15H15H13.3334" stroke="#3E20FF" stroke-width="3"/>
        </svg>
      HTML;

            // newsScore icon
            case 'score': return <<<HTML
        <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
          <g clip-path="url(#clip0)">
            <path d="M20 25C26.4434 25 31.6667 19.7766 31.6667 13.3333C31.6667 6.88997 26.4434 1.66663 20 1.66663C13.5567 1.66663 8.33337 6.88997 8.33337 13.3333C8.33337 19.7766 13.5567 25 20 25Z" stroke="#3E20FF" stroke-width="3"/>
            <path d="M13.6833 23.15L11.6666 38.3333L20 33.3333L28.3333 38.3333L26.3166 23.1333" stroke="#3E20FF" stroke-width="3"/>
          </g>
          <defs>
            <clipPath id="clip0">
              <rect width="40" height="40" fill="white"/>
            </clipPath>
          </defs>
        </svg>
      HTML;

            // Return false if no icon has name
            default: return false;

        }

    }

}
