<?php

namespace App\Http\Controllers;

use App\Events\UpdateAttribute;
use App\Http\Requests\UserAnimalAttribute\UpdateValueRequest;
use App\Models\UserAnimalAttribute;
use Auth;

class UserAnimalAttributeController extends Controller
{

    public function update(UpdateValueRequest $request, UserAnimalAttribute $attribute)
    {
        $value = config('game.max_attribute_value');

        if(!$request->is_full) {
            $value = $attribute->value-1;
        }

        $result = $attribute->update(['value' => $value]);

        if($result) {
            broadcast(new UpdateAttribute($attribute));
        }

        return response()->json(['attribute' => $attribute, 'success' => true]);
    }

}
