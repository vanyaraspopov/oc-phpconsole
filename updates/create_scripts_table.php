<?php namespace RV\PhpConsole\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateScriptsTable extends Migration
{
    public function up()
    {
        Schema::create('rv_phpconsole_scripts', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('title');
            $table->string('description', 500)->nullable();
            $table->text('code');
        });
    }

    public function down()
    {
        Schema::dropIfExists('rv_phpconsole_scripts');
    }
}