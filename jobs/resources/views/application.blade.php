@include('mysections')

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Newsfeed</title>

        @yield('mystyles')
        <!-- Special Styling for the buttons -->
        @include('link-style')

    </head>
    <body class="antialiased" style="height: 100%;">
        @yield('header')
        <div class="my_content">
            <div class="container-fluid"  style="display:flex; width:30%; height:80%;">
                <div class="card-body">
                    <form action="{{ url('/apply-job/' . $id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                        <h3 class="text-center mb-5">Upload CV</h3>
                        <div class="form-group">
                            <input type="file" id="file" name="file" class="form-control">
                        </div>
                        <div style="display: flex; justify-content: center; margin-top: 10px;">
                            <button type="submit" class="btn btn-primary" style="margin-top: 10px;">Submit</button>
                        </div>     
                    </form>
                </div>
            </div>
        </div>
        @yield('myfooter')

        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>