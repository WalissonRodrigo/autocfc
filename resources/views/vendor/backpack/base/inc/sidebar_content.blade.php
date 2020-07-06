<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->
<li><a href="{{ backpack_url('dashboard') }}"><i class="fa fa-dashboard"></i> <span>{{ trans('backpack::base.dashboard') }}</span></a></li>

@if(backpack_user()->can('Gerir Aulas'))
<li><a href='{{ backpack_url('aulas') }}'><i class='fa fa-graduation-cap'></i> <span>Aulas</span></a></li>
@endif
@if(backpack_user()->can('Gerir Alunos'))
<li><a href='{{ backpack_url('aluno') }}'><i class='fa fa-user-plus'></i> <span>Alunos</span></a></li>
@endif
@if(backpack_user()->can('Despesas Veiculares'))
<li><a href='{{ backpack_url('despesa') }}'><i class='fa fa-car'></i> <span>Despesas Veiculares</span></a></li>
@endif

@if(backpack_user()->can('Gerir Veículos') || backpack_user()->can('Gerir Funcionários') || backpack_user()->can('Gerir Salas'))
<li class="treeview">
	<a href="#">
		<i class="fa fa-empire"></i> <span><small>Gestão do CFC</small></span>
		<span class="pull-right-container">
			<i class="fa fa-angle-left pull-right"></i>
		</span>
	</a>
	<ul class="treeview-menu">
		@if(backpack_user()->can('Gerir Veículos'))
		<li><a href='{{ backpack_url('veiculo') }}'><i class='fa fa-car'></i> Veículos</a></li>
		@endif
		@if(backpack_user()->can('Gerir Funcionários'))
		<li><a href='{{ backpack_url('funcionario') }}'><i class='fa fa-user'></i> Funcionários</a></li>
		@endif
		@if(backpack_user()->can('Gerir Salas'))
		<li><a href='{{ backpack_url('sala') }}'><i class='fa fa-th-list '></i> Salas</a></li>
		@endif
	</ul>
</li>
@endif

@if(backpack_user()->can('Gerir Usuários') || backpack_user()->can('Gerir Perfis') || backpack_user()->can('Gerir Permissões'))
<!-- Users, Roles, Permissions -->
<li class="treeview">
	<a href="#">
		<i class="fa fa-group"></i> <span><small>Autenticação e Permissão</small></span>
		<span class="pull-right-container">
		  <i class="fa fa-angle-left pull-right"></i>
		</span>
	</a>
	<ul class="treeview-menu">
		@if(backpack_user()->can('Gerir Usuários'))
		<li><a href="{{ backpack_url('user') }}"><i class="fa fa-user"></i>Usuários</a></li>
		@endif
		@if(backpack_user()->can('Gerir Perfis'))
		<li><a href="{{ backpack_url('role') }}"><i class="fa fa-group"></i>Perfis</a></li>
		@endif
		@if(backpack_user()->can('Gerir Permissões'))
		<li><a href="{{ backpack_url('permission') }}"><i class="fa fa-key"></i>Permissões</a></li>
		@endif
	</ul>
</li>
@endif