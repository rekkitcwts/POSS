<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript">var siteloc = "{{ url('/') }}"</script>
    <title>Point of Sales System</title>
    
    <!-- Bootstrap core CSS -->
    {{ HTML::style('css/bootstrap.min.css')}}

    <!-- Custom styles for this template -->
    {{ HTML::style('css/layout.css')}}
    </head>
    <body>
        
                <!-- Bootstrap core JavaScript
        ================================================== -->
        <script src="../script/jquery-1.9.1.min.js"></script> 
       <!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script> -->
        <script src="../script/bootstrap.min.js"></script>
        
        @include("header")
        <div class="content">
            <div class="container">
                @yield("content")
            </div>
        </div>
    
        @include("footer")
     
    </body>
</html>
