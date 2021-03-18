<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tag;
class tagController extends Controller
{

    public function index()
    {

        $tages=Tag::all();
        return view('admin.tag.index',compact('tages'));

    }
    public function create()
    {
         return view('admin.tag.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$this->validate($request ,[
            'name_ar'=>'required|string',
            'name_en'=>'required|string',
            ]);
         Tag::create($data);

        return redirect()->route('tags.index')->with('alert' ,'تم أضافه البيانات بنجاح');
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
    public function edit($id)
    {
          $tag=Tag::findorfail($id);
         return view('admin.tag.edit' ,compact('tag'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $data=$this->validate($request ,[
            'name_ar'=>'required|string',
            'name_en'=>'required|string',
            ]);
         Tag::where('id',$id)->update($data);

        return redirect()->route('tags.index')->with('alert' ,'تم تعديل البيانات بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       Tag::where('id',$id)->delete();
       return redirect()->route('tags.index')->with('alert' ,'تم حذف البيانات بنجاح');
    }
}
