<?php namespace RV\PhpConsole\Controllers;

use Backend\Classes\Controller;
use BackendMenu;
use Input;

class ScriptsController extends Controller
{
    public $implement = [        'Backend\Behaviors\ListController',        'Backend\Behaviors\FormController'    ];
    
    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';

    public $requiredPermissions = [
        'rv-phpconsole-usage' 
    ];

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('RV.PhpConsole', 'rv-phpconsole-menu');
    }

    public function onExecute()
    {
        $data = Input::all();
        $code = $data['Script']['code'];
        $code = preg_replace('/^ *(<\?php|<\?)/mi', '', $code);

        ob_start();
        eval($code);
        $output = ob_get_clean();

        $this->vars['output'] = nl2br($output);
    }
}
