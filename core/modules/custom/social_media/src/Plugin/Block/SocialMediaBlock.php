<?php

    namespace Drupal\social_media\Plugin\Block;

    use Drupal\Core\Block\BlockBase;

    /**
    * Defines a social menu block
    *
    * @Block(
    *   id = "social_media_block",
    *   admin_label = "Social Media",
    * )
    */

    class SocialMediaBlock extends BlockBase {

        /**
        * {@inheritdoc}
        */
        public function build() {
            return [
                '#theme' => 'social-media',
                '#attached' => ['library' => ['social_media/social_media']],
            ];
        }
    }