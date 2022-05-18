<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Carbon\Carbon;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['settings'] = Setting::orderBy('id','desc')->paginate(15);
        // dd($data);
        // return view('admin.setting' , $data);
        return view('settings.index' , $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.create-setting');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'key' => 'required',
            'value' => 'required',
        ]);
  
        $input = $request->all();

        // $input['created_at'] = Carbon::now();
        $input['created_at'] = Carbon::now();
        $input['updated_at'] = Carbon::now();

        // dd($input);
        // Category::create($input);
        Setting::insert([
            'key' => $input['key'],
            'value' => $input['value'],
        ]);

     
        return redirect()->route('createsetting')
                        ->with('success','Category created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Setting $setting)
    {
        //
        $request->validate([
            'value' => 'required',
        ]);
  
        $input = $request->all();
        $setting->update($input);
        
        return redirect()->route('dashboard')
                        ->with('success','posts updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        //
    }
}
