<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \App\Tour;
use \App\Guide;

use \Input as Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

use DB;

class ToursController extends Controller
{
    //トップページでツアー一覧を表示
    public function index()
    {
        $data = [];
        $user = \Auth::user();
        $tours = DB::table('tours')->orderBy('created_at', 'desc')->paginate(10);
        //dd($user);
        
        
        return view('welcome', ['tours' => $tours, 'user' => $user]);

        $data = [
            'tour' => $tour,
        ];
        $data += $this->counts($tour);
    }
    //新しい観光プラン作成フォームに移動
    public function create(){
        return view('tours.create');
    }
    //観光プランを新たに保存
    public function store(Request $request)
    {
        $this->validate($request, [
            'tour_name' => 'required',
            'place' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'price' => 'required|max:5',
            'category' => 'required',
            'content' => 'required',
            'thum' => 'file',
        ]);
        
        //\Auth::guard('guide')->user()にするとトップページで一覧表示できる
        $tour = \Auth::guard('guide')->user()->tours()->create([
            'tour_name' => $request->tour_name,
            'place' => $request->place,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'price' => $request->price,
            'category' => $request->category,
            'content' => $request->content,
            'thum'=> $request->file('thum')->store('images'),
            
        ]);
        if ($request->file('thum')->isValid([])){
            //そのまま処理
        }else{
            return redirect()
                ->back()
                ->withInput()
                ->withErrors(['file' => '画像がアップロードされていないか不正なデータです。']);
        }
        $tour->save();

        return redirect('/');
    }
    
    //マイページのツアー一覧をクリックすると、ツアーの詳細が表示される
    public function show(Request $request,  $id){
        $tour = DB::table('tours')->find($id);
        $user = \Auth::user();
        $guide = Guide::find($tour->guide_id)->name;
        //dd($tour);
        //dd($user);
        //dd($guide);
        
        $data = [
            'id' => $id,
            'tour' => $tour,
            'guide' => $guide,
            'user' => $user,
        ];
        
        return view('tours.show', $data);
    }
    
    public function edit($id){
        $tour = Tour::find($id);
        return view('tours.edit', [
            'tour' => $tour
        ]);
    }
    
    public function update(Request $request, $id){
        $tour = Tour::find($id);
        $tour->tour_name = $request->tour_name;
        $tour->place = $request->place;
        $tour->start_date = $request->start_date;
        $tour->end_date = $request->end_date;
        $tour->price = $request->price;
        $tour->category = $request->category;
        $tour->content = $request->content;
        $tour->thum =  $request->file('thum')->store('images');
        
        if ($request->file('thum')->isValid([])){
            //そのまま処理
                
        }else{
            return redirect()
                ->back()
                ->withInput()
                ->withErrors(['file' => '画像がアップロードされていないか不正なデータです。']);
        }
        $tour->save();
        
        return redirect('/');
    }
    
    public function destroy($id)
    {
        $tour = Tour::find($id);

        if (\Auth::guard('guide')->user()->id === $tour->user_id) {
            $tour->delete();
        }

        return redirect()->back();
    }
    
}
