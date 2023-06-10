@extends('layouts.admin')

@section('content')
    @php
        /**
         * @var \App\Models\Category $item
         * @var \App\Models\Category[] $items
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
                                <li class="breadcrumb-item"><a href="/admin/category">{{ __('Категории') }}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ __('Категория: создание') }}</li>
                            </ol>
                        </nav>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.category.store') }}">
                            @csrf
                            <div class="row mb-3">
                                <label for="title" class="col-md-4 col-form-label text-md-end">{{ __('Название') }}</label>

                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title', $item->title) }}" required>
                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="code" class="col-md-4 col-form-label text-md-end">{{ __('Код') }}</label>

                                <div class="col-md-6">
                                    <input id="code"
                                           type="text"
                                           class="form-control
                                           @error('code') is-invalid @enderror"
                                           name="code"
                                           value="{{ old('code', $item->code) }}">
                                    @error('code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="parent_id" class="col-md-4 col-form-label text-md-end">{{ __('Родитель') }}</label>
                                <div class="col-md-6">
                                    <select class="form-select" aria-label="Позиция" id="parent_id" name="parent_id">
                                        <option value="">Выберите родителя</option>
                                        @foreach($items as $i)
                                            <option value="{{$i->id}}">{{$i->title}}</option>
                                        @endforeach
                                    </select>
                                    @error('parent_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
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
