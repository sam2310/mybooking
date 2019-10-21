<?php

namespace App\Policies;

use App\User;
use App\Room;
use Illuminate\Auth\Access\HandlesAuthorization;

class RoomPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public  function view(User $user)
    {
        return $user->user_level == 'admin';
    }

    public function manage(User $user,Room $room)
    {
        return $user->user_level == 'admin';
    }

    public function delete(User $user,Room $room)
    {
        return $user->user_level == 'admin'  && $user->id == 1;
    }
}
