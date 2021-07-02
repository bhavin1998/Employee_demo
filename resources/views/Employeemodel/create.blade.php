@extends('layouts.mylayout')

@section('content')
<form method="POST" action="/Employeemodel" enctype='multipart/form-data'>
<center>
    <h3>Add New Data</h3>
</center>
@csrf
<table>
    <tr>
    <td><input type="text" name="fname" placeholder="Enter first name"></td>
    </tr>

    <tr>
    <td><input type="text" name="lname" placeholder="Enter last name"></td>
    </tr>

    <tr>
    <td><input type="password" name="password"></td>
    </tr>

    <tr>
    <td><input type="file" name="myfile"></td>
    </tr>

    <tr>
    <td><input type="submit" Value="Submit"></td>
    </tr>

</table>
</form>
@endsection