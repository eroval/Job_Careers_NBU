<?php

namespace App\Http\Controllers;

use App\Models\JobCategory;
use Exception;
use Illuminate\Http\Request;

class JobCategoryController extends Controller
{
    public function store($categoryId, $jobId){
        $jobcat = new JobCategory();
        $jobcat->category_id=$categoryId;
        $jobcat->job_id=$jobId;
        $jobcat->save();
    }
}
