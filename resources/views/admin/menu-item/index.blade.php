@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @include('admin.partials.messages')
            <div class="col-md-2">
                <a class="btn btn-primary" href="{{@route('admin.menu-item.create')}}">
                    {{ __('Создать пункт') }}
                </a>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Пункты меню') }}</div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Название</th>
                                <th scope="col">Меню</th>
                                <th scope="col">Опубликовано</th>
                                <th scope="col">Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($items as $item)
                                <tr>
                                    <th scope="row">{{ $item->id }}</th>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->manu_id }}</td>
                                    <td>{{ $item->published_at }}</td>
                                    <td>
                                        <a href="/admin/menu-item/{{ $item->id }}/edit">
                                            <i class="bi-gear" style="font-size: 1.5em" title="Редактировать"></i>
                                        </a>
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
