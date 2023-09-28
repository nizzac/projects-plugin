<<<<<<< HEAD
<?php namespace Impelling\Projects\Updates;
=======
<?php namespace Unspun\Projects\Updates;
>>>>>>> add-access-tokens

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

/**
 * CreateTasksTable Migration
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
        Schema::create('impelling_projects_tasks', function(Blueprint $table) {
=======
        Schema::create('unspun_projects_tasks', function(Blueprint $table) {
>>>>>>> add-access-tokens
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('project_id')->unsigned();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('status')->nullable();
            $table->string('estimate')->nullable();
            $table->timestamp('due_date')->nullable();
            $table->integer('sort_order')->unsigned()->default(0);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('backend_users');
<<<<<<< HEAD
            $table->foreign('project_id')->references('id')->on('impelling_projects_projects');
=======
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
        Schema::dropIfExists('impelling_projects_tasks');
=======
        Schema::dropIfExists('unspun_projects_tasks');
>>>>>>> add-access-tokens
    }
};
