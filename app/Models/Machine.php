<?php

namespace App\Models;

use App\User;
use App\Models\Report;
use Illuminate\Database\Eloquent\Model;
use Awobaz\Compoships\Compoships;
use Illuminate\Database\Eloquent\SoftDeletes;

class Machine extends Model
{
    use Compoships, SoftDeletes;
    /**
     * Variable yang dapat menentukan primaryKey.
     */
    protected $primaryKey = 'id_machine';

    /**
     * Variable yang menentukan nama table.
     */
    protected $table = 'ms_machines';

    /**
     * Variable yang menentukan SoftDeletes
     */
    protected $dates = ['deleted_at'];

    /**
     * Variable yang mendaftarkan atribut yang bisa di isi.
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * Relation to User Model;
     * @var array
     */
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function report()
    {
        return $this->hasMany(Report::class);
    }
}
