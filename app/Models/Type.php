<?php

namespace App\Models;

use App\User;
use App\Models\Report;
use Awobaz\Compoships\Compoships;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Type extends Model
{
    use Compoships, SoftDeletes;
    /**
     * Variable yang menentukan primaryKey.
     */
    protected $primaryKey = 'id_type';

    /**
     * Variable yang menentukan nama table.
     */
    protected $table = 'ms_types';

    /**
     * Variable yang mendaftarkan atribut yang bisa di isi.
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * Variable yang menentukan SoftDeletes
     */
    protected $dates = ['deleted_at'];

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

    public function reports()
    {
        return $this->hasMany(Report::class, 'type_id');
    }
}
