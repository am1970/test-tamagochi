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
use App\Models\UserAnimal;

Broadcast::channel('animal.{id}', function ($user, $id) {
    return $user->id == UserAnimal::query()->find($id)->first()->user_id;
});

