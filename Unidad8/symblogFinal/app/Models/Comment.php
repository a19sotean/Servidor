<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model {
    protected $table = 'comment';

    public function blog() {
        return $this->belongsTo(Blog::class);
    }
}