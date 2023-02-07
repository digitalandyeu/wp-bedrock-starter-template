<?php

namespace Theme\Theme;

class ThemeBlocks
{
    public array $allowed_blocks = [];

    public function __construct($allowed_blocks)
    {
        $this->allowed_blocks = $allowed_blocks;

        // add_filter( 'allowed_block_types_all', [$this, 'allow_blocks'], 10, 2 );
    }

    public function allow_blocks($block_editor_context, $editor_context)
    {
        if (! empty($editor_context->post)) {
            return $this->allowed_blocks;
        }

        return $block_editor_context;
    }
}
