<?php
//require_once 'debug.php';
require 'identity.php';

createTrousseau($trousseau);
//debugForm($_POST);
addAccount($trousseau, $_POST);
