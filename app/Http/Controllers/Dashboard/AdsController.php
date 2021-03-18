<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAdsRequest;
use App\Http\Requests\UpdateAdsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use App\Models\Ads;
use App\Models\Category;


class AdsController extends Controller
{
    public function index()
    {
        $adses = Ads::paginate(10);
        return view('dashboard.ads.index' ,compact('adses'));
    }

    public function create()
    {
        $categories = Category::where('parent_id' , null)->get();
        return view('dashboard.ads.create',compact('categories' ));
    }

    public function store(StoreAdsRequest $request)
    {
    $data = $request->all();
    if ($request->hasFile('image')) {

        $newImage = Image::make($request->image)->encode('jpeg');
        Storage::disk('local')->put('public/images/ads/' . $request->image->hashName(), (string)$newImage,'public');
 
        $data['image'] = $request->image->hashName();
    }

    $ads = Ads::create($data);

        return redirect()->route('admin.ads.index')->with('success' , 'Ads has Created Successfully');
    }

    public function edit($id)
    {
        $ads = Ads::find($id);
        // return $ads;
        $categories = Category::where('parent_id' , null)->get();
        return view('dashboard.ads.edit' ,compact('ads','categories'));
    }

    public function update(UpdateAdsRequest $request ,$id)
    {
        $ads = Ads::find($id);

        $data = $request->all();
          if ($request->hasFile('image')) {
    
            $newImage = Image::make($request->image)->encode('jpeg');
            Storage::disk('local')->put('public/images/ads/' . $request->image->hashName(), (string)$newImage,'public');
     
            $data['image'] = $request->image->hashName();
        }
    
        $ads->update($data);
    
            return redirect()->route('admin.ads.index')->with('success' , 'Ads has Updated Successfully');
   }

     public function destroy($id)
    {
        $ads = Ads::find($id);
        $ads->delete();
        return back()->with('success' , 'Ads has deleted Successfully');

    }

    public function ads(Request $request){
        return $request;
    }
    
}


