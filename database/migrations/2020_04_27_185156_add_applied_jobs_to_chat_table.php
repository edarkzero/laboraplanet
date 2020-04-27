<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAppliedJobsToChatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('chat', function (Blueprint $table) {
            $table->index('id_trabajo_aplicado');
            $table->integer('id_trabajo_aplicado')->nullable();
            //$table->foreign(['id_trabajo_aplicado'])->references('id_trabajo_aplicado')->on('applied_jobs'); //Gives error on execute
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('chat', function (Blueprint $table) {
            //$table->dropForeign('posts_user_id_foreign'); //Gives error on execute
            $table->dropIndex('id_trabajo_aplicado');
            $table->dropColumn(['id_trabajo_aplicado']);
        });
    }
}
