@extends('layouts.admin')

@section('content')
    @php
        /**
         * @var \App\Models\Menu $menu
         * @var \App\Models\Menu[] $menus
         */
    @endphp
    <div class="container">
        <div class="row justify-content-center">

            @include('admin.partials.messages')

            <div class="col-md-8">
                <div class="card">

                    <div class="card-header">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/admin/menu">{{ __('Меню') }}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ __('Меню: создание') }}</li>
                            </ol>
                        </nav>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.menu.store') }}">
                            @csrf
                            <div class="row mb-3">
                                <label for="title" class="col-md-4 col-form-label text-md-end">{{ __('Название') }}</label>

                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title', $menu->title) }}" required>
                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('Описание') }}</label>

                                <div class="col-md-6">
                                    <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description', $menu->description) }}" required>
                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="position" class="col-md-4 col-form-label text-md-end">Позиция</label>

                                <div class="col-md-6">
                                    <input id="position" type="text" class="form-control" name="position" value="{{ old('position', $menu->position) }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="parent_id" class="col-md-4 col-form-label text-md-end">{{ __('Родитель') }}</label>
                                <div class="col-md-6">
                                    <select class="form-select" aria-label="Позиция" id="parent_id" name="parent_id">
                                        <option value="">Выберите родителя</option>
                                        @foreach($menus as $m)
                                            <option value="{{$m->id}}">{{$m->description}}</option>
                                        @endforeach
                                    </select>
                                    @error('parent_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="publish" class="col-md-4 col-form-label text-md-end">{{ __('Опубликовать') }}</label>

                                <div class="col-md-6">
                                    <input
                                        class="form-check-input"
                                        type="checkbox"
                                        value="1"
                                        id="publish"
                                        name="publish" @if($menu->published_at) checked @endif
                                    >
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Сохранить') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
