<?php namespace Wadwettay\Trinsling\Controllers;

use BackendMenu;
use Backend\Classes\Controller;

/**
 * Streams Back-end Controller
 */
class Streams extends Controller
{
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController'
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Wadwettay.Trinsling', 'trinsling', 'streams');
    }
}
