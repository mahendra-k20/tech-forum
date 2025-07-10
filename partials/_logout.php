<?php
session_start();
session_unset();
session_destroy();
header('Location:/tech-forum/index.php?logout=true');
?>