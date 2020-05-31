<?php

namespace App\Http\Controllers;

use App\Job;
use App\Resume;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ResumeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {


//        return response()->download('storage/resumes/' . $uuid);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
//     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:pdf',
            'job' => 'required|string|max:255'
        ]);
        $job_id = Job::where('title', $request->job)->first()->id;
        if (Auth::user()->resume()->where('job_id',$job_id)->first()) {
            return response()->json([
                'message' => 'قبلا برای این شغل رزومه فرستادید',
                'status' => '423'
            ]);
        }
        $user_id = Auth::user()->id;
        $uuid = Str::uuid()->toString();

        $request->file('file')->storeAs('public/resumes', $uuid);
        $resume = new Resume();
        $resume->path = $uuid;
        $resume->status = Resume::SENDING;
        $resume->is_chat_enable = true;
        $resume->job()->associate($job_id);
        $resume->uploader()->associate($user_id);
        $resume->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Resume  $resume
     * @return \Illuminate\Http\Response
     */
    public function show(Resume $resume)
    {
        $path = $resume->path;
        return response()->download('storage/resumes/' . $path);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Resume  $resume
     * @return \Illuminate\Http\Response
     */
    public function edit(Resume $resume)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Resume  $resume
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Resume $resume)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Resume  $resume
     * @return \Illuminate\Http\Response
     */
    public function destroy(Resume $resume)
    {
        //
    }
}
