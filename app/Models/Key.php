<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Key extends Model
{
    public $timestamps = false;
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'user_id',
        'rooms_id',
    ];

    public function room() {
        return $this->hasOne(Room::class, 'id', 'room_id');
    }

    public function user() {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
