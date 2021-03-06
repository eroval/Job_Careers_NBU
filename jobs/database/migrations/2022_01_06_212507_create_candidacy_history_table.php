<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidacyHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidacy_history', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('candidate_id')->nullable(false);
            $table->bigInteger('job_id')->nullable(false);
            $table->unique(["candidate_id", "job_id"]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('candidacy_history');
    }
}
