<?php
session_start();
require_once("models/db.php");
if (isset($_SESSION['admin']) && isset($_GET['page'])) {
    switch ($_GET['page']) {
        case 'admin':
            require_once("controllers/adminController.php");
            break;
        case 'logout':
            require_once("controllers/logoutController.php");
            break;
        case 'poste':
            require_once("controllers/posteController.php");
            break;
        case 'employe':
            require_once("controllers/employeController.php");
            break;
        case 'addAmin':
            require_once("controllers/addAminController.php");
            break;
        default:
            require_once("controllers/loginController.php");
            break;
    }
} else {
    require_once("controllers/loginController.php");
}
