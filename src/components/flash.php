<?php

function messageFlash() : void {
    if(isset($_SESSION['flash'])) {
        foreach($_SESSION['flash'] as $type => $message) {
            echo "<div class='alert alert-$type alert-dismissible fade show' role='alert'>
<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
$message</div>";
        }
        unset($_SESSION['flash']);
    }
}