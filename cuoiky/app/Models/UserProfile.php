<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;

    // Các cột có thể mass assign
    protected $fillable = [
        'user_id', 'first_name', 'last_name', 'phone', 'address', 'dob', 'avatar'
    ];

    /**
     * Quan hệ với bảng User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
