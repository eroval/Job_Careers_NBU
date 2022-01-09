<?php

namespace App\Http\Controllers;

use App\Models\JobCategory;
use Exception;
use Illuminate\Http\Request;

class JobCategoryController extends Controller
{
    public function store($categoryId, $jobId){
        try{
            $jobcat = new JobCategory();
            $jobcat->category_id=$categoryId;
            $jobcat->job_id=$jobId;
            $jobcat->save();
        }
        catch(Exception $e){
            //do nothing and let the db do the job
            echo $e;
        }
    }

    public function deleteByJobId($job_id){
        $allListings = JobCategory::where('job_id','=',$job_id)->get();
        $allListings->delete();
    }
}
