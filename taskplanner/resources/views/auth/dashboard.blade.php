@extends('auth.layouts.main')
@section('title','dashboard')
@section('content')

<h2>Dashboard</h2>
<table class="table">
    <thead>
        <th>Name</th>
        <th>Email</th>
    </thead>
    <tbody>
        <tr>
        <td> {{$data->name}} </td>
        <td>{{$data->email}}   </td>

    </tr>
    </tbody>
    </table>
@endsection

