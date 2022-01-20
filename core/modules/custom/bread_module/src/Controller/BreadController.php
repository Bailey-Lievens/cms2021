<?php

namespace Drupal\bread_module\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\RedirectResponse;

class breadController extends ControllerBase
{
    //Return page for all orders
    public function overviewPage()
    {
        return [
            '#theme' => 'overview',
            '#orders' => breadController::getOrders()
          ];
    }

    //Return page for all user submitted items
    public function itemOverviewPage()
    {
        return [
            '#theme' => 'itemOverview',
            '#items' => breadController::getItems()
        ];
    }

    //Delete an item in the db and reload the same page
    public function deleteItem($item)
    {
        \Drupal::database()->delete('bread_module_types')
            ->condition('id', $item)
            ->execute();
        
        breadController::my_goto('/IMD-THEMING/nl/admin/config/user-interface/bread-module/itemOverview');
    }

    //Complete order item and reload the same page
    public function completeOrder($order)
    {
        \Drupal::database()->delete('bread_module_orders')
            ->condition('id', $order)
            ->execute();

        breadController::my_goto('/IMD-THEMING/nl/admin/config/user-interface/bread-module/overview');
    }
    
    //Return the redirect to the given page
    //Reuse code instead of typing it multiple times
    public static function my_goto($path)
    {
        $response = new RedirectResponse($path);
        $response->send();
        return;
    }

    //Get all orders from the db
    public static function getOrders()
    {
        $query = \Drupal::database()->query("SELECT * FROM bread_module_orders")->fetchAll();
        return $query;
    }

    //Get all items from the db
    public static function getItems()
    {
        $query = \Drupal::database()->query("SELECT * FROM bread_module_types")->fetchAll();
        return $query;
    }
}
