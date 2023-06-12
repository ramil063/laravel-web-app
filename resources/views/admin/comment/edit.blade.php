@extends('layouts.admin')

@section('content')
    @php
        /**
         * @var \App\Models\Comment $item
         * @var \App\Models\Comment[] $items
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
                                <li class="breadcrumb-item"><a href="/admin/comment">{{ __('Комментарии') }}</a></li>
                                <li class="breadcrumb-item active"
                                    aria-current="page">{{ __('Комментарий: редактирование') }}</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.comment.update', $item->id) }}">
                            @csrf
                            @method('patch')

                            <div class="row mb-3">
                                <label for="text"
                                       class="col-md-4 col-form-label text-md-end">{{ __('Текст') }}</label>

                                <div class="col-md-6">
                                    <textarea id="text" type="text"
                                           class="form-control @error('text') is-invalid @enderror" name="text"
                                           required>
                                        {{ old('text', $item->text) }}
                                    </textarea>
                                    @error('text')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="created_at"
                                       class="col-md-4 col-form-label text-md-end">{{ __('Пользователь') }}</label>

                                <div class="col-md-6">
                                    <input id="user_id" type="text" class="form-control" name="user_id"
                                           value="{{ $item->user_id }}" readonly required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="created_at"
                                       class="col-md-4 col-form-label text-md-end">{{ __('Создано') }}</label>

                                <div class="col-md-6">
                                    <input id="created_at" type="text" class="form-control" name="created_at"
                                           value="{{ $item->created_at }}" disabled>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="updated_at"
                                       class="col-md-4 col-form-label text-md-end">{{ __('Обновлено') }}</label>

                                <div class="col-md-6">
                                    <input id="updated_at" type="text" class="form-control" name="updated_at"
                                           value="{{ $item->updated_at }}" disabled>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="published_at"
                                       class="col-md-4 col-form-label text-md-end">{{ __('Опубликовано') }}</label>

                                <div class="col-md-6">
                                    <input id="published_at" type="text" class="form-control" name="published_at"
                                           value="{{ $item->published_at }}" disabled>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="publish"
                                       class="col-md-4 col-form-label text-md-end">{{ __('Опубликовать') }}</label>

                                <div class="col-md-6">
                                    <input
                                        class="form-check-input"
                                        type="checkbox"
                                        value="1"
                                        id="publish"
                                        name="publish" @if($item->published_at) checked @endif
                                        onclick="document.getElementById('published_at').value = ''"
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
                        <br>
                        <form action="{{route('admin.comment.destroy', $item->id)}}">
                            @csrf
                            @method('DELETE')
                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-danger">
                                        {{ __(' Удалить ') }}
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
