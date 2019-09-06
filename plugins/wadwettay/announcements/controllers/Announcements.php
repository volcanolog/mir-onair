<?php namespace Wadwettay\Announcements\Controllers;

use BackendMenu;
use Backend\Classes\Controller;

/**
 * Announcements Back-end Controller
 */
class Announcements extends Controller
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

        BackendMenu::setContext('Wadwettay.Announcements', 'announcements', 'announcements');
    }
}
