<?php

namespace App\Http\Controllers\Actions\Groups;

use App\Http\Resources\GroupResource;
use App\Models\Group;
use Cache;
use App\User;

class GetGroupsAction
{
    public function __construct()
    {
        //
    }

    public function execute()
    {
        $groups = Group::whereIn('slug', ['customers', 'offices', 'employeer'])->get();

        return  GroupResource::collection($groups);
    }
}
