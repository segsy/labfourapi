<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Book extends Model
{
    use HasFactory;

    use SoftDeletes;
    protected $fillable = ['title', 'description','author_id'];

    /**
     * Get the author that owns the book.
     */
    public function author()
    {
        return $this->belongsTo(Author::class);
    }
    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['filter'] ?? null, function ($query, $filter) {
            if ($filter === 'only') {
                $query->onlyTrashed();
            }
        });
    }
}
