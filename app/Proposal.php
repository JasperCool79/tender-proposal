<?php

namespace App;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    protected $guarded = [];
    protected $append = ['status_string'];
    public function getStatusStringAttribute()
    {
        $result = '';
        if($this->status === 0) {
            $result = "Pending";
        }
        if($this->status === 1) {
            $result = "Approve";
        }
        if($this->status === 2) {
            $result = "Reject";
        }
        return $result;
    }
    public function scopeOwn($query)
    {
        return $query->where('user_id', Auth::id());
    }
}