<?php

namespace App\Http\Controllers\Slider;

use App\Http\Controllers\Controller;
use App\Modules\Models\Slider\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SliderController extends Controller
{
    //

    protected $slider;

    public function __construct(Slider $slider)
    {
        $this->slider = $slider;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = $this->slider->orderBy('created_at','DESC')->get();
        return view('slider.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('slider.create');
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
            $slider = DB::transaction(function () use ($data) {
                $sliderData = [
                    'name' => $data['name'],
                    'description' => $data['description'],
                    'link' => $data['link'],
                    'image' => $data['image'],
                ];
                $slierCreate = $this->slider->create($sliderData);

            });

            Toastr()->success('Slider Created Successfully','Success');
            return redirect()->route('slider.index');
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
        $slider = $this->slider->findOrFail($id);
        return view('slider.edit',compact('slider'));
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
            $sliders = DB::transaction(function () use ($data, $id) {
                $slider = $this->slider->where('id',$id);
                $sliderData = [
                    'name' => $data['name'],
                    'description' => $data['description'],
                    'link' => $data['link'],
                    'image' => $data['image'],
                ];

                $slider->update($sliderData);

            });

            Toastr()->success('Slider Updated Successfully','Success');
            return redirect()->route('slider.index');
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
        $slider = $this->slider->find($id);
        $slider->delete();
        Toastr()->success('Slider Deleted Successfully','Success');
        return redirect()->route('slider.index');
    }

}
