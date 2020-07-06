<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Aluno;
use App\Models\Funcionario;

class Pessoa extends Model
{
    use CrudTrait;
    use SoftDeletes;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'pessoa';
    protected $primaryKey = 'id';
    protected $dates = ['deleted_at'];
    // public $timestamps = false;
    // protected $guarded = ['id'];
    protected $fillable = [
        'nome_completo',
        'nome_pai',
        'nome_mae',
        'naturalidade',
        'nacionalidade',
        'sexo',
        'numero_cpf',
        'numero_rg',
        'nascimento', 
        'data_expedicao_rg', 
        'endereco', 
        'cidade', 
        'cep', 
        'comentarios',
        'email', 
        'telefone'
    ];
    // protected $hidden = [];

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
    public function alunos()
    {
        return $this->hasMany(Aluno::class, 'pessoa_id', 'id');
    }

    public function aluno()
    {
        return $this->hasOne(Aluno::class, 'pessoa_id', 'id');
    }
    
    public function funcionario()
    {
        return $this->hasOne(Funcionario::class, 'pessoa_id', 'id');
    }

    public function instrutor()
    {
        return $this->hasOne(Instrutor::class, 'funcionario_id', 'id');
    }

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */
    public function setTelefoneAttribute($value)
    {
        $this->attributes['telefone'] = (int)str_replace(["(", ")", " ", "-", "."], "", $value);
    }
    public function setCepAttribute($value)
    {
        $this->attributes['cep'] = (int)str_replace(["(", ")", " ", "-", "."], "", $value);
    }
    public function setNumeroCpfAttribute($value)
    {
        $this->attributes['numero_cpf'] = (int)str_replace(["(", ")", " ", "-", "."], "", $value);
    }
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
