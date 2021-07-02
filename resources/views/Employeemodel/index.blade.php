@extends('layouts.mylayout')

@section('content')

<form action="/Employeemodel/create">
<center>
    <h3>View Data</h3>
</center>

@csrf
    <input type="Submit" value="New Employee">
</form>
<table class='table table-striped'>
    <th>First Name</th>
    <th>Last Name</th>
    <!-- <th>Pwd</th> -->
    <th>Action</th>
    <th>Images</th>
    @foreach($emp as $emp)
        <tr>
            <td>{{$emp->fname}}</td>
            <td>{{$emp->lname}}</td>
            <!-- <td>{{$emp->password}}</td> -->
            <td>

            <form action="/Employeemodel/{{$emp->id}}/edit">
            
             <input type="Submit" value="Edit">

            </form>
            
            <form method="POST" action="/Employeemodel/{{$emp->id}}">
            @csrf
            @method('DELETE')
            <input type="Submit" value="Delete">           
            </form>
            </td>

            <td>
            <form method="POST" action="/Employeemodel" enctype="multipart/form-data">
            @csrf
            <img src="{{asset('storage/empimg/'.$emp->image)}}" height="50px" width="50px"/>
            </form>
            </td>

        </tr>
    @endforeach
</table>

@endsection