<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PenawaranModel extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'penawaran_harga';
    protected $guarded = [];
    protected $delete = ['deleted_at'];
}
