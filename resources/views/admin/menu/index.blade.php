@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @include('admin.partials.messages')
            <div class="col-md-2">
                <a class="btn btn-primary" href="{{@route('admin.menu.create')}}">
                    {{ __('Создать меню') }}
                </a>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Меню') }}</div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Название</th>
                                <th scope="col">Описание</th>
                                <th scope="col">Позиция</th>
                                <th scope="col">Опубликовано</th>
                                <th scope="col">Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($menus as $menu)
                                <tr>
                                    <th scope="row">{{ $menu->id }}</th>
                                    <td>{{ $menu->title }}</td>
                                    <td>{{ $menu->description }}</td>
                                    <td>{{ $menu->position }}</td>
                                    <td>{{ $menu->published_at }}</td>
                                    <td>
                                        <a href="/admin/menu/{{ $menu->id }}/edit">
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
