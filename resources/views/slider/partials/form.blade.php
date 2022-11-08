@section('page-specific-styles')
    <link href="{{ asset('css/dropify.min.css') }}" rel="stylesheet">
    <link type="text/css" rel="stylesheet"
          href="{{ asset('resources/css/theme-default/libs/bootstrap-tagsinput/bootstrap-tagsinput.css?1424887862')}}"/>
@endsection
@csrf
<div class="row">
    <div class="col-sm-9">
        <div class="card">
            <div class="card-underline">
                <div class="card-head">
                    <header class="ml-3 mt-2">{!! $header !!}</header>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-sm-12">

                            <label for="checklist_for" class="col-form-label pt-0">Name</label>
                            <div class="form-group">
                                <input class="form-control" type="text" name="name" data-role="tagsinput"
                                value="{{ old('name', isset($slider->name) ? $slider->name : '') }}" placeholder="Enter a Name" required>
                            </div>
                        </div>


                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="Name">Description</label>
                                <textarea name="description" class="form-control" rows="4">{{ old('description', isset($slider->description) ? $slider->description : '') }}
                                </textarea>
                                <span id="textarea1-error"
                                    class="text-danger">{{ $errors->first('description') }}</span>
                            </div>
                        </div>

                        <div class="col-sm-6">

                            <label for="link" class="col-form-label pt-0">Link</label>
                            <div class="form-group">
                                <input class="form-control" type="text" name="link"
                                value="{{ old('link', isset($slider->link) ? $slider->link : '') }}" placeholder="Enter a Link">
                            </div>
                        </div>
                    </div>

                    <div class="form-group row d-flex align-items-end">.


                        <div class="col-sm-6">
                            <label class="control-label">Choose Image</label><br>
                            @if(isset($slider) && isset($slider->image))
                                <img id="holder" style="margin-top:15px;max-height:300px;" class="img img-fluid mb-3" src="{{$slider->image}}">
                            @endif
                            <div class="d-flex">
                                <input id="thumbnail" class="form-control" type="text" name="image" value="{{ old('image', isset($slider->image) ? $slider->image : '') }}" readonly>
                                <button id="lfm" data-input="thumbnail" data-preview="holder" class="lfm btn btn-icon icon-left btn-primary ml-2 d-flex">
                                    <i class="fa fa-upload"></i> &nbsp;Choose
                                </button>
                            </div>
                        </div>




                    </div>
                    <hr>


                    <div class="row mt-2 justify-content-center">
                        <div class="form-group">
                            <div>
                                <a class="btn btn-light waves-effect ml-1" href="{{ route('slider.index') }}">
                                    <i class="md md-arrow-back"></i>
                                    Back
                                </a>
                                <input type="submit" name="pageSubmit" class="btn btn-danger waves-effect waves-light" value="Submit">
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>


@section('page-specific-scripts')
    <script src="{{asset('resources/js/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('js/dropify.min.js') }}"></script>
    <script src="{{ asset('resources/js/libs/bootstrap-tagsinput/bootstrap-tagsinput.min.js')}}"></script>
    <script src="{{ asset('resources/js/libs/jquery-validation/dist/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('resources/js/libs/jquery-validation/dist/additional-methods.min.js') }}"></script>
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('.dropify').dropify();
        });


        var append = 1;
        $(document).on('click', '#additemrowedu', function() {
            var b = parseFloat($("#tempedu").val());
            b = b + 1;
            $("#tempedu").val(b);
            var temp = $("#tempedu").val();
            var tst = `<div class="form-group row d-flex align-items-end appended-row-edu">

                <div class="col-sm-4 mb-2">
                    <label class="control-label">Document Name</label>
                    <input type="text" name="document_name[]" class="form-control">
                </div>

                <div class="col-sm-6">
                    <label class="control-label">Document Name</label>
                    <div class="d-flex">
                        <input id="thumbnail`+append+`" class="form-control" type="text" name="document_sample[]" readonly>
                        <button id="lfm`+append+`" data-input="thumbnail`+append+`" data-preview="holder`+append+`" class="lfm`+append+` btn btn-icon icon-left btn-primary ml-2 d-flex">
                            <i class="fa fa-upload"></i> &nbsp;Choose
                        </button>
                    </div>
                </div>


                <div class="col-md-2" style="margin-top: 45px;">
                    <input class="removeitemrowedu btn btn-sm btn-danger mr-1" type="button" value="Remove row">
                </div>

            </div>`
            $('#additernary_edu').append(tst);
            $('.lfm'+append).filemanager('file');
            append++;
            selectRefresh();
        });

        $(document).on('click', '.removeitemrowedu', function() {
            $(this).closest('.appended-row-edu').remove();
        })

        function remove_product(o) {
            var p = o.parentNode.parentNode;
            p.parentNode.removeChild(p);
        }

        function remove_productforedit(o) {
            var p = o.parentNode.parentNode;
            p.parentNode.removeChild(p);
        }

        $(document).ready(function() {
            $('.dropify').dropify();
        });

        $('.lfm').filemanager('file');
    </script>
@endsection
