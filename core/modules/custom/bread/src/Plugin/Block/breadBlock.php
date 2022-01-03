<?php

    namespace Drupal\bread\Plugin\Block;

    use Drupal\Core\Block\BlockBase;

    /**
    * Defines a social menu block
    *
    * @Block(
    *   id = "bread_block",
    *   admin_label = "Bread",
    * )
    */

    class BreadBlock extends BlockBase {

        /**
        * {@inheritdoc}
        */
        public function build() {
            return [
                '#theme' => 'bread',
                '#attached' => ['library' => ['bread/bread']],
            ];
        }
    }