<?php

namespace Drupal\bread_module\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class AddForm extends FormBase
{
    public function getFormId()
    {
        return 'addform';
    }

    //Form for adding items to the list
    public function buildForm(array $form, FormStateInterface $form_state)
    {
        $form['type'] = [
            '#type' => 'radios',
            '#title' => $this->t('Type:'),
            '#options' => [
                'bread' => $this->t('bread'),
                'pastry' => $this->t('pastry'),
            ],
            '#required' => true,
            '#attributes' => array('class' => array('add_form')),
        ];

        $form['item'] = [
            '#type' => 'textfield',
            '#title' => $this->t('item:'),
            '#required' => true,
            '#attributes' => array('class' => array('add_form')),
        ];

        $form['price'] = [
            '#type' => 'textfield',
            '#title' => $this->t('price:'),
            '#required' => true,
            '#attributes' => array('class' => array('add_form')),
        ];


        $form['submit'] = [
            '#type' => 'submit',
            '#value' => $this->t('Submit'),
            '#attributes' => array('class' => array('add_form_submit')),
          ];

        return $form;
    }

    public function submitForm(array &$form, FormStateInterface $form_state)
    {
        \Drupal::database()->insert('bread_module_types')
            ->fields([
                'order_type' => $form_state->getValue('type'),
                'items' => $form_state->getValue('item'),
                'items_price' => $form_state->getValue('price')
            ])
            ->execute();

        \Drupal::messenger()->addMessage('The item has been added to the list of items.', 'success');
    }
}
