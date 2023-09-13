<?php
/* redirection en cas d acces direect au back office */

if (!isset($_SESSION['user'])) :
    header('location: http://localhost/scripts_serveurs/Book-Hunter/public/www/users/login');
endif;
