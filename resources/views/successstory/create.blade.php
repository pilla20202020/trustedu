@extends('layouts.admin.admin')

@section('title', 'Create a Success Story')

@section('content')
    <section>
        <div class="section-body">
            <form class="form form-validate floating-label" action="{{route('successstory.store')}}" method="POST" enctype="multipart/form-data">
            @include('successstory.partials.form',['header' => 'Create a Success Story'])
            </form>
        </div>
    </section>
@endsection

