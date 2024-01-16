<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{




    use HasFactory;
    protected $table = 'todos';

    protected $fillable = [
        'title',
        'description',
        'priorityLevel',
        'isCompleted',
        'user_id',
        'category_id',
        'dateLast',
        'dateCreated',
        'dateLastFiltered',
        'isCompleted'

];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
