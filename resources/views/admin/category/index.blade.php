@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @include('admin.partials.messages')
            <div class="col-md-2">
                <a class="btn btn-primary" href="{{@route('admin.category.create')}}">
                    {{ __('Создать') }}
                </a>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Категории') }}</div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Название</th>
                                <th scope="col">Код</th>
                                <th scope="col">Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($items as $item)
                                <tr>
                                    <th scope="row">{{ $item->id }}</th>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->code }}</td>
                                    <td>
                                        <a href="/admin/category/{{ $item->id }}/edit">
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
