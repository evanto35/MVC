<?php
namespace PetrAurora\View;

use PetrAurora\Controller;
use PetrAurora\loginService;

/**
 * @author: Rottenwood
 * @date Created: 22.09.14 19:02
 */

/**
 * Класс
 * @package PetrAurora\View
 */
class View {

    public $pagesBehindFirewall = array(
        '/aurora/error/pagenotfound',
    );

    function generate($contentView, $data = null, $templateView = 'layout.html.php') {

        // Фаерволл
        if (array_key_exists('REDIRECT_URL', $_SERVER) && !in_array($_SERVER['REDIRECT_URL'], $this->pagesBehindFirewall)) {
            $loginService = new loginService();

            //parameters are(SESSION, name of the table, name of the password field, name of the username field)
//            if (!is_null($_SESSION)) {
            //            	return;
            //            }

            if ($loginService->logincheck($_SESSION['loggedin'], "users", "password", "useremail") == false) {
                //do something if NOT logged in. For example, redirect to login page or display message.
                $loginService->loginform("loginformname", "loginformid", "src/Service/LoginService/form_action.php");
            } else {
                // Если сессия установлена
                include 'src/View/'. $templateView;
            }
        } else {
            // Если доступ к странице разрешен без пароля
            include 'src/View/'. $templateView;
        }
    }
}