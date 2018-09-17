<?php


namespace App\Repositories;


use App\Entities\Group;

class GroupRepository
{
    public function findById(int $group_id){
        return Group::findOrFail($group_id);
    }
}