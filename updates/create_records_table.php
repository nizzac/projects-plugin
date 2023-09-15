<?php namespace Impelling\Projects\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

/**
 * CreateRecordsTable Migration
 *
 * @link https://docs.octobercms.com/3.x/extend/database/structure.html
 */
return new class extends Migration
{
    /**
     * up builds the migration
     */
    public function up()
    {
        Schema::create('impelling_projects_records', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('task_id')->unsigned();
            $table->integer('project_id')->unsigned();
            $table->timestamp('start')->nullable();
            $table->timestamp('end')->nullable();
            $table->integer('duration')->nullable();
            $table->text('description')->nullable();
            $table->boolean('billable')->default(0);
            $table->timestamps();
            $table->softDeletes();
            
            $table->foreign('user_id')->references('id')->on('backend_users');
            $table->foreign('task_id')->references('id')->on('impelling_projects_tasks');
            $table->foreign('project_id')->references('id')->on('impelling_projects_projects');
        });
    }

    /**
     * down reverses the migration
     */
    public function down()
    {
        Schema::dropIfExists('impelling_projects_records');
    }
};
