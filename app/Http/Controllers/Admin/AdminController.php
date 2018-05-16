<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Storage;
use App\Model\Product;
use App\Model\Category;
use App\Model\AttributesDirectoryValue;
use App\Model\ProductGroupAttributes;
use App\Model\ProductAttributes;
use App\Model\ProductGroupAttributesValue;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        return view('admin/layout');
    }

    // Добавляет товар на сайт из файла
    public function files()
    {
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

    // показ страницы экспорта одежды
    public function exportClothesView()
    {
        return view('admin/exports/clothes/index');
    }

    /**
     * Экспорт одежды
     * @param Request $request
     * @return array
     */
    public function exportClothesBegin(Request $request)
    {
        $formInput = $request->export_name;

        // получаем одежду
        $data = \Excel::selectSheetsByIndex(0)->load(storage_path('app/public/baza.xls'), function ($reader) {
//            $reader->takeRows(500);
            $result = $reader->all()->toArray();
        })->get();

        // результирующий массив
        $result = [];
        // Ввременное название
        $tempName = '';
        // объект для сбора продукта
        $tempObj = [
            'name' => '',
            'price' => 0,
            'group' => '',
            'brand' => '',
            'color' => [],
            'size' => []
        ];
        foreach ($data as $row => $val) {
            if (trim($val['Наименование']) !== $tempName) {
                // сохраним временный объект в результирующий массив и занулим массивы
                // TODO: кастыльное решение так то
                if ($row !== 0) {
                    $result[] = $tempObj;
                    $tempObj['color'] = [];
                    $tempObj['size'] = [];
                }

                $tempName = trim($val['Наименование']);

                $tempObj['name'] = trim($val['Наименование']);
                $tempObj['price'] = $val['Цена'] === null ? 0 : $val['Цена'];
                $tempObj['group'] = $val['Группа'];
                $tempObj['brand'] = $val['Бренд'];
                $tempObj['color'][] = $val['Цвет'];
                $tempObj['size'][] = $val['Размеры'] . '---' . (($val['Цена'] === null ? $tempObj['price'] : $val['Цена']) - $tempObj['price']);
            } else {
                // проверяем есть ли цвет в массиве
                if (!in_array($val['Цвет'], $tempObj['color'])) {
                    $tempObj['color'][] = $val['Цвет'];
                }
                // проверяем есть ли размер и высчитаем его цену
                $sizeString = $val['Размеры'] . '---' . (($val['Цена'] === null ? $tempObj['price'] : $val['Цена']) - $tempObj['price']);
                if (!in_array($sizeString, $tempObj['size'])) {
                    $tempObj['size'][] = $sizeString;
                }
            }
        }
        // добавим последний
        $result[] = $tempObj;

//        dd($result);

        $dd = [];
        // создаем модели
        foreach ($result as $value) {

            // заполняем описпние
            $description = '';
            foreach ($value['color'] as $val) {
                $description .= $val . ' ';
            }
            $description .= "\r\n" . " | ";
            foreach ($value['size'] as $val) {
                $description .= $val . "\r\n" . " | ";
            }

            // определяем категорию

            $arr = [
                'name' => $value['name'],
                'description' => $description,
                'show' => 1,
                'brand' => $value['brand'],
                'price' => $value['price'],
                'category_id' => $this->getCategory($value['group'])
            ];
            $newProduct = Product::create($arr);
            $dd[] = $arr;

            // ==================================Атрибут_Цвет=================================

            if ($value['color'][0]) {
                //Создаем Атрибут товара - Цвет
                $attrProductID = ProductGroupAttributes::create([
                    'name' => $value['name'] . '___Цвет',
                    'attributes_directories_id' => 1,
                    'type' => 'Цвет'
                ]);
                // Создаем значения цвета атрибуты
                foreach ($value['color'] as $val) {
                    $AttributesDirectoryValue = AttributesDirectoryValue::where('name', '=', $val)->first();
                    if ($AttributesDirectoryValue && $AttributesDirectoryValue->type === 'Цвет') {
                        ProductGroupAttributesValue::create([
                            'product_group_attributes_id' => $attrProductID->id,
                            'attributes_directory_values_id' => $AttributesDirectoryValue->id,
                            'price' => 0
                        ]);
                    }
                }
                // Создаем Привязку товара к атрибуту
                ProductAttributes::create([
                    'product_id' => $newProduct->id,
                    'product_group_attributes_id' => $attrProductID->id
                ]);
            }

            // ==================================Атрибут_Размер=================================

            // Узнаем тип размера: 'Размер одежды' или 'Размер одежды списком'
            if ($value['size'][0]) {
                $explodeSize = explode('---', $value['size'][0]);
                if ($explodeSize[0]) {
                    $arrrBd = AttributesDirectoryValue::where('name', '=', $explodeSize[0])->first();
                    if ($arrrBd) {
                        $firstSize = $arrrBd;
                        //Создаем Атрибут товара - Размер
                        $attrProductIdSize = ProductGroupAttributes::create([
                            'name' => $value['name'] . '___Размер',
                            'attributes_directories_id' => $firstSize->type === 'Размер одежды' ? 3 : 4,
                            'type' => $firstSize->type
                        ]);
                        // Создаем значения цвета атрибуты
                        foreach ($value['size'] as $val) {
                            // Разбиваем значение на 2
                            $valSizePrice = explode('---', $val);

                            if ($valSizePrice[0]) {

                                $AttributesDirectoryValue = AttributesDirectoryValue::where('name', '=', $valSizePrice[0])->get()[0];

                                ProductGroupAttributesValue::create([
                                    'product_group_attributes_id' => $attrProductIdSize->id,
                                    'attributes_directory_values_id' => $AttributesDirectoryValue->id,
                                    'price' => $valSizePrice[1]
                                ]);

                            }
                        }
                        // Создаем Привязку товара к атрибуту
                        ProductAttributes::create([
                            'product_id' => $newProduct->id,
                            'product_group_attributes_id' => $attrProductIdSize->id
                        ]);
                    }
                }
            }
        }

        dd($dd);

        return $dd;
    }

    public function getCategory($value)
    {
        $arr = [
            32 => 'Пуанты',
            33 => 'Мягкая балетная обувь',
            34 => 'Джазовая обувь',
            35 => 'Народно-характерная обувь',
            36 => 'Обувь для бальных танцев',
            37 => 'Сценическая обувь',
            38 => 'Кроссовки для танцев и фитнеса',
            39 => 'Обувь для разогрева',
            40 => 'Полутапочки',

            41 => 'Купальники',
            42 => 'Футболки,майки,топы',
            43 => 'Юбки',
            44 => 'Брюки,легинсы,шорты,бриджи',
            45 => 'Колготки,трико,носки,гетры',
            46 => 'Одежда для сброса веса',
            47 => 'Одежда для разогрева',
            48 => 'Нижнее бельё',
            49 => 'Комбинезоны',
            50 => 'Одежда для бальных танцев'
        ];

        return array_search($value, $arr);
    }

    /**
     * Метод получает все уникальные атрибуты размера Одежды
     */
    public function getAllClothesAttributesSize()
    {
        // получаем одежду
        $data = \Excel::selectSheetsByIndex(0)->load(storage_path('app/public/baza.xls'), function ($reader) {
            $result = $reader->all()->toArray();
        })->get();

        $size = [];
        foreach ($data as $row => $val) {
            if (!in_array($val['Размеры'], $size, true)) {
                $size[] = $val['Размеры'];
            }
        }
        natsort($size);

        dd($size);
        return $size;
    }

    /**
     * Метод получает все уникальные атрибуты цвета Одежды
     */
    public function getAllClothesAttributesColor()
    {
        // получаем одежду
        $data = \Excel::selectSheetsByIndex(0)->load(storage_path('app/public/baza.xls'), function ($reader) {
            $result = $reader->all()->toArray();
        })->get();

        $color = [];
        foreach ($data as $row => $val) {
            if (!in_array($val['Цвет'], $color, true)) {
                $color[] = $val['Цвет'];
            }
        }

        dd($color);
        return $color;
    }

    /**
     * Экспорт обуви
     * @param Request $request
     * @return array
     */
    public function exportShoesBegin(Request $request)
    {
        $formInput = $request->export_name;

        // получаем одежду
        $data = \Excel::selectSheetsByIndex(1)->load(storage_path('app/public/baza.xls'), function ($reader) {
//            $reader->takeRows(500);
            $result = $reader->all()->toArray();
        })->get();

        // результирующий массив
        $result = [];
        // Ввременное название
        $tempName = '';
        // объект для сбора продукта
        $tempObj = [
            'name' => '',
            'price' => 0,
            'group' => '',
            'brand' => '',
            'color' => [],
            'size' => [],
            //полнота обуви
            'volume' => [],
            //жескость обуви
            'hardness' => []
        ];
        foreach ($data as $row => $val) {
            if ($val['Наименование'] !== $tempName) {
                // сохраним временный объект в результирующий массив и занулим массивы
                // TODO: кастыльное решение так то
                if ($row !== 0) {
                    $result[] = $tempObj;
                    $tempObj['color'] = [];
                    $tempObj['size'] = [];
                    $tempObj['volume'] = [];
                    $tempObj['hardness'] = [];
                }

                $tempName = $val['Наименование'];

                $tempObj['name'] = $val['Наименование'];
                $tempObj['price'] = $val['Цена'] === null ? 0 : $val['Цена'];
                $tempObj['group'] = $val['Группа'];
                $tempObj['brand'] = $val['Бренд'];
                $tempObj['color'][] = $val['Цвет'];
                $tempObj['size'][] = $val['Размеры'] . '---' . (($val['Цена'] === null ? $tempObj['price'] : $val['Цена']) - $tempObj['price']);
                if ($val['Полнота'] !== null) {
                    $tempObj['volume'][] = $val['Полнота'];
                }
                if ($val['Жесткость'] !== null) {
                    $tempObj['hardness'][] = $val['Жесткость'];
                }
            } else {
                // проверяем есть ли цвет в массиве
                if (!in_array($val['Цвет'], $tempObj['color'])) {
                    $tempObj['color'][] = $val['Цвет'];
                }
                // проверяем есть ли размер и высчитаем его цену
                $sizeString = $val['Размеры'] . '---' . (($val['Цена'] === null ? $tempObj['price'] : $val['Цена']) - $tempObj['price']);
                if (!in_array($sizeString, $tempObj['size'])) {
                    $tempObj['size'][] = $sizeString;
                }
                // проверяем есть ли полнота в массиве
                if ($val['Полнота'] !== null && !in_array($val['Полнота'], $tempObj['volume'])) {
                    $tempObj['volume'][] = $val['Полнота'];
                }
                // проверяем есть ли цвет в массиве
                if ($val['Жесткость'] !== null && !in_array($val['Жесткость'], $tempObj['hardness'])) {
                    $tempObj['hardness'][] = $val['Жесткость'];
                }
            }
        }
        // добавим последний
        $result[] = $tempObj;

//        dd($result);

        $dd = [];
        // создаем модели
        foreach ($result as $value) {
            // заполняем описпние
            $description = 'Цвет: ';
            foreach ($value['color'] as $val) {
                $description .= $val . "\r\n" . ' | ';
            }
            $description .= "\r\n" . " | Размер: ";
            foreach ($value['size'] as $val) {
                $description .= $val . "\r\n" . " | ";
            }
            if (count($value['volume']) > 0) {
                $description .= 'Полнота: ' . "\r\n" . " | ";
                foreach ($value['volume'] as $val) {
                    $description .= $val . "\r\n" . " | ";
                }
            }
            if (count($value['hardness']) > 0) {
                $description .= 'Жесткость: ' . "\r\n" . " | ";
                foreach ($value['hardness'] as $val) {
                    $description .= $val . "\r\n" . " | ";
                }
            }

            // определяем категорию

            $arr = [
                'name' => $value['name'],
                'description' => $description,
                'show' => 1,
                'brand' => $value['brand'],
                'price' => $value['price'],
                'category_id' => $this->getCategory($value['group'])
            ];
            $newProduct = Product::create($arr);
            $dd[] = $arr;

            // ==================================Атрибут_Цвет=================================
//            if ($value['color'][0]) {
//                $arrrBd = AttributesDirectoryValue::where('name', '=', $value['color'][0])->first();
//                if ($arrrBd) {
//                    //Создаем Атрибут товара - Цвет
//                    $attrProductID = ProductGroupAttributes::create([
//                        'name' => $value['name'] . '___Цвет',
//                        'attributes_directories_id' => $arrrBd->type === 'Цвет' ? 1 : 2,
//                        'type' => $arrrBd->type
//                    ]);
//                    // Создаем значения цвета атрибуты
//                    foreach ($value['color'] as $val) {
//                        $AttributesDirectoryValue = AttributesDirectoryValue::where('name', '=', $val)->first();
//                        if ($AttributesDirectoryValue && $AttributesDirectoryValue->type === 'Цвет') {
//                            ProductGroupAttributesValue::create([
//                                'product_group_attributes_id' => $attrProductID->id,
//                                'attributes_directory_values_id' => $AttributesDirectoryValue->id,
//                                'price' => 0
//                            ]);
//                        }
//                    }
//                    // Создаем Привязку товара к атрибуту
//                    ProductAttributes::create([
//                        'product_id' => $newProduct->id,
//                        'product_group_attributes_id' => $attrProductID->id
//                    ]);
//                }
//            }

            // ==================================Атрибут_Размер=================================
            // Узнаем тип размера: 'Размер обуви' или 100500
//            if ($value['size'][0]) {
//                $explodeSize = explode('---', $value['size'][0]);
//                if ($explodeSize[0]) {
//                    $arrrBd = AttributesDirectoryValue::where('name', '=', $explodeSize[0])->first();
//                    if ($arrrBd) {
//                        $firstSize = $arrrBd;
//                        //Создаем Атрибут товара - Размер
//                        $attrProductIdSize = ProductGroupAttributes::create([
//                            'name' => $value['name'] . '___Размер',
//                            'attributes_directories_id' => $firstSize->type === 'Размер обуви' ? 5 : 100500,
//                            'type' => $firstSize->type
//                        ]);
//                        // Создаем значения размера атрибуты
//                        foreach ($value['size'] as $val) {
//                            // Разбиваем значение на 2
//                            $valSizePrice = explode('---', $val);
//
//                            if ($valSizePrice[0]) {
//
//                                $AttributesDirectoryValue = AttributesDirectoryValue::where('name', '=', $valSizePrice[0])->first();
//
//                                ProductGroupAttributesValue::create([
//                                    'product_group_attributes_id' => $attrProductIdSize->id,
//                                    'attributes_directory_values_id' => $AttributesDirectoryValue->id,
//                                    'price' => $valSizePrice[1]
//                                ]);
//
//                            }
//                        }
//                        // Создаем Привязку товара к атрибуту
//                        ProductAttributes::create([
//                            'product_id' => $newProduct->id,
//                            'product_group_attributes_id' => $attrProductIdSize->id
//                        ]);
//                    }
//                }
//            }

            // ==================================Атрибут_Полнота=================================
//            if ($value['volume'][0]) {
//                $arrrBd = AttributesDirectoryValue::where('name', '=', $value['volume'][0])->first();
//                if ($arrrBd) {
//                    //Создаем Атрибут товара - Цвет
//                    $attrProductID = ProductGroupAttributes::create([
//                        'name' => $value['name'] . '___Полнота',
//                        'attributes_directories_id' => $arrrBd->type === 'Полнота' ? 6 : 100501,
//                        'type' => $arrrBd->type
//                    ]);
//                    // Создаем значения полноты атрибуты
//                    foreach ($value['volume'] as $val) {
//                        $AttributesDirectoryValue = AttributesDirectoryValue::where('name', '=', $val)->first();
//                        if ($AttributesDirectoryValue) {
//                            ProductGroupAttributesValue::create([
//                                'product_group_attributes_id' => $attrProductID->id,
//                                'attributes_directory_values_id' => $AttributesDirectoryValue->id,
//                                'price' => 0
//                            ]);
//                        }
//                    }
//                    // Создаем Привязку товара к атрибуту
//                    ProductAttributes::create([
//                        'product_id' => $newProduct->id,
//                        'product_group_attributes_id' => $attrProductID->id
//                    ]);
//                }
//            }

            // ==================================Атрибут_Жескость=================================
//            if ($value['hardness'][0]) {
//                $arrrBd = AttributesDirectoryValue::where('name', '=', $value['hardness'][0])->first();
//                if ($arrrBd) {
//                    //Создаем Атрибут товара - Цвет
//                    $attrProductID = ProductGroupAttributes::create([
//                        'name' => $value['name'] . '___Жескость',
//                        'attributes_directories_id' => $arrrBd->type === 'Жескость' ? 7 : 100502,
//                        'type' => $arrrBd->type
//                    ]);
//                    // Создаем значения полноты атрибуты
//                    foreach ($value['hardness'] as $val) {
//                        $AttributesDirectoryValue = AttributesDirectoryValue::where('name', '=', $val)->first();
//                        if ($AttributesDirectoryValue) {
//                            ProductGroupAttributesValue::create([
//                                'product_group_attributes_id' => $attrProductID->id,
//                                'attributes_directory_values_id' => $AttributesDirectoryValue->id,
//                                'price' => 0
//                            ]);
//                        }
//                    }
//                    // Создаем Привязку товара к атрибуту
//                    ProductAttributes::create([
//                        'product_id' => $newProduct->id,
//                        'product_group_attributes_id' => $attrProductID->id
//                    ]);
//                }
//            }
        }

        dd($dd);

        return $dd;
    }

    /**
     * Метод получает все уникальные атрибуты размера обуви
     */
    public function getAllShoesAttributesSize()
    {
        // получаем одежду
        $data = \Excel::selectSheetsByIndex(1)->load(storage_path('app/public/baza.xls'), function ($reader) {
            $result = $reader->all()->toArray();
        })->get();

        $size = [];
        foreach ($data as $row => $val) {
            if (!in_array($val['Размеры'], $size, true)) {
                $size[] = $val['Размеры'];
            }
        }
        natsort($size);

        dd($size);
        return $size;
    }

    /**
     * Метод получает все уникальные атрибуты цвета обуви
     */
    public function getAllShoesAttributesColor()
    {
        // получаем одежду
        $data = \Excel::selectSheetsByIndex(1)->load(storage_path('app/public/baza.xls'), function ($reader) {
            $result = $reader->all()->toArray();
        })->get();

        $color = [];
        foreach ($data as $row => $val) {
            if (!in_array($val['Цвет'], $color, true)) {
                $color[] = $val['Цвет'];
            }
        }

        dd($color);
        return $color;
    }

    /**
     * Метод получает все уникальные атрибуты полноты обуви
     */
    public function getAllShoesAttributesVolume()
    {
        // получаем одежду
        $data = \Excel::selectSheetsByIndex(1)->load(storage_path('app/public/baza.xls'), function ($reader) {
            $result = $reader->all()->toArray();
        })->get();

        $color = [];
        foreach ($data as $row => $val) {
            if ($val['Полнота'] !== null && !in_array($val['Полнота'], $color, true)) {
                $color[] = $val['Полнота'];
            }
        }

        dd($color);
        return $color;
    }

    /**
     * Метод получает все уникальные атрибуты жескости обуви
     */
    public function getAllShoesAttributesHardness()
    {
        // получаем одежду
        $data = \Excel::selectSheetsByIndex(1)->load(storage_path('app/public/baza.xls'), function ($reader) {
            $result = $reader->all()->toArray();
        })->get();

        $color = [];
        foreach ($data as $row => $val) {
            if ($val['Жесткость'] !== null && !in_array($val['Жесткость'], $color, true)) {
                $color[] = $val['Жесткость'];
            }
        }

        dd($color);
        return $color;
    }
}
