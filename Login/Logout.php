<?php
session_start();
session_unset();
session_destroy();
header('Location: ../Home Off/Home_off.php');

?>