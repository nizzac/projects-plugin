<<<<<<< HEAD
<?php namespace Impelling\Projects\Updates;
=======
<?php namespace Unspun\Projects\Updates;
>>>>>>> add-access-tokens

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

/**
 * CreateProjectsTable Migration
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
        Schema::create('impelling_projects_projects', function(Blueprint $table) {
=======
        Schema::create('unspun_projects_projects', function(Blueprint $table) {
>>>>>>> add-access-tokens
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('api_id')->nullable();
            $table->string('name')->nullable();
            $table->integer('allowance')->nullable();
            $table->integer('rate')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * down reverses the migration
     */
    public function down()
    {
<<<<<<< HEAD
        Schema::dropIfExists('impelling_projects_projects');
=======
        Schema::dropIfExists('unspun_projects_projects');
>>>>>>> add-access-tokens
    }
};
