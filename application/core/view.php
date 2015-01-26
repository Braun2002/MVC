<?php
/**
 * Created by JetBrains PhpStorm.
 * User: i
 * Date: 26.01.15
 * Time: 23:42
 * To change this template use File | Settings | File Templates.
 */

class View {

    //public $template_view //Здесь можно указать общий вид

    function generate($content_view, $template_view, $data = null)
    {
        /*
         * if (is_array($data))
         * {
         *      //преобразуем элементы массива в переменные
         *      extract($data);
         * }
         */

        include 'application/views/'.$template_view;
    }

}