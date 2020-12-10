<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mail
{

    private static $instance = null;

    private function __construct()
    {

    }

    public static function getInstance()
    {
        if (self::$instance == null)
        {
            self::$instance = new Mail();
        }

        return self::$instance;
    }

    public function sendMail($to, $from, $subject, $body) {

    }


}
