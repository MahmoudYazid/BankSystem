<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create("transactions",function(Blueprint $table){
            $table->id();
            $table->foreignId("from_account_id")->constrained("users")->onDelete('cascade');
            $table->foreignId("to_account_id")->constrained("users")->onDelete('cascade');
            $table->integer("amount");
            $table->timestamp("time");
            $table->string("desc");



        });
        //
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
