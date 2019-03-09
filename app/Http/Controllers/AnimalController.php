<?php

namespace App\Http\Controllers;

class AnimalController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function animalChoice()
    {
        return view('animal-choice.animal-choice');
    }
}
