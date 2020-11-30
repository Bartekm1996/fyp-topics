<?php

namespace App\TopicRequests;

use App\TopicRequests\States\RequestIdle;
use App\TopicRequests\States\RequestReview;
use App\TopicRequests\States\RequestSuccess;
use App\TopicRequests\States\RequestDeclined;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use HasFactory;

    const IDLE = 0;
    const REVIEW = 1;
    const SUCCESS = 2;
    const DECLINED = 3;
    private $istate;

    public function __construct() {
        $this->_setState($this->state);
    }

    private function _setState($state) {
        $defState = new RequestIdle();

        switch ($state) {
            case Request::REVIEW: $defState = new RequestReview(); break;
            case Request::SUCCESS: $defState = new RequestSuccess(); break;
            case Request::DECLINED: $defState = new RequestDeclined(); break;
        }

        $this->istate = $defState;
    }

    public function setState($state) {
        $this->_setState($state);
        $this->state = $state;
    }

    public function getState() {
        return $this->istate;
    }

    protected $fillable = [
        'note',
        'state',
        'decision_date',
        'topic_id',
        'user_id',
        'supervisor_id',
    ];

    protected $casts = [
        'updated_at' => 'datetime',
    ];
    /**
     * @var int|mixed
     */
}
