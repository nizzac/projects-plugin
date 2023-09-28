<<<<<<< HEAD
<?php namespace Impelling\Projects\Updates;
=======
<?php namespace Unspun\Projects\Updates;
>>>>>>> add-access-tokens

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
<<<<<<< HEAD
        Schema::create('impelling_projects_records', function(Blueprint $table) {
=======
        Schema::create('unspun_projects_records', function(Blueprint $table) {
>>>>>>> add-access-tokens
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
<<<<<<< HEAD
            $table->foreign('task_id')->references('id')->on('impelling_projects_tasks');
            $table->foreign('project_id')->references('id')->on('impelling_projects_projects');
=======
            $table->foreign('task_id')->references('id')->on('unspun_projects_tasks');
            $table->foreign('project_id')->references('id')->on('unspun_projects_projects');
>>>>>>> add-access-tokens
        });
    }

    /**
     * down reverses the migration
     */
    public function down()
    {
<<<<<<< HEAD
        Schema::dropIfExists('impelling_projects_records');
=======
        Schema::dropIfExists('unspun_projects_records');
>>>>>>> add-access-tokens
    }
};
