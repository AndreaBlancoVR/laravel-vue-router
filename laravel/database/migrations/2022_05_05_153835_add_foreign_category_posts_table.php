<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignCategoryPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            // aggiungo la colonna
            $table->unsignedBigInteger('category_id')->nullable()->after('slug');
            // aggiungo la foreign
            $table->foreign('category_id')
            ->references('id')
            ->on('categories')
            ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
                // rimuovo la foreign metodo 1
            // $table->dropForeign('posts_category_id_foreign');

            // rimuovo la foreign metodo 2
            $table->dropForeign(['category_id']);
            // rimuovo colonna
            $table->dropColumn('category_id');

        
        });
    }
}
