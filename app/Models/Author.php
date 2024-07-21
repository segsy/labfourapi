<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Author extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['author_name'];
     /**
     * Get the books for the author.
     */
    public function books()
    {
        return $this->hasMany(Book::class);
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
