<?php

namespace Drupal\bread_module\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class BreadForm extends FormBase
{
    public function getFormId()
    {
        return 'breadform';
    }

    //Form for the end-user that orders whatever he inputs
    public function buildForm(array $form, FormStateInterface $form_state)
    {
        $form['first_name'] = [
            '#type' => 'textfield',
            '#title' => $this->t('First name:'),
            '#required' => true,
            '#attributes' => array('class' => array('bread_form')),
        ];

        $form['last_name'] = [
            '#type' => 'textfield',
            '#title' => $this->t('Last name:'),
            '#required' => true,
            '#attributes' => array('class' => array('bread_form')),
        ];

        $form['phone'] = [
            '#type' => 'tel',
            '#title' => $this->t('Phonenumber:'),
            '#required' => false,
            '#attributes' => array('class' => array('bread_form')),
        ];

        $form['select_bread'] = [
            '#type' => 'checkbox',
            '#title' => $this->t('Order bread:'),
            '#attributes' => array('class' => array('bread_form')),
        ];

        $form['select_bread_type'] = [
            '#type' => 'radios',
            '#title' => $this->t('Type of bread:'),
            '#options' => [
            ],
            '#attributes' => array('class' => array('bread_form')),
            '#states' => [
                'visible' => [
                    ':input[name="select_bread"]' => [
                        'checked' => true,
                    ],
                ],
            ],
        ];

        //Get bread options from the db
        $dbBread = \Drupal::database()->query("SELECT items FROM bread_module_types WHERE order_type = :order_type", [":order_type" => 'bread'])->fetchAll();

        foreach ($dbBread as $value) {
            $form['select_bread_type']['#options'][$value->items] = $value->items;
        }

        $form['select_pastry'] = [
            '#type' => 'checkbox',
            '#title' => $this->t('Order pastry:'),
            '#attributes' => array('class' => array('bread_form')),
        ];


        $form['select_pastry_type'] = [
            '#type' => 'checkboxes',
            '#title' => $this->t('Type of pastry:'),
            '#options' => [
            ],
            '#attributes' => array('class' => array('bread_form')),
            '#states' => [
                'visible' => [
                    ':input[name="select_pastry"]' => [
                        'checked' => true,
                    ]
                ],
            ],
        ];

        //Get all pastry options from the db
        $dbPastry = \Drupal::database()->query("SELECT items FROM bread_module_types WHERE order_type = :order_type", [":order_type" => 'pastry'])->fetchAll();
        
        foreach ($dbPastry as $value) {
            $form['select_pastry_type']['#options'][$value->items] = $value->items;
        }

        $form['submit'] = [
            '#type' => 'submit',
            '#value' => $this->t('Submit'),
            '#attributes' => array('class' => array('bread_form_submit')),
          ];

        return $form;
    }

    public function submitForm(array &$form, FormStateInterface $form_state)
    {
        //Get the values from the form
        $ordered_bread = $form_state->getValue('select_bread_type');
        $ordered_pastries_array = $form_state->getValue('select_pastry_type');
        $ordered_pastry = "";
        
        //Order array of pastries as a string
        foreach ($ordered_pastries_array as $pastry) {
            $ordered_pastry .= $pastry . ",";
        }


        //Stringify the order
        if ($form_state->getValue('select_bread') == 1 && $form_state->getValue('select_pastry') == 1) {
            $order_type = "both";
            $order = "type bread: " . $ordered_bread . "\n type pastry: " . $ordered_pastry;
        } elseif ($form_state->getValue('select_bread') == 1) {
            $order_type = "bread";
            $order = "type bread: " . $ordered_bread;
        } elseif ($form_state->getValue('select_pastry') == 1) {
            $order_type = "pastry";
            $order = "type pastry: " . $ordered_pastry;
        } else {
            $order_type = "empty";
        }


        //Add the order in the db
        $order_number = \Drupal::database()->insert('bread_module_orders')
            ->fields([
                'first_name' => $form_state->getValue('first_name'),
                'last_name' => $form_state->getValue('last_name'),
                'phone' => $form_state->getValue('phone'),
                'order_type' => $order_type,
                'order_items' => $order,
                'order_date' => time()
            ])
            ->execute();
        

            
        //Get the order data from the db
        $query = \Drupal::database()->query("SELECT order_date FROM bread_module_orders WHERE id = :id", [':id' => $order_number])->fetchField();
    }
}
