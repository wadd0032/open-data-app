<?php

require_once 'includes/db.php';
require_once 'includes/users.php';

if (!user_signed_in()) {
header('Location: sign-in.php');
exit;
}

$email = 'bradlet@algonquincollege.com';
$password = 'password';

user_create($db, $email, $password);
