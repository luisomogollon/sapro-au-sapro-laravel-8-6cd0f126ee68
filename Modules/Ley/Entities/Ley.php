<?php

namespace Modules\Ley\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ley extends Model
{
    use HasFactory;
    protected $table = 'leyes';
    protected $fillable = [
        'ley_margen'
    ];
    
    protected static function newFactory()
    {
        return \Modules\Ley\Database\factories\LeyFactory::new();
    }
}
