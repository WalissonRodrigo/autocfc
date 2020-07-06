<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;
use App\Models\Pessoa;
use App\Models\AulaPratica;
use App\Models\AulaTeorica;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

class Aluno extends Pessoa
{
    use CrudTrait;
    use SoftDeletes;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'aluno';
    protected $primaryKey = 'pessoa_id';
    // public $timestamps = false;
    //protected $guarded = ['pessoa_id'];
    protected $fillable = ['categoria_cnh', 'numero_cnh', 'data_primeira_cnh'];

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
    public function pessoa()
    {
        return $this->belongsTo(Pessoa::class, 'pessoa_id', 'id');
    }

    public function aulasPraticas()
    {
        return $this->hasMany(AulaPratica::class, 'aluno_id', 'pessoa_id');
    }
    
    public function aulasTeoricas()
    {
        return $this->hasMany(AulaTeorica::class, 'aluno_id', 'pessoa_id');
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
    // public function getDataPrimeiraCnhAttribute($key)
    // {
    //     return Carbon::parse($key)->format("d/m/Y");
    // }
}
