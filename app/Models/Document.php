<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    public $fillable = [
        'title',
    ];
    protected $table = "documents";

    public function Documents()
    {
        return $this->hasOne(Document::class);

    }
}
