<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_types', function (Blueprint $table) {
            $table->id();
            $table->string("description");
            $table->timestamps();
        });

        Schema::create('contacts', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('person_id');
            $table->foreign('person_id')->references('id')->on('people');

            $table->unsignedBigInteger('contact_type_id');
            $table->foreign('contact_type_id')->references('id')->on('contact_types');

            $table->string('number')->nullable()->default(null);
            $table->string('email')->nullable()->default(null);
            $table->timestamps();
        });

        DB::table('contact_types')->insert(
            array(
                'description' => 'Whatsapp',
            )
        );

        DB::table('contact_types')->insert(
            array(
                'description' => 'Phone Number',
            )
        );
        
        DB::table('contact_types')->insert(
            array(
                'description' => 'E-mail',
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacts');
    }
}
