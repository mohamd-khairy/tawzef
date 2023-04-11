<?php

namespace App\Http\Controllers\Actions\Users;

use App\User;
use App\Models\Group;
use File, Config;
use App\Http\Helpers\Utilities;

class UpdateUserAction
{
    public function __construct()
    {
        //
    }

    public function execute($id, array $data, $permissions_user_id = null): User
    {
        // Get the user
        $user = User::find($id);

        // Get the previous group_id temporarily
        $prev_group_id = $user->group_id;
        $prev_group = Group::find($prev_group_id);

        // Store the new image if provided
        if (isset($data['image'])) {
            // Store the new image
            $data['image'] = $data['image']->store('avatar','public');
        } else {
            // Use old image
            $data['image'] = $user->image;
        }

        // If a password is given
        if (isset($data['password'])) {
            // Encrypt the password
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }

        // Update the user
        $user->update($data);
        $user->save();

        // Check if permissions_user_id is given
        if ($permissions_user_id) {
            // Update permissions from the permissions user
            $permissions_user = User::find($permissions_user_id);
            $user->permissions()->sync($permissions_user->permissions);
            $user->save();
        } else {
            // Update the user permissions if its group has been changed
            if (isset($data['permissions'])) {
                $user->permissions()->sync($data['permissions']);
            } else {
                $new_group = Group::find($user->group_id);
                if ($user->group_id != $prev_group_id) {
                    $user->permissions()->sync($new_group->permissions);
                    $user->save();
                }
            }
        }

        $user = User::find($id); // To unload the permissions relation

        return $user;
    }
}
