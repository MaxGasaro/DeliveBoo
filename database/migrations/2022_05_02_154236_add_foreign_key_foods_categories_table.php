<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyFoodsCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('foods', function (Blueprint $table) {
            $table->unsignedBigInteger('category_food_id')->nullable();
            $table->foreign('category_food_id')->references('id')->on('categories_food')->onDelete('set null');  
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('foods', function (Blueprint $table) {
            
            $table->dropForeign('foods_category_food_id_foreign');
            $table->dropColumn('category_food_id');
        });
    }
}
