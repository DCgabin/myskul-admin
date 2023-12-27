<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option
{
    public $value;
    public $label;

    public function __construct($label, $value = null) {
        $this->label = $label;
        $this->value = $value;
    }
}
