<?php

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/
use App\Models\UserAnimalAttribute;

Broadcast::channel('attributes.{attribute_id}', function ($user, $attribute_id) {
    /**
     * @var \App\Models\User $user
     * @var \App\Models\UserAnimalAttribute $attribute
     */
    return (int)$user->id === (int)UserAnimalAttribute::find($attribute_id)->userAnimal()->first()->user_id;
});

Broadcast::channel('animals.{animal_id}', function ($user, $animal_id) {
    return (int)\App\Models\UserAnimal::query()->find($animal_id)->user_id === (int)$user->id;
});

