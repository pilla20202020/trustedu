@extends('layouts.admin.admin')

@section('title', 'Create a testimonial')

@section('content')
    <section>
        <div class="section-body">
            <form class="form form-validate floating-label" action="{{route('testimonial.store')}}" method="POST" enctype="multipart/form-data">
            @include('testimonial.partials.form',['header' => 'Create a testimonial'])
            </form>
        </div>
    </section>
@endsection

