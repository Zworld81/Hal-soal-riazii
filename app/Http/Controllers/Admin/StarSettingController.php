<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\HelperController;
use App\Http\Requests\Admin\starSetting\UpdateOrCreateRequest;
use App\Models\StarSetting;
use Illuminate\Http\Request;

class StarSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $starSetting = StarSetting::first();
        return view('admin.starSetting.cu')->with(compact('starSetting'));
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
    public function store(UpdateOrCreateRequest $request)
    {
        $data = $request->validated();

        StarSetting::updateOrCreate(['id' => 1],$data);

        HelperController::flash('success', 'درخواست با موفقیت اجراشد🙂 ');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StarSetting  $starSetting
     * @return \Illuminate\Http\Response
     */
    public function show(StarSetting $starSetting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StarSetting  $starSetting
     * @return \Illuminate\Http\Response
     */
    public function edit(StarSetting $starSetting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StarSetting  $starSetting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StarSetting $starSetting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StarSetting  $starSetting
     * @return \Illuminate\Http\Response
     */
    public function destroy(StarSetting $starSetting)
    {
        //
    }
}
