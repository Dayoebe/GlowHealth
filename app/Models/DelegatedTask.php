<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property int $assigned_by
 * @property int $assigned_to
 * @property string $title
 * @property string|null $description
 * @property Carbon|null $due_at
 * @property string $status
 * @property-read User $assignee
 * @property-read User $assigner
 */
#[Fillable(['assigned_by', 'assigned_to', 'title', 'description', 'due_at', 'status'])]
class DelegatedTask extends Model
{
    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return ['due_at' => 'date'];
    }

    /**
     * @return BelongsTo<User, $this>
     */
    public function assignee(): BelongsTo
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }

    /**
     * @return BelongsTo<User, $this>
     */
    public function assigner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'assigned_by');
    }
}
