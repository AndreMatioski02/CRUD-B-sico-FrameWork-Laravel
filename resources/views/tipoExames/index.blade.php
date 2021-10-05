@extends('tipoExames.layout')

@section('title',__('(CRUD Laravel)'))

@push('css')
<style>
    /* Personalizar layout*/
</style>
@endpush

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between w-100">
                        <span>@lang('Listagem de Exames')</span>
                        <a href="{{ url('tipoExames/create') }}" class="btn-primary btn-sm">
                            <i class="fa fa-plus"></i> @lang('Novo Exame')
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                    @endif

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <td>ID</td>
                                <td>@lang('Nome Exame')</td>
                                <td>@lang('Sigla')</td>
                                <td>@lang('Descrição')</td>
                                <td colspan="7" class="text-center">@lang('Ações')</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tipoExames as $tipoExame)
                            <tr>
                                <td>{{$tipoExame->id}}</td>
                                <td>{{$tipoExame->nome_tpex}}</td>
                                <td>{{$tipoExame->sigla_tpex}}</td>
                                <td>{{$tipoExame->desc_tpex}}</td>
                                <td class="text-center p-0 align-middle" width="70">
                                    <a href="{{ route('tipoExames.show', $tipoExame->id)}}"
                                        class="btn btn-info btn-sm">@lang('Abrir')
                                    </a>
                                </td>
                                <td class="text-center p-0 align-middle" width="70">
                                    <a href="{{ route('tipoExames.edit', $tipoExame->id)}}"
                                        class="btn btn-primary btn-sm">@lang('Editar')
                                    </a>
                                </td>
                                <td class="text-center p-0 align-middle" width="70">
                                    <form action="{{ route('tipoExames.destroy', $tipoExame->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" type="submit">Excluir</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>
    // Script personalizado
</script>
@endpush