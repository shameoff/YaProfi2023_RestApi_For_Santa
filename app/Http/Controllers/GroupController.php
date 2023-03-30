<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Participant;
use Illuminate\Http\Request;
use function MongoDB\BSON\toJSON;

class GroupController extends Controller
{
    function createGroup(Request $request)
    {

        $group = new Group;
        $group["name"] = $request->input("name");
        $group["description"] = $request->input("description");
        $group->save();
        return $group["id"];
    }

    function getGroups()
    {
        $groups = Group::all(['id', 'name', 'description']);
        return json_encode($groups);
    }

    function getGroup($id)
    {
        $participants = Participant::where('groupId', '=', $id);
        /**
         * @var Group $group
         */
        $group = Group::find($id);
        $group->fillParticipants();
        return json_encode($group);

    }

    function editGroup($id, Request $request)
    {
        /**
         * @var Group $group
         */
        $group = Group::find($id);
        $name = $request->input("name");
        if ($name != null) {
            $group["name"] = $request->input("name");
        }
        $group["description"] = $request->input("description");
        $group->save();
        return 15;
    }

    function deleteGroup($id)
    {
        /**
         * @var Group $group
         */
        $group = Group::find($id);
        $group->delete();
        return;
    }

    function makeToss($id)
    {
        $group = Group::find($id);
        if (!$group){
            return response(content: "Group with id $id not found", status: 404);
        }

        $participants = Participant::all(["id", "name", "wish", 'groupId'])->where("groupId", $id);;

        if (count($participants) <= 3) {
            return response(content: 'Not enough participants', status: 400);
        }
        else {
            $ids = [];

            foreach ($participants as $participant) {
                $ids[] = $participant["id"];
            }
        }
    }
}
