@extends('admin_template')

@section('content')
<h1>Update Client</h1><br><br>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form role="form" method="post" action="/clients/{{$client->id}}">
    {{method_field('put')}}
    @csrf

    <div class="box-body">
            <label>Email</label>        
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
        <input type="email" class="form-control" placeholder="Email" name="email" value="{{$client->email}}">
          </div>
          <br>
          <label>Username</label>          
          <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
            <input type="text" class="form-control" placeholder="Name" name="name"value="{{$client->name}}">
          </div>
          <br>
          <label>Phone Number</label>          
          <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-phone"></i></span>
            <input type="text" class="form-control" placeholder="phone" name="phone" value="{{$client->mobile}}">
          </div>
          <br>
          <label>Password</label>          
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-lock"></i></span>
          <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password">
        </div>
        <br>
        <div class="form-group">
                <label>Avatar</label>
          <input type="file" id="exampleInputFile">
        </div>
        <div class="form-group">
            <label>Country</label>
            <select class="form-control select2" style="width: 100%;" name="country">
                @foreach ($countries as $country)
                <option value="{{$country['name']}}">{{$country['name']}}</option>
            @endforeach
            </select>
          </div>

          <div class="row">
            
            <!-- /.col-lg-6 -->
            <div class="col-lg-6">
            <label>Gender</label>                
              <div class="input-group">
                
                    <input type="radio" name="gender" value="0"> Male<br>
                    <input type="radio" name="gender" value="1"> Female<br>              
                    
              </div>
              <!-- /input-group -->
            </div>
            <!-- /.col-lg-6 -->
          </div>
      </div>
      <!-- /.box-body -->

      <div class="box-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
     
</form>
 @endsection