<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTodoListsTable extends Migration
{
    private $tablename = 'todo_lists';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tablename, function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->comment('標題');
            $table->text('content')->comment('內文');
            $table->string('attachment')->nullable()->comment('附件位置');
            $table->timestamp("created_at")->nullable()->comment('創建時間');
            $table->timestamp("done_at")->nullable()->comment('完成時間');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->tablename);
    }
}
