<?php

namespace App\Models;

use App\Enums\TaskStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'user_id',
        'client_id',
        'project_id',
        'deadline_at',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'status' => TaskStatus::class,
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }


    // App/Models/Task.php
    public function getStatusColorClass(): string
    {
        return match($this->status) {
            TaskStatus::OPEN => 'bg-green-100 text-green-800',
            TaskStatus::IN_PROGRESS => 'bg-blue-100 text-blue-800',
            TaskStatus::PENDING => 'bg-gray-100 text-yellow-800',
            TaskStatus::WAITING_CLIENT => 'bg-orange-100 text-orange-800',
            TaskStatus::BLOCKED => 'bg-red-100 text-red-800',
            TaskStatus::CLOSED => 'bg-yellow-100 text-gray-800',
        };
    }


}