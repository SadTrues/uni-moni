<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParseSessionsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'parse_sessions',
            function (Blueprint $table) {
                $table->increments('id');
                $table->string('token', 32);
                $table->char('status', 10)->default('new');
                $table->timestamps();
                $table->softDeletes();
            }
        );

        Schema::create(
            'parse_sessions_items',
            function (Blueprint $table) {
                $table->increments('id');
                $table->integer('parse_session_id')
                    ->unsigned();
                $table->foreign('parse_session_id')
                    ->references('id')
                    ->on('parse_sessions')
                    ->onDelete('cascade');
                $table->char('url', 255);
                $table->longText('html');
                $table->char('type', 50)->default('pics');
                $table->timestamps();
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('parse_sessions_items');
        Schema::drop('parse_sessions');
    }
}
