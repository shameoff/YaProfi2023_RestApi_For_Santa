<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    use HasFactory;
    protected $table = 'participants';
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
    public $wish = "";

    /**
     * @var integer
     */
    public $recipient;

    /**
     * @var string
     */
    public $groupId = "";
}
