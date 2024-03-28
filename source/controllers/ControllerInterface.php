<?php

namespace Source\controllers;

use Source\Request;

interface ControllerInterface
{
    public function handle(Request $request);

}