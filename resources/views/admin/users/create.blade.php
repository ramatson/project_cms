@extends('layouts.admin')

@section('content')

    <h1>Created Users</h1>

{!! Form::open(['method'=>'POST', 'action'=>'App\Http\Controllers\AdminUsersController@store', 'files'=>true]) !!}

<div class="form-group">
    {!! Form::label('name', "Name:") !!}
    {!! Form::text("name", null, ["class"=>"form-control"]) !!}
</div>

<div class="form-group">
    {!! Form::label('email', "Email:") !!}
    {!! Form::email("email", null, ["class"=>"form-control"]) !!}
</div>

<div class="form-group">
    {!! Form::label('role_id', "Role:") !!}
    {!! Form::select("role_id", [''=>'Choose Options'] + $roles, null, ["class"=>"form-control"]) !!}
</div>

<div class="form-group">
    {!! Form::label('is_active', "Status:") !!}
    {!! Form::select("is_active", array(1 => 'Active', 0 => 'Not Active'), 0, ["class"=>"form-control"]) !!}
</div>

<div class="form-group">
    {!! Form::label('file', "File:") !!}
    {!! Form::file("file", null, ["class"=>"form-control"]) !!}
</div>

<div class="form-group">
    {!! Form::label('password', 'Password:') !!}
    {!! Form::password('password', ["class"=>"form-control"]) !!}
</div>

<div class="form-group">
    {!! Form::submit("Create User", ["class"=>"btn btn-primary"]) !!}
</div>

{!! Form::close() !!}

@include('includes.form_error')

@endsection


<?php
/**
 *  A different way of showcasing an error messages
 * in a form.
 */
?>


<!-- {!! Form::open(['method' =>'POST', 'method' => 'App\Http\Controllers\AdminUsersController@store']) !!}

<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class'=>'form-control']) !!}
    @if($errors->has('name'))
        {{ $errors->first('name') }}
    @endif
</div>

<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class'=>'form-control']) !!}
    @if($errors->has('email'))
        {{ $errors->first('email') }}
    @endif
</div>
<div class="form-group {{ $errors->has('role_id') ? 'has-error' : '' }}">
    {!! Form::label('role_id', 'Role:') !!}
    {!! Form::select("role_id", [''=>'Choose Options'] + $roles, null, ["class"=>"form-control"]) !!}
    @if($errors->has('role_id'))
        {{ $errors->first('role_id') }}
    @endif
</div>
<div class="form-group {{ $errors->has('is_active') ? 'has-error' : '' }}">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::select('is_active', ['0' => 'Not Active', '1' => 'Active'], null, ['class'=>'form-control']) !!}
    @if($errors->has('is_active'))
        {{ $errors->first('is_active') }}
    @endif
</div>
<div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
    {!! Form::label('password', 'Password:') !!}
    {!! Form::password('password', ['class'=>'form-control']) !!}
    @if($errors->has('password'))
        {{ $errors->first('password') }}
    @endif
</div>
<div class="form-group">
    {!! Form::submit('Create User', ['class'=>'btn btn-primary']) !!}
</div> -->