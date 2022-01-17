<html>
<head>
<title>List User</title>
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" rel="stylesheet">
</head>
<body> 
    <div class="container">
        <div class="row">
            <div class=".col-md-4 col-md-offset-4" style="margin-top 20px;">
            <h1>List of Users</h1>
            <td><a type="button" class="btn btn-primary" href="addUser">Add Another User</a> <a type="button" class="btn btn-primary" href="dashboard">Dashboard</a> </td>
            <hr>
            @if(Session::has('success_add'))
            <div class="alert alert-success">{{Session::get('success_add')}}</div>
            @endif
            @if(Session::has('success_update'))
                <div class="alert alert-success">{{Session::get('success_update')}}</div>
                @endif
                @if(Session::has('success_delete'))
                <div class="alert alert-success">{{Session::get('success_delete')}}</div>
                @endif
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
                @foreach($users as $lists)
                <tr><td>{{$lists->id}}</td>
                        <td>{{$lists->name}}</td>
                        <td>{{$lists->email}}</td>
                        <td>{{$lists->phone}}</td>
                        <td><a type="button" class="btn btn-info" href="{{url('editUser/'.$lists->id)}}">Edit</a> <a type="button" class="btn btn-warning" href="{{url('deleteUser/'.$lists->id)}}">Delete</a></td>
                    </tr>
                    @endforeach
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