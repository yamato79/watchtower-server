<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TicketType extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Ticket Types
     */
    const TICKET = 1;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'ticket_types';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
    ];

    /**
     * Get the tickets that belong to this status.
     */
    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }    
}
