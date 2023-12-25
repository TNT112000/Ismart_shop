<!DOCTYPE html>
<html>

<head>
    <title>Quản lý ISMART</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('admin/css/bootstrap/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/css/bootstrap/bootstrap-theme.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    
    <link href="{{ asset('admin/css/reset.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/css/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/css/style.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/css/responsive.css') }}" rel="stylesheet" type="text/css" />
    
    
    <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="
        crossorigin="anonymous"></script>
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous"> --}}

    <script src="{{ asset('admin/js/bootstrap/bootstrap.min.js') }}" type="text/javascript"></script>

    <script src="{{ asset('admin/js/main.js') }}" type="text/javascript"></script>

    <script src="{{ asset('admin/js/ajax.js') }}" type="text/javascript"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" class="">
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>  --}}
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" class=""> --}}
    {{-- <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script> --}}
   
    <script src="https://cdn.tiny.cloud/1/m5tpegktr2y1r903pvgko65kmnu1xc4wr9z8hpwxbgljtjrl/tinymce/4/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script type="text/javascript">
        var editor_config = {
            path_absolute: "http://localhost:8080/Ismart_shop/",
            selector: "textarea",

            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table contextmenu directionality",
                "emoticons template paste textcolor colorpicker textpattern"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
            relative_urls: false,
            file_browser_callback: function(field_name, url, type, win) {
                var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName(
                    'body')[0].clientWidth;
                var y = window.innerHeight || document.documentElement.clientHeight || document
                    .getElementsByTagName('body')[0].clientHeight;

                var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
                if (type == 'image') {
                    cmsURL = cmsURL + "&type=Images";
                } else {
                    cmsURL = cmsURL + "&type=Files";
                }

                tinyMCE.activeEditor.windowManager.open({
                    file: cmsURL,
                    title: 'Filemanager',
                    width: x * 0.8,
                    height: y * 0.8,
                    resizable: "yes",
                    close_previous: "no"
                });
            }
        };

        tinymce.init(editor_config);
    </script>



    <script>
    </script>
</head>

<body>
    <div id="site">
        <div id="container">
            <div id="header-wp">
                <div class="wp-inner clearfix">
                    <a href="?page=list_post" title="" id="logo" class="fl-left">ADMIN</a>


                    <div id="dropdown-user" class="dropdown dropdown-extended fl-right">
                        <button class="dropdown-toggle clearfix" type="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="true">
                            <div id="thumb-circle" class="fl-left">
                                <img src="{{ asset('admin/images/img-admin.png') }}">
                            </div>
                            <h3 id="account" class="fl-right">Admin</h3>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="?page=info_account" title="Thông tin cá nhân">Thông tin tài khoản</a></li>
                            <li><a href="#" title="Thoát">Thoát</a></li>
                        </ul>
                    </div>
                </div>
            </div>


            @yield('content')

            <div id="footer-wp">
                <div class="wp-inner">
                    <p id="copyright">-- Admin Ismart - Shop --</p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
