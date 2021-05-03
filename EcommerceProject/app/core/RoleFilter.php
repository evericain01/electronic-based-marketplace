<?php

namespace App\core;

#[\Attribute]

class RoleFilter {

    function execute() {
        if ($_SESSION['user_role'] != 'buyer') {
            header('location:' . BASE . '/Seller/index');
        } else {
            header('location:' . BASE . '/Buyer/index');
        }
    }
}
