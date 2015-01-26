<?php
/**
 * Created by JetBrains PhpStorm.
 * User: i
 * Date: 26.01.15
 * Time: 23:47
 * To change this template use File | Settings | File Templates.
 */

class Controller {

    public $model;
    public $view;

    function __construct()
    {
        $this->view = new View;

    }

    function action_index()
    {

    }
}