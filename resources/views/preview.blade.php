<html>
<head>
    <title>Generate PDF Laravel 8 - NiceSnippets.com</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<style type="text/css">
    h2{
        text-align: center;
        font-size:22px;
        margin-bottom:50px;
    }
    body{
        background:#f2f2f2;
    }
    .section{
        margin-top:30px;
        padding:50px;
        background:#fff;
    }
    .pdf-btn{
        margin-top:30px;
    }
</style>
<body>
<div class="container">
    <div class="col-md-8 section offset-md-2">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h2>KONECEN IZVESTAJ ZA USPESNA DOSTAVA</h2>
            </div>
            @foreach($posts as $post)
               {{  $post->id }}
                @endforeach
                        <table class="table table-bordered mb-5">
                            <thead>
                            <tr class="table-danger">
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col">DOB</th>
                            </tr>
                            </thead>
                            <tbody>
{{--                            @foreach($employee ?? '' as $data)--}}
{{--                                <tr>--}}
{{--                                    <th scope="row">{{ $data->id }}</th>--}}
{{--                                    <td>{{ $data->name }}</td>--}}
{{--                                    <td>{{ $data->email }}</td>--}}
{{--                                    <td>{{ $data->phone_number }}</td>--}}
{{--                                    <td>{{ $data->dob }}</td>--}}
{{--                                </tr>--}}
{{--                            @endforeach--}}
                            </tbody>
                        </table>



                </div>
            </div>
            <div class="text-center pdf-btn">
                <a href="{{ route('pdf.generate') }}" class="btn btn-primary">Generate PDF</a>
            </div>
        </div>
    </div>
</div>
</body>
</html>
