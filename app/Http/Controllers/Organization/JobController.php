<?php

namespace App\Http\Controllers\Organization;

use App\Http\Controllers\Controller;
use App\Models\Job;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $job = Job::where('organization_id',$request->organization_id)->get();
        if($job){
            return response()->json(['jobs'=>$job],Response::HTTP_OK);
        }
        else{
            return response()->json(Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $job = new Job();
        DB::beginTransaction();
        try {
            $job->title = $request->title;
            $job->start_date = $request->start_date;
            $job->end_date = $request->end_date;
            $job->position = $request->position;
            $job->salary = $request->salary;
            $job->description = $request->description;
            $job->location = $request->location;
            $job->count = (int)$request->count;
            $job->province = (int)$request->province;
            $job->district = (int)$request->district;
            $job->ward = (int)$request->ward;
            $job->organization_id = (int)$request->id;
            $job->required = $request->required;
            $job->type_id = (int)$request->type;
            $job->experience_id = (int)$request->experience;
            $job->language_id = (int)$request->language;

            $job->save();
            DB::commit();
            return response()->json(Response::HTTP_OK);

        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $job = Job::find($request->id);
        if($job){
            return response()->json(['jobs'=>$job],Response::HTTP_OK);
        }
        else{
            return response()->json(Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $job = Job::find($request->id);
        DB::beginTransaction();
        try {
            $job->title = $request->title;
            $job->start_date = $request->start_date;
            $job->end_date = $request->end_date;
            $job->position = $request->position;
            $job->salary = $request->salary;
            $job->description = $request->description;
            $job->location = $request->location;
            $job->count = (int)$request->count;
            $job->province = (int)$request->province;
            $job->district = (int)$request->district;
            $job->ward = (int)$request->ward;
            $job->required = $request->required;
            $job->type_id = (int)$request->type;
            $job->experience_id = (int)$request->experience;
            $job->language_id = (int)$request->language;

            $job->save();
            DB::commit();
            return response()->json(Response::HTTP_OK);

        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
