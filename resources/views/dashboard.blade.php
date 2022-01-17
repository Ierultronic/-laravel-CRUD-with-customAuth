<html>
<head>
<title>Dashboard</title>
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" rel="stylesheet">
</head>
<body> 
    <div class="container">
        <div class="row">
            <div class=".col-md-4 col-md-offset-4" style="margin-top 20px;">
            <h1>Welcome To Dashboard</h1>
            <table>
                <tr>
                    <td><h3><b>Current User:</b>{{$data->name}}</h3></td>
                        <td><a type="button" class="btn btn-primary" href="listUser">List All Users</a></td>
                    </tr>
                </table>
            <hr>
            <table class="table table-bordered data-table">
                <thead>
                <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Action</th>
                </thead>
                <tbody>  
                <!-- to list all users existed -->
                <tr><td>{{$data->id}}</td>
                        <td>{{$data->name}}</td>
                        <td>{{$data->email}}</td>
                        <td>{{$data->phone}}</td>
                        <td><a type="button" class="btn btn-danger" href="logout">Logout</a></td>
                    </tr>
                </tbody>
            </table>
            </div>
        </div>
    </div>
</body>
<!-- JavaScript Bundle with Popper -->
<script> src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
</html>