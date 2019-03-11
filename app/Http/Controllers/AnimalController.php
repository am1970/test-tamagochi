<?php

namespace App\Http\Controllers;

use App\Exceptions\QueryExceptions\UserAnimal\NotCreateUserAnimalException;
use App\Exceptions\QueryExceptions\UserAnimalAttribute\NotCreateUserAnimalAttributeException;
use App\Http\Requests\UserAnimal\CreateUserAnimalRequest;
use App\Models\Animal;
use App\Models\Attribute;
use App\Models\User;
use App\Models\UserAnimal;
use Auth;

class AnimalController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function choice()
    {
        return view('user-animal.choice');
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function animals()
    {
        $animals = Animal::query()->get();

        return response()->json($animals);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function animal()
    {
        /** @var User $user */
        $user = Auth::user();

        $animal = $user->animal()->with(['animal','animalAttributes.attribute'])->first();

        return view('user-animal.animal', ['animal' => $animal]);
    }

    /**
     * @param CreateUserAnimalRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws NotCreateUserAnimalException
     * @throws NotCreateUserAnimalAttributeException
     */
    public function store(CreateUserAnimalRequest $request)
    {
        /** @var User $user */
        $user = Auth::user();

        try {
            /** @var UserAnimal $animal */
            $animal = $user->animal()->create($request->all());
        } catch (\Exception $e) {
            throw new NotCreateUserAnimalException();
        }

        Attribute::all()->each(function ($attribute) use($animal) {
            try {
                /** @var Attribute $attribute */
                $animal->animalAttributes()->create(['attribute_id' => $attribute->id]);
            } catch (\Exception $e) {
                throw new NotCreateUserAnimalAttributeException();
            }
        });

        return response()->json([ 'success' => true ]);
    }
}
