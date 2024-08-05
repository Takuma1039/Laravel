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
        Schema::create('student_subject', function (Blueprint $table) {
            //student_idとsubject_idを外部キーに設定
            $table->foreignId('student_id')->constrained('students');   //参照先のテーブル名を
            $table->foreignId('subject_id')->constrained('subjects');    //constrainedに記載
            $table->primary(['student_id', 'subject_id']);  
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_subject');
    }
};
