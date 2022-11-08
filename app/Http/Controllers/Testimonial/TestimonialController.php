<?php

namespace App\Http\Controllers\Testimonial;

use App\Http\Controllers\Controller;
use App\Modules\Models\Testimonial\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestimonialController extends Controller
{
    //

    protected $testimonial;

    public function __construct(Testimonial $testimonial)
    {
        $this->testimonial = $testimonial;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonials = $this->testimonial->orderBy('created_at','DESC')->get();
        return view('testimonial.index',compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('testimonial.create');
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
            $testimonial = DB::transaction(function () use ($data) {
                $testimonialData = [
                    'name' => $data['name'],
                    'description' => $data['description'],
                    'link' => $data['link'],
                    'image' => $data['image'],
                ];
                $slierCreate = $this->testimonial->create($testimonialData);

            });

            Toastr()->success('testimonial Created Successfully','Success');
            return redirect()->route('testimonial.index');
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
        $testimonial = $this->testimonial->findOrFail($id);
        return view('testimonial.edit',compact('testimonial'));
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
            $testimonials = DB::transaction(function () use ($data, $id) {
                $testimonial = $this->testimonial->where('id',$id);
                $testimonialData = [
                    'name' => $data['name'],
                    'description' => $data['description'],
                    'link' => $data['link'],
                    'image' => $data['image'],
                ];

                $testimonial->update($testimonialData);

            });

            Toastr()->success('testimonial Updated Successfully','Success');
            return redirect()->route('testimonial.index');
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
        $testimonial = $this->testimonial->find($id);
        $testimonial->delete();
        Toastr()->success('testimonial Deleted Successfully','Success');
        return redirect()->route('testimonial.index');
    }
}
