@extends('layouts.admin.admin')

@section('title', 'Create a Slider')

@section('content')
    <section>
        <div class="section-body">
            <form class="form form-validate floating-label" action="{{route('slider.store')}}" method="POST" enctype="multipart/form-data">
            @include('slider.partials.form',['header' => 'Create a Slider'])
            </form>
        </div>
    </section>
@endsection

