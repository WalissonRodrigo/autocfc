@extends('backpack::layout')

@section('header')
    <section class="content-header">
      <h1>
        Aulas
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ backpack_url() }}">{{ config('backpack.base.project_name') }}</a></li>
        <li class="active">Aula</li>
      </ol>
    </section>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    <div class="box-title">Aulas</div>
                </div>
                <div class="box-body">Gestão de Aulas</div>        
            </div>
        </div>
    </div>
@endsection

@section('after_scripts')

@endsection


