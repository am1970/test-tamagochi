<?php

namespace App\Http\Controllers;

use App\Events\SendAttributeValue;
use App\Events\UpdateAttribute;
use App\Http\Requests\UserAnimalAttribute\UpdateValueRequest;
use App\Models\UserAnimalAttribute;
use Auth;

class UserAnimalAttributeController extends Controller
{
    public function update(UpdateValueRequest $request, UserAnimalAttribute $attribute)
    {
        $value = config('game.max_attribute_value');

        if(!$request->is_full && $attribute->value) {
            $value = $attribute->value-1;
        }

        $attribute->update(['value' => $value]);

        broadcast(new UpdateAttribute($attribute))->toOthers();

        return response()->json(['attribute' => $attribute->load('attribute'), 'success' => true]);
    }

}
