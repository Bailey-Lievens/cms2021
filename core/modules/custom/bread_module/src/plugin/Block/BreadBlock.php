<?php

namespace Drupal\bread_module\Plugin\Block;

use Drupal\Core\Block\BlockBase;


/**
 * Provides a 'BreadBlock' block.
 *
 * @Block(
 * id= "Bread_module_Block",
 * admin_label = "bread module block"
 * )
 */
class BreadBlock extends BlockBase
{
    public function build()
    {
        $form = \Drupal::formBuilder()->getForm('Drupal\bread_module\Form\BreadForm');
        return [
            $form,
            '#attached' => [
                'library' => ['bread_module/bread-module']
            ]
        ];
    }
}
