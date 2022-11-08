<!DOCTYPE html>
<html lang="en">

<head>
    <title>Trust Education</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <title>@yield('title')</title>
    @yield('page-specific-meta')

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <link rel="stylesheet" href="{{asset('frontend/style.css')}}">

    <link href="{{ asset('css/dropify.min.css') }}" rel="styleshet">

    <!-- Select2-->
    <link href="{{asset('css/select2.min.css')}}" rel="stylesheet" />

    <!-- Toastr-->
    <link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">

    @yield('page-specific-styles')

</head>

<body>


    @include('frontend.layouts.partials.header')

    @yield('content')

    @include('frontend.layouts.partials.footer')

    <a href="#" class="scrollup" style="display: none;"><i class="ion-ios-arrow-up"></i></a>


    {{-- Select2 --}}
    <script src="{{ asset('js/select2.min.js') }}"></script>

    <script>
        function deleteThis(obj) {
            let data = obj.getAttribute("link");
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = data;
                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )
                } else {
                    Swal.fire(
                        'Cancelled!',
                        'Your file has been Cancelled.',
                        'error'
                    )
                }
            })
        }
    </script>

    @yield('page-specific-scripts')
    {!! Toastr::message() !!}

    <script>
        ! function(f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function() {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window, document, 'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '419561893441544');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
            src="https://www.facebook.com/tr?id=419561893441544&ev=PageView&noscript=1" />
    </noscript>

</body>


</html>
