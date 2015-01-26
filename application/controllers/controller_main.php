<?php
/**
 * Created by JetBrains PhpStorm.
 * User: i
 * Date: 27.01.15
 * Time: 0:52
 * To change this template use File | Settings | File Templates.
 */

class Controller_Main extends Controller {

    function action_index()
    {
        $this->view->generate('main_view.php', 'template_view.php');
    }
}