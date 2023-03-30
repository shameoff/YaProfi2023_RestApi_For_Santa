<?php

namespace App\Http\Controllers;

use App\Models\Participant;
use Illuminate\Http\Request;

class ParticipantController extends Controller
{
    /**
     * @param $id int id of group where you add a participant
     * @return void
     */
    function createParticipant(Request $request, $id){

        $participant = new Participant;
        $participant["groupId"] = $id;
        $participant["name"] = $request["name"];
        $participant["wish"] = $request["wish"];
        $participant->save();
        return $participant["id"];
    }

    function deleteParticipant($groupId, $participantId){
        /**
         * @var Participant $participant
         */
        $participant = Participant::find($participantId);
        $participant->delete();
        return;
    }

    function getRecipient($groupId, $participantId){
        /**
         * @var Participant $participant
         */
        $participant = Participant::find($participantId);
        $recipient = Participant::find($participant["recipient"]);

        return json_encode($recipient);
    }

}
