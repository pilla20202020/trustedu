<?php

namespace App\Http\Controllers\WhySweden;

use App\Http\Controllers\Controller;
use App\Modules\Models\WhySweden\WhySweden;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WhySwedenController extends Controller
{
    //

    protected $whysweden;

    public function __construct(WhySweden $whysweden)
    {
        $this->whysweden = $whysweden;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $whyswedens = $this->whysweden->orderBy('created_at','DESC')->get();
        return view('whysweden.index',compact('whyswedens'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('whysweden.create');
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
            $whysweden = DB::transaction(function () use ($data) {
                $whyswedenData = [
                    'name' => $data['name'],
                    'description' => $data['description'],
                    'link' => $data['link'],
                    'image' => $data['image'],
                ];
                $slierCreate = $this->whysweden->create($whyswedenData);

            });

            Toastr()->success('Why Sweden Created Successfully','Success');
            return redirect()->route('why-sweden.index');
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
        $whysweden = $this->whysweden->findOrFail($id);
        return view('whysweden.edit',compact('whysweden'));
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
            $whyswedens = DB::transaction(function () use ($data, $id) {
                $whysweden = $this->whysweden->where('id',$id);
                $whyswedenData = [
                    'name' => $data['name'],
                    'description' => $data['description'],
                    'link' => $data['link'],
                    'image' => $data['image'],
                ];

                $whysweden->update($whyswedenData);

            });

            Toastr()->success('Why Sweden Updated Successfully','Success');
            return redirect()->route('why-sweden.index');
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
        $whysweden = $this->whysweden->find($id);
        $whysweden->delete();
        Toastr()->success('Why sweden Deleted Successfully','Success');
        return redirect()->route('why-sweden.index');
    }


}
