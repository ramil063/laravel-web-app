<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateMainTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('d_categories', function (Blueprint $table) {
            $table->id();
            $table->string('title')->comment('Название');
            $table->string('code')->comment('Код');
            $table->unsignedBigInteger('parent_id')->nullable()->comment('Родитель');
            $table->timestamp('created_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Дата создания');
            $table->timestamp('updated_at')->nullable()->comment('Дата обновления');

            $table->foreign('parent_id')->references('id')->on('d_categories');
        });

        Schema::create('d_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('title')->comment('Название');
            $table->string('code')->comment('Код');
            $table->timestamp('created_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Дата создания');
            $table->timestamp('updated_at')->nullable()->comment('Дата обновления');
        });

        Schema::create('d_tags', function (Blueprint $table) {
            $table->id();
            $table->string('title')->comment('Название');
            $table->string('code')->comment('Код');
            $table->timestamp('created_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Дата создания');
            $table->timestamp('updated_at')->nullable()->comment('Дата обновления');
        });

        Schema::create('d_rubrics', function (Blueprint $table) {
            $table->id();
            $table->string('title')->comment('Название');
            $table->string('code')->comment('Код');
            $table->unsignedBigInteger('parent_id')->nullable()->comment('Родитель');
            $table->timestamp('created_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Дата создания');
            $table->timestamp('updated_at')->nullable()->comment('Дата обновления');

            $table->foreign('parent_id')->references('id')->on('d_rubrics');
        });

        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('title')->comment('Название');
            $table->string('slug')->comment('Слогин');
            $table->timestamp('published_at')->nullable()->comment('Дата публикации');
            $table->timestamp('created_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Дата создания');
            $table->timestamp('updated_at')->nullable()->comment('Дата обновления');
        });

        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title')->comment('Название');
            $table->string('slug')->comment('Слогин');
            $table->string('main_image')->nullable()->comment('Главное фото');
            $table->text('description')->nullable()->comment('Описание');
            $table->text('content')->comment('Контент');
            $table->integer('views_count')->nullable()->comment('Количество просмотров');
            $table->unsignedBigInteger('user_id')->comment('Пользователь');
            $table->unsignedBigInteger('rubric_id')->nullable()->comment('Рубрика');
            $table->unsignedBigInteger('category_id')->comment('Категория');
            $table->unsignedBigInteger('status_id')->nullable()->comment('Статус');
            $table->boolean('on_top')->default(false)->comment('Выводить сверху');
            $table->unsignedInteger('order')->default(1)->comment('Очередь');
            $table->string('author')->nullable()->comment('Автор статьи');
            $table->timestamp('published_at')->nullable()->comment('Дата публикации');
            $table->timestamp('created_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Дата создания');
            $table->timestamp('updated_at')->nullable()->comment('Дата обновления');

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('rubric_id')->references('id')->on('d_rubrics');
            $table->foreign('category_id')->references('id')->on('d_categories');
            $table->foreign('status_id')->references('id')->on('d_statuses');
        });

        Schema::create('pages_posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('page_id')->comment('Страница');
            $table->unsignedBigInteger('post_id')->comment('Статья');
            $table->unsignedInteger('order')->default(1)->comment('Порядок');
            $table->timestamp('created_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Дата создания');
            $table->timestamp('updated_at')->nullable()->comment('Дата обновления');

            $table->foreign('page_id')->references('id')->on('pages');
            $table->foreign('post_id')->references('id')->on('posts');
        });

        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('title')->comment('Название');
            $table->string('position')->comment('Позиция');
            $table->string('description')->nullable()->comment('Описание');
            $table->unsignedBigInteger('parent_id')->nullable()->comment('Родитель');
            $table->timestamp('published_at')->nullable()->comment('Дата публикации');
            $table->timestamp('created_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Дата создания');
            $table->timestamp('updated_at')->nullable()->comment('Дата обновления');

            $table->foreign('parent_id')->references('id')->on('menus');
        });

        Schema::create('pages_menus', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('page_id')->comment('Страница');
            $table->unsignedBigInteger('menu_id')->comment('Меню');
            $table->unsignedInteger('order')->nullable()->comment('Порядок');
            $table->timestamp('created_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Дата создания');
            $table->timestamp('updated_at')->nullable()->comment('Дата обновления');

            $table->foreign('page_id')->references('id')->on('pages');
            $table->foreign('menu_id')->references('id')->on('menus');
        });

        Schema::create('menu_items', function (Blueprint $table) {
            $table->id();
            $table->string('title')->comment('Название');
            $table->unsignedBigInteger('menu_id')->comment('Меню');
            $table->timestamp('published_at')->nullable()->comment('Дата публикации');
            $table->timestamp('created_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Дата создания');
            $table->timestamp('updated_at')->nullable()->comment('Дата обновления');

            $table->foreign('menu_id')->references('id')->on('menus');
        });

        Schema::create('menu_item_pages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('menu_item_id')->comment('Элемент меню');
            $table->unsignedBigInteger('page_id')->comment('Страница');
            $table->timestamp('created_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Дата создания');
            $table->timestamp('updated_at')->nullable()->comment('Дата обновления');

            $table->foreign('menu_item_id')->references('id')->on('menu_items');
            $table->foreign('page_id')->references('id')->on('pages');
        });

        Schema::create('medias', function (Blueprint $table) {
            $table->id();
            $table->string('title')->comment('Название');
            $table->string('slug')->comment('Слогин');
            $table->string('description')->nullable()->comment('Описание');
            $table->string('path')->comment('Путь к файлу');
            $table->timestamp('published_at')->nullable()->comment('Дата публикации');
            $table->timestamp('created_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Дата создания');
            $table->timestamp('updated_at')->nullable()->comment('Дата обновления');
        });

        Schema::create('albums', function (Blueprint $table) {
            $table->id();
            $table->string('title')->comment('Название');
            $table->string('slug')->comment('Слогин');
            $table->string('description')->nullable()->comment('Описание');
            $table->timestamp('published_at')->nullable()->comment('Дата публикации');
            $table->timestamp('created_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Дата создания');
            $table->timestamp('updated_at')->nullable()->comment('Дата обновления');
        });

        Schema::create('relations', function (Blueprint $table) {
            $table->id();
            $table->string('from_entity')->comment('Класс отношения');
            $table->unsignedBigInteger('from_id')->comment('Идентификатор отношения');
            $table->string('to_entity')->comment('Класс отношения');
            $table->unsignedBigInteger('to_id')->comment('Идентификатор отношения');
            $table->timestamp('created_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Дата создания');
            $table->timestamp('updated_at')->nullable()->comment('Дата обновления');
        });

        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->string('text')->comment('Текст');
            $table->unsignedBigInteger('user_id')->comment('Пользователь');
            $table->timestamp('published_at')->nullable()->comment('Дата публикации');
            $table->timestamp('created_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Дата создания');
            $table->timestamp('updated_at')->nullable()->comment('Дата обновления');

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pages_posts');
        Schema::dropIfExists('pages_menus');
        Schema::dropIfExists('menu_item_pages');
        Schema::dropIfExists('menu_items');
        Schema::dropIfExists('medias');
        Schema::dropIfExists('albums');
        Schema::dropIfExists('relations');
        Schema::dropIfExists('comments');
        Schema::dropIfExists('menus');
        Schema::dropIfExists('pages');
        Schema::dropIfExists('posts');
        Schema::dropIfExists('d_categories');
        Schema::dropIfExists('d_statuses');
        Schema::dropIfExists('d_tags');
        Schema::dropIfExists('d_rubrics');
    }
}
