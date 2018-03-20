<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Storage;
use App\Model\Product;

class AdminController extends Controller
{
    public function __construct()
    {

    }

    /**
     */
    public function index()
    {
        return view('admin/layout');
    }

    public function files() {
        $files = Storage::disk('local')->get('products/foo.txt');

        // делим по переносу строк
        $arr = explode("\r\n", $files);

        //
        $result = [];
        foreach ($arr as $line_num => $line) {
            $result[] = explode('&', $line);
        }

        // создаем товар
        $arrProduct = [];
        foreach ($result as $value) {
            $arr = [
                'name' => $value[0],
                'description' => $value[1] . ' | ' . $value[2] . ' | ' . $value[3],
                'show' => 1,
                'brand' => $value[4]
            ];

            $arrProduct[] = Product::create($arr);
        }


        return dd($arrProduct);
    }
}
