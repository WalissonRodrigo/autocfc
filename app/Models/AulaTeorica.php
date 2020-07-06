<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;
use App\Models\Aluno;
use App\Models\Instrutor;
use App\Models\Sala;

class AulaTeorica extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'aula_teorica';
    protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];
    protected $casts = [
        'realizado' => 'boolean',
    ];
    protected $fillable = [
        'aluno_id', 'instrutor_id', 'sala_id',
        'data_aula', 'hora_aula', 'realizado'
    ];
    // protected $hidden = [];
    // protected $dates = [];

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
    public function aluno()
    {
        return $this->belongsTo(Aluno::class, 'aluno_id', 'pessoa_id');
    }

    public function instrutor()
    {
        return $this->belongsTo(Instrutor::class, 'instrutor_id', 'funcionario_id');
    }

    public function sala()
    {
        return $this->belongsTo(Sala::class, 'sala_id', 'id');
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
