@extends('layouts.mylayout')

@section('content')

<form method="POST" action="/Employeemodel/{{$emp->id}}" enctype="multipart/form-data">
<center>
    <h3>Edit Data</h3>
</center>

@csrf
@method('PUT')
<input type="text" name="fname" placeholder="Enter first name" value="{{$emp->fname}}">
<input type="text" name="lname" placeholder="Enter last name" value="{{$emp->lname}}">
<input type="password" name="password" value="{{Crypt::decryptString($emp->password)}}">
<input type="file" name="myfile" value="{{$emp->filepath}}">
<input type="submit" Value="Update">
<!-- {{Crypt::decryptString($emp->password)}} -->
@endsection