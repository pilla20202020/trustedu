@extends('layouts.admin.admin')

@section('title', 'Create a Why Sweden')

@section('content')
    <section>
        <div class="section-body">
            <form class="form form-validate floating-label" action="{{route('why-sweden.store')}}" method="POST" enctype="multipart/form-data">
            @include('whysweden.partials.form',['header' => 'Create a Why Sweden'])
            </form>
        </div>
    </section>
@endsection

