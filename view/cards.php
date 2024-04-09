<?php

require_once 'view/layouts/nav.php';

foreach ($cards as $card) {
    require 'view/layouts/Card.php';
}