<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Attribute;
use App\Models\User;
use App\Models\UserAnimal;
use Illuminate\Http\Request;
use Auth;

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

    public function animals()
    {
        $animals = Animal::query()->get();

        return response()->json($animals);
    }

    public function animal()
    {
        /** @var User $user */
        $user = Auth::user();

        $animal = $user->animal()->with(['animal','animalAttributes.attribute'])->first();

        return view('animal.index', ['animal' => $animal]);
    }

    public function store(Request $request)
    {
        /** @var User $user */
        $user = Auth::user();

        $animal = $user->animal()->create([ 'animal_id' => $request->animal_id ]);

        Attribute::all()->each(function ($attribute) use($animal) {
            /** @var UserAnimal $animal */
            $animal->animalAttributes()->create(['attribute_id' => $attribute->id]);
        });

        if($animal) {
            return response()->json([ 'success' => true ]);
        }

        return response()->json([ 'success' => false ]);
    }
}
