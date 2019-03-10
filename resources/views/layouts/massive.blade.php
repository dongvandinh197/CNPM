
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from massive.markup.themebucket.net/mp-index-blog-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 08 Sep 2017 04:49:49 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">

    <!--favicon icon-->
    <link rel="icon" type="image/png" href="{{asset('assets/img/favicon.png')}}">

    <title>@yield('title','Trang Chủ')</title>

    <!--common style-->
    @include('inc.client.style')
    
</head>

<body>

    <!--  preloader start -->
    <div id="tb-preloader">
        <div class="tb-preloader-wave"></div>
    </div>
    <!-- preloader end -->


    <div class="wrapper">

        <!--header start-->
        @include('inc.client.header')        <!--header end-->

        <!--page title start-->
        <section class="page-title parallax-title ">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h4 class="text-uppercase">Chào mừng bạn đến với Shoe Store</h4>
                        <span>Latest Awesome Store</span>
                    </div>
                </div>
            </div>
        </section>
        <!--page title end-->

        <!--body content start-->
        <section class="body-content ">

            <div class="page-content">
                <div class="container">
                    <div class="row">
                        <div class="post-list">
                            @yield('content')

                        </div>
                    </div>
                </div>
            </div>


        </section>
        <!--body content end-->

        <!--footer start 1-->
        @include('inc.client.footer')
        <!--footer 1 end-->

    </div>


    <!-- inject:js -->
    @include('inc.client.javascript')
    <!-- endinject -->
</body>


<!-- Mirrored from massive.markup.themebucket.net/mp-index-blog-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 08 Sep 2017 04:49:51 GMT -->
</html>
