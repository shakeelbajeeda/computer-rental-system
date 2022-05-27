<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Recharge_history extends Model
{
    use HasFactory;
    protected $table = 'recharge_history';

    protected $fillable = ['added_to', 'added_by', 'amount'];

    public function receiver() {
       return $this->belongsTo(User::class, 'added_to');
    }
    public function sender() {
       return $this->belongsTo(User::class, 'added_by');
    }
}
