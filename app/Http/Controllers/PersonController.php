<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersonController extends Controller
{
    public function __invoke()
    {
        $persons = [
            [
                'id' => 1,
                'name' => 'Ivan',
                'age' => 20,
                'job' => 'developmer'
            ],
            [
                'id' => 2,
                'name' => 'Elena',
                'age' => 25,
                'job' => 'seller'
            ],
            [
                'id' => 3,
                'name' => 'Fedor',
                'age' => 27,
                'job' => 'developmer'
            ],
            [
                'id' => 4,
                'name' => 'Georgii',
                'age' => 32,
                'job' => 'director'
            ],
        ];
        return $persons;
    }
}
