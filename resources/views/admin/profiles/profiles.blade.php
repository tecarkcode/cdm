@extends('layouts.index')

@section('title', 'Dashboard')

@section('content')

    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
            
                <h4 class="header-title mt-0 mb-3">Tipos de Perfís</h4>
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                        <tr>
                            <th>#ID</th>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Dashboard</th>
                            <th>Status</th>
                            <th>Criação</th>
                            <th>Ações</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($profiles as $key => $profile)
                                <tr>
                                    <td>{{ $profile->id }}</td>
                                    <td>{{ $profile->name }}</td>
                                    <td>{{ $profile->description }}</td>
                                    <td>{!! (!is_null($profile->dashboard) ? $profile->dashboard : '<a href="#"><span class="badge bg-purple">Ver Dashs</span></a>') !!}</td>
                                    <td>
                                        <span class="badge bg-{{ (is_null($profile->deleted_at) ? $profile->status == 1 ? "success"  : "warning" : "danger") }}">                                            
                                            {{ (is_null($profile->deleted_at) ? ($profile->status == 1 ? "Ativo" : "Inativo") : "Deletado") }}
                                        </span>
                                    </td>
                                    <td>{{ Carbon\Carbon::parse($profile->created_at)->formatLocalized('%d %b, %Y') }}</td>
                                    <td>Some Buttons</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            
            </div>
        </div>    
    </div>

@endsection