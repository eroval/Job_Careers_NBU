<?php

namespace App\Http\Controllers;

use App\Models\JobListings;
use App\Http\Controllers\CategoriesController;
use App\Models\Categories;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\JobCategory;

class JobListingsController extends Controller
{

    private static function getUserNameByJob($job){
        return User::findOrFail($job['contractor_id'])['name'];
    }

    private static function getCategoriesByCategoryId($id){
        return Categories::findOrFail($id)['name'];
    }

    private static function getCategoriesByJob($job){
        $categories_id = JobCategory::where('job_id','=',$job->id)->get(['category_id']);
        $categories = strval($categories_id[0]['category_id']);
        for($i=1; $i<count($categories_id); ++$i){
            $categories = $categories . ',' . strval($categories_id[$i]['category_id']);
        }
        // foreach($category_ids as $val){
        //     $val = self::getCategoriesByCategoryId($val['category_id']);
        // }
        return $categories;
    }

    public function create(){
        return view('job-create');
    }

    public function store(Request $req){
        if(Auth::user() && Auth::user()->usertype=='CONTRACTOR'){
            $jobs = new JobListings();
            $jobs->title = $req->title;
            $jobs->description = $req->description;
            $jobs->contractor_id=Auth::user()->id;
            $jobs->save();
            (new CategoriesController)->store($req->categories, $jobs->id);
            return redirect('create-jobs')->with('status','successfully added');
        }
        abort(403);
    }

    public function loadStart(){
        $allJobs = JobListings::orderBy('created_at', 'DESC')->paginate(5);
        foreach($allJobs as $val){
            $val['user'] = self::getUserNameByJob($val);
        }
        return view('welcome', ['jobs'=>$allJobs]);
    }

    public function loadPage($id){
        $job = JobListings::findOrFail($id);
        $job['user'] = self::getUserNameByJob($job);
        return view('job', ['job'=>$job]);
    }

    public function editPage($id){
        $job = JobListings::findOrFail($id);
        if(Auth::user() && Auth::user()->id==$job->contractor_id){
            $job['categories'] = self::getCategoriesByJob($job);
            return view('job-edit', ['job'=>$job]);
        }
        abort(403);
    }

    // public function updateArticle(Request $req){
    //     if(Auth::user()){
    //         $article = Article::findOrFail($req->id);
    //         if($article->author_id==Auth::user()->id){
    //             $article->headline=$req->headline;
    //             $article->content=$req->content;
    //             $article->save();
    //         }
    //         return redirect('edit-article/' . $article->id)->with('status', 'successfully updated');
    //     }
    //     abort(403);
    // }
}
