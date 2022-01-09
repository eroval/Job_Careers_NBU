<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\JobCategory;
use App\Models\JobListings;
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
    

    public function loadStart(){
        $categories = Categories::orderBy('created_at', 'DESC')->paginate(24);
        return view('categories', ['categories'=>$categories]);
    }

    public function loadPage($id){
        $job_ids=null;
        try{
            $job_ids = JobCategory::where('category_id','=',$id)->get(['job_id']);
            for($i=0; $i<count($job_ids); ++$i){
                $job_ids[$i] = $job_ids[$i]['job_id'];
            }
        }
        catch(Exception $e){
            $job_ids=null;
        }

        if($job_ids==null){
            return view ('search-empty');
        }

        $query = JobListings::whereIn('id', $job_ids);
        
        if(!$query->first()){
            return view ('search-empty');
        }

        $jobs = $query->orderBy('created_at', 'DESC')->paginate(5);
        return view('welcome', ['jobs'=>$jobs]);
    }
}
