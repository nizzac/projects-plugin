<?php

namespace Impelling\Projects\Updates;

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
        Schema::create('impelling_projects_access_tokens', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('project_id')->unsigned();
            $table->text('access_token')->nullable();
            $table->timestamp('expiry')->nullable();
            $table->boolean('enabled')->default(0);
            $table->string('url')->nullable();
            $table->timestamps();
            $table->softDeletes();
            
            $table->foreign('project_id')->references('id')->on('impelling_projects_projects');
        });
    }

    /**
     * down reverses the migration
     */
    public function down()
    {
        Schema::dropIfExists('impelling_projects_access_tokens');
    }
}