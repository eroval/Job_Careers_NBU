<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;

class CategoriesController extends Controller
{

    private static function fetchCategoryByName($name){
        try {
            $cat = Categories::where('name','=',$name)->firstOrFail();
            return $cat;
        }
        catch(ModelNotFoundException $e){
            return null;
        }
    }

    public function store($categories, $job_id){
        $categories = str_replace(' ', '', $categories);
        $arr = explode(',',$categories);
        foreach($arr as $val){
            if(!empty($val)){
                $cat = self::fetchCategoryByName($val);
                if($cat==null){
                    $cat = new Categories();
                    $cat->name=$val;
                }
                $cat->save();
                (new JobCategoryController)->store($cat->id, $job_id);
            }
        }
    }
}
