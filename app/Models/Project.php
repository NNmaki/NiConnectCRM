<?php

namespace App\Models;

use App\Enums\ProjectStatus;
use ArrayAccess;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    /** @use HasFactory<\Database\Factories\ProjectFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'user_id',
        'client_id',
        'deadline_at',
        'status',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function casts(): Array 
    {
        return [
            'status' => ProjectStatus::class
        ];
    }

        public function getStatusColorClass(): string
    {
        return match($this->status) {
            ProjectStatus::OPEN => 'bg-green-100 text-green-800',
            ProjectStatus::IN_PROGRESS => 'bg-blue-100 text-blue-800',
            ProjectStatus::BLOCKED => 'bg-red-100 text-red-800',
            ProjectStatus::CANCELLED => 'bg-orange-100 text-orange-800',
            ProjectStatus::COMPLETED => 'bg-gray-100 text-gray-800',
        };
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

}


