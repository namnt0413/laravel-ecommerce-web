<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $htmlSlelect;
    public function __construct()
    {
        $this->htmlSlelect = '';
    }

    public function create()
    {
        $data = Category::all();
        $htmlOption = $this->categoryRecusive(0);
        return view('category.add', compact('htmlOption'));
    }


    function categoryRecusive($id, $text = '')
    {
        $data = Category::all();
        foreach ($data as $value) {
            if ($value['parent_id'] == $id) {
                $this->htmlSlelect .= "<option>" . $text . $value['name'] . "</option>";
                $this->categoryRecusive($value['id'], $text. '-');
            }
        }

        return $this->htmlSlelect;

    }

    public function index()
    {
        return view('category.index');
    }
}
