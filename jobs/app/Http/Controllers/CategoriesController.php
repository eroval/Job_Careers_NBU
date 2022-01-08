<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Exception;
use Illuminate\Support\Facades\Auth;

class CategoriesController extends Controller
{
    public function store($categories){
        if(Auth::user() && Auth::user()->usertype=='CONTRACTOR'){
            $categories = str_replace(' ', '', $categories);
            $arr = explode(',',$categories);
            foreach($arr as $val){
                if(!empty($val)){
                    try{
                        $cat = new Categories();
                        $cat->name=$val;
                        $cat->save();
                    }
                    catch(Exception $e){
                        echo $e;
                    }
                }
            }
        }
    }
}
