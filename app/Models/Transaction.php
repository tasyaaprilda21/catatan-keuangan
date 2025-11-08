<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transactions';
    
    protected $fillable = [
        'user_id', 
        'type', 
        'category', 
        'amount', 
        'description', 
        'receipt', 
        'transaction_date'
    ];
    
    public $timestamps = true;
    
    protected $casts = [
        'transaction_date' => 'date',
        'amount' => 'decimal:2'
    ];
    
    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}