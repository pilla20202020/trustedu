@extends('layouts.admin.admin')

@section('page-specific-styles')
    <link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/TableTools.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/lightbox.css') }}"/>
@endsection

@section('title', 'Document Check List')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="d-flex">
                <header class="text-capitalize pt-1">Document Check List</header>
                <div class="tools ml-auto">
                    <a class="btn btn-primary ink-reaction" href="{{ route('document_checklist.create') }}">
                        <i class="md md-add"></i>
                        Add Document CheckList
                    </a>
                </div>
            </div>
            <div class="card mt-2 p-4">
                <div class="table-responsive">
                    <table id="example" class="table table-hover display">
                        <thead>
                        <tr>
                            <th>S.No.</th>
                            <th>CheckList For</th>
                            <th>CheckList Name</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            @each('documents_checklist.partials.table', $document_checklists, 'document_checklist')
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('page-specific-scripts')
    <script src="{{ asset('js/datatables.min.js') }}"></script>
    <script src="{{ asset('js/lightbox.js') }}"></script>
    <script>
        $(document).ready( function () {
            $('#example').DataTable();
        });


    </script>


@endsection


