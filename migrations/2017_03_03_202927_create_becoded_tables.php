<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBecodedTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public $prefix = 'becoded_';

    public function up()
    {
        Schema::create($this->prefix.'users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create($this->prefix.'logs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('text');
            $table->string('icon')->nullable();
            $table->tinyInteger('seen')->nullable();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
        });

        Schema::create($this->prefix.'pages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pid')->nullable();
            $table->string('uri')->unique();
            $table->string('title')->nullable();
            $table->string('type');
            $table->longText('text')->nullable();
            $table->longText('excerpt')->nullable();
            $table->string('template')->nullable();
            $table->string('middleware')->nullable();
            $table->string('prefix')->nullable();
            $table->string('controller')->nullable();
            $table->string('as')->nullable();
            $table->integer('tag')->nullable();
            $table->tinyInteger('in_menu')->nullable();
            $table->tinyInteger('active')->nullable();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop($this->prefix.'users');
        Schema::drop($this->prefix.'logs');
    }
}
