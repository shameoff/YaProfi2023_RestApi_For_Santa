<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    /**
     * @var int
     */
    public $id;

    /**
     * @var string
     */
    public $name = "";

    /**
     * @var string
     */
    public $description = "";
    public $participants = [];
    public function fillParticipants(){
        $this->participants = Participant::all()->where("id", "=", $this->id);
    }
}
