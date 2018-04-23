@extends('admin_template') @section('content')

<h1>Edit Room</h1>
<br>
<br>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<div class="box-body">
    <form role="form" method="post" action="/rooms/{{$room->id}}">
        {{method_field('put')}} {{csrf_field()}}

        <!-- text input -->
        <div class="form-group">
            <label>Number</label>
            <input type="number" name="number" value="{{$room->number}}" class="form-control">
        </div>

        <div class="form-group">
            <label>Capacity</label>
            <input type="number" name="capacity" class="form-control" value="{{$room->capacity}}">
        </div>

        <div class="form-group">
            <label>Price</label>
            <input type="text" name="price" class="form-control" value="{{$room->price}}" </div>

            <!-- select -->
            <div class="form-group">
                <label>Floor</label>
                <select class="form-control" name="floor_id">
                    @foreach ($floors as $floor)
                    <option @if($floor->id == $room->floor->id) selected @endif value="{{$floor->id}}">{{$floor->name}}</option>
                    @endforeach
                </select>
            </div>
            <input type="submit" class="btn btn-info" value="Update" />
    </form>
    </div>


    @endsection