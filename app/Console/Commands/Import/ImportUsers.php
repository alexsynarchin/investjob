<?php

namespace App\Console\Commands\Import;

use App\Models\Role;
use App\Models\User;
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
            $fields = DB::connection('mysql_import') -> table('b_uts_user')
                ->where('VALUE_ID', $user -> ID) -> first();
            $profile_type = $this->checkProfileType($fields -> UF_TYPEUSER);
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
                'profile_type' =>  $profile_type,
            ]);
        }
        $users = User::all();
        foreach ($users as $user) {
            if($user->profile_type){
                $role = Role::where('slug', $user->profile_type)->first();
                $user->roles()->attach($role);
            }

        }
    }
    private function checkProfileType($type): string
    {
        $profile_type = '';
        if((int) $type === 1) {
            $profile_type = 'applicant';
        }
        if((int) $type === 2) {
            $profile_type = 'employer';
        }
        if((int) $type === 3) {
            $profile_type = 'agent';
        }
        return $profile_type;
     }
}

