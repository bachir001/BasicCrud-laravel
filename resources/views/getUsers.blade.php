<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>getProduct page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>
   
 <x-guest-layout>

  <x-adminnav/>    

  <div class="container mt-2">

    <div class="row" style="text-align: center">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h3> <i> {{ __('Users')}} </i> </h3>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   

    <form action="{{ route('searchuser') }}" method="GET" class="d-flex" style="margin-bottom: 20px ; width:250px" >
        <input class="form-control me-2" type="text" placeholder="Search" name="search" required aria-label="Search">
        <button class="btn btn-outline-secondary" type="submit">{{ __('Search')}}</button>
</form>

    @if($usersearchs=="notyet")
    <div>

    </div>


    @elseif($usersearchs)


    @foreach ($usersearchs as $usr)
        <div class="class-list">
            <h4>{{ $usr->name }}</h4>
            <h4>{{$usr->email}}</h4>
            
            <p>

            <form action="{{ route('deleteuser',$usr->id) }}" method="POST">
    
                <a class="btn btn-primary" href="{{ route('edituser.dashboard',['id'=>$usr->id]) }}">{{ __('Edit')}}</a>

                @csrf
                @method('DELETE')
  
                <button type="submit" class="btn btn-danger">{{ __('Delete')}}</button>
            </form>   
            
        </p>
        
        </div>
    @endforeach

   
@endif




    <table class="table table-bordered">
        <tr>
            <th>{{ __('U.No')}}</th>
            <th>{{ __('Name')}}</th>
            <th>{{ __('email')}}</th>


            <th width="280px">
                <a class="btn btn-success" href="{{ route('adduser.dashboard') }}"> {{ __('Add')}} </a>
            </th>
        </tr>
        @foreach ($users as $user)
        <tr>
            
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>

            <td>
                <form action="{{ route('deleteuser',$user->id) }}" method="POST">
    

                    <a class="btn btn-primary" href="{{ route('edituser.dashboard',['id'=>$user->id]) }}"> {{ __('Edit')}}</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">{{ __('Delete')}}</button>
                </form>
            </td>
        </tr>

        @endforeach
    </table>
  
    <div>
    {!! $users->links() !!}
    </div>
</x-guest-layout>

</body>
</html>