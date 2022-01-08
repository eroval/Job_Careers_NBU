<?php

namespace App\Http\Controllers;

use App\Models\JobListings;
use App\Http\Controllers\CategoriesController;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobListingsController extends Controller
{

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

}
