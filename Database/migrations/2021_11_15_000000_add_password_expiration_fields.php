<?php

use azankorejo\Respire\Respire;
use azankorejo\Respire\Password;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPasswordExpirationFields extends Migration
{
    private array $tables = [];
    private string $time = '';

    public function __construct()
    {
        $this->tables = Respire::tables();
        $this->time = Password::time();
    }

    public function up(Blueprint $blueprint) {
        if(count($this->tables) > 0) {
            foreach($this->tables as $table) {
                Schema::table($table, function($table) {
                    $table->timestamp('password_expiration_date')->nullable()->default($this->time);
                });
            }
        }
    }


    public function down() {
        if(count($this->tables) > 0) {
            foreach($this->tables as $table) {
                Schema::table($table, function($table) {
                    $table->dropColumn('password_expiration_date');
                });
            }
        }
    }


}