<?php

namespace App\Console\Commands\Import;

use DB;
use Illuminate\Console\Command;

class ImportCities extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:cities';

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
        $xml = simplexml_load_file(public_path('xml_import/regions.xml'));
        foreach ($xml -> Классификатор -> Группы -> Группа as $item) {
            if($item -> Ид) {
                DB::table('regions') -> insert([
                    'name' => $item -> Наименование,
                    'slug' => $item -> БитриксКод,
                    'import_id' => $item -> Ид
                ]);
            }
        }
        foreach ($xml -> Каталог -> Товары -> Товар as $item) {
            $category = DB::table('regions')
                ->where('import_id', $item -> Группы -> Ид)
                ->first();
            if($category) {
                DB::table('regions') -> insert([
                    'name' => $item -> Наименование,
                    'slug' => $item -> ЗначенияСвойств -> ЗначенияСвойства[1] -> Значение,
                    'import_id' => $item -> Ид,
                    'parent_id' => $category -> id
                ]);
            }
        }
    }
}
