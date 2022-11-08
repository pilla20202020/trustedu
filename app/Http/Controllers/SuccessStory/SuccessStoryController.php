<?php

namespace App\Http\Controllers\SuccessStory;

use App\Http\Controllers\Controller;
use App\Modules\Models\SuccessStory\SuccessStory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SuccessStoryController extends Controller
{
    //

    protected $successstory;

    public function __construct(SuccessStory $successstory)
    {
        $this->successstory = $successstory;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $successstorys = $this->successstory->orderBy('created_at','DESC')->get();
        return view('successstory.index',compact('successstorys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('successstory.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $data = $request->all();
            $successstory = DB::transaction(function () use ($data) {
                $successstoryData = [
                    'name' => $data['name'],
                    'description' => $data['description'],
                    'link' => $data['link'],
                    'image' => $data['image'],
                ];
                $slierCreate = $this->successstory->create($successstoryData);

            });

            Toastr()->success('successstory Created Successfully','Success');
            return redirect()->route('successstory.index');
        } catch (Exception $e) {
            return null;
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
    public function edit($id)
    {
        $successstory = $this->successstory->findOrFail($id);
        return view('successstory.edit',compact('successstory'));
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

        try {
            $data = $request->all();
            $successstorys = DB::transaction(function () use ($data, $id) {
                $successstory = $this->successstory->where('id',$id);
                $successstoryData = [
                    'name' => $data['name'],
                    'description' => $data['description'],
                    'link' => $data['link'],
                    'image' => $data['image'],
                ];

                $successstory->update($successstoryData);

            });

            Toastr()->success('successstory Updated Successfully','Success');
            return redirect()->route('successstory.index');
        } catch (Exception $e) {
            return null;
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
        $successstory = $this->successstory->find($id);
        $successstory->delete();
        Toastr()->success('successstory Deleted Successfully','Success');
        return redirect()->route('successstory.index');
    }
}
