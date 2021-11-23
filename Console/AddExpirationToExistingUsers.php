<?php

use azankorejo\Respire\Database;
use azankorejo\Respire\Exceptions\ConfigModelsNotFound;
use Illuminate\Console\Command;
use azankorejo\Respire\Password;

class AddExpirationToExistingUsers extends Command
{
    protected $signature = 'respire';

    protected $description = 'Adds Password Expiration Date to Existing Users';

    public function handle()
    {
        $tables = Database::userTables();
        if(count($tables) < 1) {
            throw new ConfigModelsNotFound("Models not found in password array of respire Config  file in configs");
        }
        $time = Password::time();
        if(Database::checkColumnExist("users","password_expiration_date")){
            $existing_users = DB::table("users")
                                    ->select("id","password_expiration_date")
                                    ->whereNull("password_expiration_date")
                                    ->get();
            foreach($tables as $table) {
                foreach($existing_users as $user) {
                    $updateUser = Database::updateColumn($table,["password_confirmation_date" => $time],"id",$user->id);
                }
            }
        }
    }
}