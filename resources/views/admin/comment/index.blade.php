@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @include('admin.partials.messages')
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Комментарии') }}</div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Текст</th>
                                <th scope="col">Пользователь</th>
                                <th scope="col">Создано</th>
                                <th scope="col">Опубликовано</th>
                                <th scope="col">Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($items as $item)
                                <tr>
                                    <th scope="row">{{ $item->id }}</th>
                                    <td>{{ $item->text }}</td>
                                    <td>{{ $item->user_id }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>{{ $item->published_at }}</td>
                                    <td>
                                        <a href="/admin/comment/{{ $item->id }}/edit">
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
