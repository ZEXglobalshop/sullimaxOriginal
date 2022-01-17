@extends('templates.site')

@section('title', 'Meus Pedidos')
@section('url', route('site.myaccount.requests'))
@section('keywords', config('app.keywords'))
@section('description', config('app.description'))
@section('image', public_path('assets/img/site/core-img/favicon.ico'))
@section('image_width', 200)
@section('image_height', 200)

@section('container')
@include('includes.site.modais.delete', [
    'title' => 'Cancelar Pedido',
    'message' => 'Deseja realmente cancelar este pedido?',
    'btnmsg' => 'Cancelar Pedido'
])

<section class="container">
    <div class="content">
        @include('includes.site.account.menu')
        <div class="cont-content">
            <h1>Pedidos</h1><hr />

            @include('includes.messages')

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Status</th>
                        <th>Criado em</th>
                        <th>Atualizado em</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($requests as $request)
                    <tr>
                        <td>#{{ $request->id }}</td>
                        <td>{{ $request->statusFormat }}</td>
                        <td>{{ $request->createdAtFormat }}</td>
                        <td>{{ $request->updatedAtFormat }}</td>
                        <td>
                            <a href="{{ route('site.myaccount.requests.show', ['id' => $request->id]) }}" class="btn btn-sm btn-warning" title="Detalhes do Pedido"><i class="fa fa-info-circle"></i></a>

                            <a href="javascript:void(0)" class="btn btn-sm btn-danger btn-delete" data-route="{{ route('site.myaccount.requests.cancel', ['id' => $request->id]) }}" data-toggle="modal" data-target="#modalDelete" title="Cancelar Pedido"><i class="fa fa-ban"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @include('includes.site.paginator', ['route' => 'site.myaccount.requests'])
        </div>
    </div>
</section>
@endsection

@section('styles')
<link rel="stylesheet" type="text/css" href="{{ public_path('assets/css/site/myaccount.css') }}">
@endsection