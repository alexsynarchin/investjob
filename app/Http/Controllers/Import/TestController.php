<?php

namespace App\Http\Controllers\Import;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use phpDocumentor\Reflection\Types\Null_;

class TestController extends Controller
{
    public function index()
    {
        $xml = simplexml_load_file(public_path('xml_import/o_sebe.xml'));
        /*foreach ($xml -> Классификатор -> Свойства -> Свойство as $item) {

           echo "<pre>";
           print_r($item);
           echo "</pre>";
        }*/
        $i = 0;
        foreach ($xml -> Каталог -> Товары -> Товар as $item) {
            if($i === 3) {
                break;
            }

            foreach ($item->ЗначенияСвойств as $option) {
                echo "<pre>";
                print_r($item);
                echo "</pre>";
            }
            /*  echo "<pre>";
              print_r($item->ЗначенияСвойств);
              echo "</pre>";*/
            $i++;
        }
        /*
        foreach ($xml -> Классификатор -> Группы -> Группа as $item) {

            if($item -> Ид) {
                DB::table('regions') -> insert([
                    'name' => $item -> Наименование,
                    'slug' => $item -> БитриксКод,
                    'import_id' => $item -> Ид
                ]);
                echo "success <br>";
            }
        } */
    }
    function xml2array ( $xmlObject, $out = array () )
    {
        foreach ( (array) $xmlObject as $index => $node )
            $out[$index] = ( is_object ( $node ) ) ? xml2array ( $node ) : $node;

        return $out;
    }
    public function otrasli()
    {
        $xml = simplexml_load_file(public_path('xml_import/work_places.xml'));
        foreach ($xml -> Каталог -> Товары -> Товар as $item) {
            echo $item -> Наименование;
            echo '<br>';
            echo  $item -> ЗначенияСвойств -> ЗначенияСвойства[1] -> Значение;
            echo $item -> Группы -> Ид;
            echo '<br><br>';
           /* echo "<pre>";
            print_r($item);
            echo "</pre>";*/
        }
    }
    public function rezume()
    {
        $xml = simplexml_load_file(public_path('xml_import/rezume.xml'));
        /*foreach ($xml -> Классификатор -> Свойства -> Свойство as $item) {

           echo "<pre>";
           print_r($item);
           echo "</pre>";
        }*/
        $i = 0;
        foreach ($xml -> Каталог -> Товары -> Товар as $item) {
            if($i === 3) {
                break;
            }

            foreach ($item->ЗначенияСвойств as $option) {
                echo "<pre>";
                print_r($item);
                echo "</pre>";
            }
          /*  echo "<pre>";
            print_r($item->ЗначенияСвойств);
            echo "</pre>";*/
            $i++;
        }
    }
    public function users()
    {
        $users = DB::connection('mysql_import') -> table('b_user') ->  get();
        foreach ($users as $user) {
            DB::table('users') -> insert([
                'login' => $user -> LOGIN,
                'name' => $user -> NAME,
                'surname' => $user -> LAST_NAME,
                'email' => $user -> EMAIL ? $user -> EMAIL: null,
                'deprecated_password' => $user -> PASSWORD,
                'import_id' => $user -> ID,
                'last_login' => $user -> LAST_LOGIN,
                'active' => $user -> ACTIVE === 'Y',
            ]);
        }
        //print_r($users->toArray());
    }
}
