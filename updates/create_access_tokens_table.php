<?php

<<<<<<< HEAD
namespace Impelling\Projects\Updates;
=======
namespace Unspun\Projects\Updates;
>>>>>>> add-access-tokens

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateAccessTokensTable extends Migration
{
    /**
     * up builds the migration
     */
    public function up()
    {
<<<<<<< HEAD
        Schema::create('impelling_projects_access_tokens', function(Blueprint $table) {
=======
        Schema::create('unspun_projects_access_tokens', function(Blueprint $table) {
>>>>>>> add-access-tokens
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('project_id')->unsigned();
            $table->text('access_token')->nullable();
            $table->timestamp('expiry')->nullable();
            $table->boolean('enabled')->default(0);
            $table->string('url')->nullable();
            $table->timestamps();
            $table->softDeletes();
            
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
        Schema::dropIfExists('impelling_projects_access_tokens');
=======
        Schema::dropIfExists('unspun_projects_access_tokens');
>>>>>>> add-access-tokens
    }
}