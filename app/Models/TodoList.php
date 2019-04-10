<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TodoList extends Model
{
    use SoftDeletes;

    const UPDATED_AT = null;
    const UNDONE = 'undone';
    const DONE = 'done';

    protected $table = "todo_lists";
    protected $fillable = [
        'title', 'content', 'attachment', 'done_at',
    ];
}
