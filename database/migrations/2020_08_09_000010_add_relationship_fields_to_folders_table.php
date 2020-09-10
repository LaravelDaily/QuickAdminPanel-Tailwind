<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToFoldersTable extends Migration
{
    public function up()
    {
        Schema::table('folders', function (Blueprint $table) {
            $table->unsignedInteger('project_id');
            $table->foreign('project_id', 'project_fk_1947101')->references('id')->on('projects');
            $table->unsignedInteger('folder_id')->nullable();
            $table->foreign('folder_id', 'folder_fk_1947107')->references('id')->on('folders');
        });
    }
}
