<?php

namespace App\Console\Commands\Import;

use Illuminate\Console\Command;
use DB;

class ImportUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $users = DB::connection('mysql_import') -> table('b_user') ->  get();
        foreach ($users as $user) {
            $fields = DB::connection('mysql_import') -> table('b_uts_user')->where('VALUE_ID', $user -> ID) -> first();

            DB::table('users')->insertOrIgnore([
                'login' => $user->LOGIN,
                'name' => $user->NAME,
                'surname' => $user->LAST_NAME,
                'patronymic'=> $user-> SECOND_NAME,
                'email' => $user->EMAIL ? $user->EMAIL : null,
                'deprecated_password' => $user->PASSWORD,
                'import_id' => $user->ID,
                'last_login' => $user->LAST_LOGIN,
                'active' => $user->ACTIVE === 'Y',
                'profile_type' =>  $fields -> UF_TYPEUSER ?? '',
            ]);
        }
    }
}

