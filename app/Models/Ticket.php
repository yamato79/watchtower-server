<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ticket extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tickets';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'subject',
        'user_id',
        'channel_id',
        'ticket_type_id',
        'department_id',
        'status_id',
    ];
    
    /**
     * Get the user that this ticket belongs to.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    /**
     * Get the user that this ticket belongs to.
     */
    public function ticketType()
    {
        return $this->belongsTo(TicketType::class);
    }
    
    /**
     * Get the department that this ticket belongs to.
     */
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
    
    /**
     * Get the status that this ticket belongs to.
     */
    public function status()
    {
        return $this->belongsTo(Status::class);
    }
}
