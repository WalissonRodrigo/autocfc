<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Funcionario;
use App\Models\AulaPratica;

class Instrutor extends Funcionario
{
    use CrudTrait;
    use SoftDeletes;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'instrutor';
    protected $primaryKey = 'funcionario_id';
    // public $timestamps = false;
    // protected $guarded = ['funcionario_id'];
    protected $fillable = [
        'matricula_curso_instrutor',
        'numero_cnh',
        'categoria_cnh',
        'primeira_cnh'
    ];
    // protected $hidden = [];
    protected $dates = ['deleted_at'];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */
    public function funcionario()
    {
        return $this->belongsTo(Funcionario::class);
    }

    public function aulasPraticas()
    {
        return $this->hasMany(AulaPratica::class, 'instrutor_id', 'funcionario_id');
    }
    
    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESORS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
