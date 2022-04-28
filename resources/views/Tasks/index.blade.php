<!DOCTYPE html>
<html>

<head>
    <title>All Tasks</title>

    <!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />

    <!-- custom css -->
    <style>
        .m-r-1em {
            margin-right: 1em;
        }

        .m-b-1em {
            margin-bottom: 1em;
        }

        .m-l-1em {
            margin-left: 1em;
        }

        .mt0 {
            margin-top: 0;
        }

    </style>

</head>

<body>

    <!-- container -->
    <div class="container">


        <div class="page-header">
            <h1>Tasks</h1>
            <br>


          

           

            <p>

                {{ session()->get('Message') }}

            </p>

        </div>

        <a href="{{url('task/create')}}">+ Create Task</a> || <a href="{{ url('/Logout') }}">LogOut</a>

        <table class='table table-hover table-responsive table-bordered'>
            <!-- creating our table heading -->
            <tr>
                <th>#</th>
        
                <th>Title</th>
                <th>Content</th>
                <th>Start_Date</th>
                <th>End_Date</th>
                <th>Image</th>
                <th>action</th>
            </tr>


            @foreach ($data as $key => $value)
                <tr>
                    <td>{{ ++$key }}</td>
                   
                    <td>{{ $value->title }}</td>
                    <td>{{ substr($value->content,0,45) }}</td>
                    <td>{{ date('d-m-Y',$value->start_date) }}</td>
                    <td>{{ date('d-m-Y',$value->end_date) }}</td>


                    @php

                        $image = empty($value->image) ? '03.jpg' : $value->image;

                    @endphp


                    <td> <img src=" {{asset($value->image)}}" alt="" width="70px" height="70px"> </td>

                   

                   
                    <td>
                        

                        <a href='delete/{{$value->ID}}'       class='btn btn-danger m-r-1em'>Remove </a>


                       
                    </td>
                </tr>









            @endforeach
            <!-- end table -->
        </table>

    </div>
    <!-- end .container -->


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

    <!-- Latest compiled and minified Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- confirm delete record will be here -->

</body>

</html>
