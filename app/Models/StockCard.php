<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockCard extends Model
{
    use HasFactory;
    protected $guarded = 'id';
    protected $fillable = ['item_id','qty','status','description'];
}
