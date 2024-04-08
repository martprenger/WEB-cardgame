<?php

namespace Source\controllers;

class HomeController
{
    public function handle()
    {
        $users = ['Mart', 'Shane', 'Jorn'];
        require 'view/home.php';
    }

   public function get()
        {

        }



}
