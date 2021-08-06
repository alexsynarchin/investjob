<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;

class ImportIndustries extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:industries';

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
        $xml = simplexml_load_file(public_path('xml_import/work_places.xml'));
        foreach ($xml -> Классификатор -> Группы -> Группа as $item) {
            DB::table('reference_books') -> insert([
                'name' => $item -> Наименование,
                'slug' => $item -> БитриксКод,
                'import_id' => $item -> Ид,
                'type' => 'industries',
            ]);
        }
        foreach ($xml -> Каталог -> Товары -> Товар as $item) {
            $category = DB::table('reference_books')
                ->where('import_id', $item -> Группы -> Ид)
                ->where('type', 'industries')
                ->first();
            if($category) {
                DB::table('reference_books') -> insert([
                    'name' => $item -> Наименование,
                    'slug' => $item -> ЗначенияСвойств -> ЗначенияСвойства[1] -> Значение,
                    'import_id' => $item -> Ид,
                    'type' => 'industries',
                    'parent_id' => $category -> id
                ]);
            }

        }
    }
}
