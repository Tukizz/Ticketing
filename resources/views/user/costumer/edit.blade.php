@extends('template.user.profile')
@section('content')
@if(Auth::user()->jabatan == 'user')
<div class="wrapper">
<br><br><br>
        <div class="section profile-content">
            <div class="container">
                <div class="owner">
                    <br><br>
                    <div class="name">
                        <h4 class="title">Edit Profile</h4>
                    </div>
                </div>
                <div class="row">
                   <form class="form-horizontal" action="/costumer/{{$costumer->id}}" method="post" >
                        <div class="col-md-12 ml-auto mr-auto card">
                        <div class="card-body row">
                            
                            <div class="col-md-4">
                                <h4>Nama</h4>
                                <input type="text" class="form-control" name="name" value="{{$costumer->name}}">
                                
                            </div>

                            <div class="col-md-4">
                                <h4>Phone</h4>
                                <input type="text" class="form-control" name="phone" value="{{$costumer->phone}}">
                                
                            </div>

                            <div class="col-md-4">
                                <h4>E-mail</h4>
                                <input type="text" class="form-control" name="email" value="{{$costumer->email}}">
                            </div>

                            <div class="col-md-4">
                                <h4>Jenis Kelamin</h4>
                                <select name="gender" class="form-control">
                                    @if($costumer == 'pria')
                                        <option value="pria" selected>Pria</option>
                                        <option value="wanita" >Wanita</option>
                                    @else
                                        <option value="pria" >Pria</option>
                                        <option value="wanita" selected>Wanita</option>
                                    @endif 
                                </select>
                            </div>

                            <div class="col-md-8">
                                <h4>Alamat</h4>
                                <textarea class="form-control" name="address" id="" rows="0" value="{{$costumer->address}}">{{$costumer->address}}</textarea>
                            </div>
                        </div>
                        
                        <div class="card-footer row">
                            <div class="col-md-6">
                                <input type="hidden" name="users_id" value="{{$costumer->users_id}}">
                                <input type="hidden" name="_method" value="put">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button class="btn btn-primary" type="submit">Edit</button>
                                <a href="/costumer" class="btn btn-default">cancel</a>
                            </div>
                        </div>
                        
                    </div>
                    </form>
                    
                </div>
                
            </div>
        </div>
    </div>
    @else
<script type="text/javascript">
    window.location = "/404";//here double curly bracket
</script>
@endif
@endsection


{{-- @extends('layouts.navbar')

@section('content')
@if(Auth::user()->jabatan == 'user')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Profile</div>

                <div class="panel-body">
                    @if(empty($costumer->id))

                        <h4>Anda Belum memasukan Data diri anda</h4><br>
                    <form class="form-horizontal" action="/costumer" method="post" >

                        <div class="form-group">
                            <label class="col-md-4 control-label">Nama</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" value="{{Auth::user()->name}}">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Alamat</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="address" >

                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Phone</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="phone">

                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Jenis Kelamin</label>

                            <div class="col-md-6">
                                <select name="gender" class="form-control">
                                    <option value="pria">Pria</option>
                                    <option value="wanita">Wanita</option>
                                </select>

                                @if ($errors->has('gender'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Email</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="email" value="{{Auth::user()->email}}">

                                @if ($errors->has('gender'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <input type="hidden" name="id" value={{Auth::user()->id}}>
                                <input type="hidden" class="form-control" name="users_id" value="{{Auth::user()->id}}"><br>          
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="submit" class="btn">
                            </div>
                        </div>

                        
                    </form>

                @elseif($costumer->id && $costumer->users_id)


                <div class="list-group">
                  <div class="list-group-item">
                    <h4 class="list-group-item-heading"><b>Nama</b> </h4>
                    <p class="list-group-item-text">{{$costumer->name}}</p>
                  </div>

                  <div class="list-group-item">
                    <h4 class="list-group-item-heading"><b>Alamat</b></h4>
                    <p class="list-group-item-text">{{$costumer->address}}</p>
                  </div>

                  <div class="list-group-item">
                    <h4 class="list-group-item-heading"><b>info</b></h4>
                    <p class="list-group-item-text"><b>Phone</b> : {{$costumer->phone}}</p>
                    <p class="list-group-item-text"><b>Email</b> : {{$costumer->email}}</p>
                    <p class="list-group-item-text"><b>ID</b> : {{$costumer->users_id}}</p>
                    <p class="list-group-item-text"><b>JK</b>    : {{$costumer->gender}}</p>
                    <p class="list-group-item-text"><b>Join</b>    : {{Auth::user()->created_at}}</p><br>

                    <form action="/costumer/{{$costumer->id}}" method="post">
                        <a href="/costumer/{{$costumer->id}}/edit" class="btn btn-success">Edit</a>
                        <input type="hidden" name="_method" value="delete">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" value="delete" class="btn btn-danger">Tutup Akun</button> 
                    </form>
                  </div>
                </div>


    {{--            <div class="container">
                    Nama :  {{$costumer->name}}<br>
                    Alamat : {{$costumer->address}}<br>
                    Phone : {{$costumer->phone}} <br>
                    Jenis Kelamin : {{$costumer->gender}} <br>
                    Email : {{$costumer->email}} <br>
                    Join : {{Auth::user()->created_at}} <br>
                    

                            </div> --}}
      {{--                   </div>
                </div>
                    

                    
                        

                @endif
                </div>
            </div>
        </div>
    </div>
</div>
@else
<script type="text/javascript">
    window.location = "/404";//here double curly bracket
</script>
@endif
@endsection --}}

                




{{-- <form class="form-horizontal" action="/costumer" method="post" >
    NAMA : <input type="text" class="form-control" name="name"><br>
    ALAMAT : <input type="text" class="form-control" name="adress"><br>
    PHONE : <input type="text" class="form-control" name="phone"><br>
    GENDER : <input type="text" class="form-control" name="gender"><br>
    USERS_ID : <input type="text" class="form-control" name="users_id"><br>          

    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="submit">
</form>

@foreach($costumer as $data)

    {{$data->id}} <br>   
    {{$data->name}} <br>    
    {{$data->adress}} <br> 
    {{$data->phone}} <br>
    {{$data->gender}} <br>
    {{$data->users_id}} <br>   

    <a href="/costumer/{{$data->id}}/edit" class="btn btn-success">Edit</a>

    <form action="/costumer/{{$data->id}}" method="post">
        <input type="hidden" name="_method" value="delete">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <button type="submit" value="delete" class="btn btn-danger">delete</button> 
    </form>

@endforeach --}}

 --}}

{{-- @extends('layouts.navbar')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Profile</div>

                <div class="panel-body">
					<form class="form-horizontal" action="/costumer/{{$costumers->id}}" method="post" >

						<div class="form-group">
                            <label class="col-md-4 control-label">Nama</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" value="{{$costumers->name}}">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Alamat</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="address" value="{{$costumers->address}}">

                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Phone</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="phone" value="{{$costumers->phone}}">

                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Jenis Kelamin</label>

                            <div class="col-md-6">

                                <select name="gender" class="form-control">
                                	@if($costumers == 'pria')
                                		<option value="pria" selected>Pria</option>
                                		<option value="wanita" >Wanita</option>
                                	@else
                                		<option value="pria" >Pria</option>
                                		<option value="wanita" selected>Wanita</option>
                                	@endif 
                                </select>

                                @if ($errors->has('gender'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Email</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="email" value="{{$costumers->email}}">

                                @if ($errors->has('gender'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                             	<input type="hidden" name="users_id" value="{{$costumers->users_id}}">

                             	<input type="hidden" name="_method" value="put">          
	    						<input type="hidden" name="_token" value="{{ csrf_token() }}">
	    						<input type="submit" class="btn">
	    						<a href="/costumer/{{$costumers->id}}" class="btn btn-default">cancel</a>
                            </div>
                        </div>

	    				
					</form>

			
                        </div>
				</div>
					

					
				        

				
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}