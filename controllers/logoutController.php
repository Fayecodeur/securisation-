<?php 
unset($_SESSION["admin"]);
session_destroy();
return header("Location: ?page=login");
