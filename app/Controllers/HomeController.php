<?php

namespace App\Controllers;

class HomeController extends Controller
{
    /**
     * method Index
     * @return array
     */
    public function index(): array
    {
        $data = [
            'messages' => 'A Controller',
        ];

        return $data;
    }
}
