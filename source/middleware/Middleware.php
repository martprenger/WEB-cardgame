<?php

namespace Source\middleware;

use Source\Request;

interface Middleware
{
    public function handle(Request $request);

}