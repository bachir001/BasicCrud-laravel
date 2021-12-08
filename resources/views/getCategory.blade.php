<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>getCategory page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>
    <x-guest-layout>

<x-adminnav/>    
<div class="container mt-2">
<div class="row" style="text-align: center">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h3> <i> {{ __('msg.Categories')}} </i> </h3>
            </div>
        </div>
</div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   

    <form action="{{ route('search') }}" method="GET" class="d-flex" style="margin-bottom: 20px ; width:250px" >
            <input class="form-control me-2" type="text" placeholder="Search" name="search" required aria-label="Search">
            <button class="btn btn-outline-secondary" type="submit">{{ __('msg.Search')}}</button>
    </form>

    @if($categsearchs=="notyet")
    <div>

    </div>


    @elseif($categsearchs)


    @foreach ($categsearchs as $categ)
        <div class="class-list">
            <p>{{ $categ->name }}</p>
            <img src="{{Storage::url($categ->image)}}"  height="75" width="75" >

            <p>

            <form action="{{ route('deletecategory',$categ->id) }}" method="POST">
    
                <a class="btn btn-primary" href="{{ route('editview.dashboard',['id'=>$categ->id]) }}">{{ __('Edit')}}</a>

                @csrf
                @method('DELETE')
  
                <button type="submit" class="btn btn-danger">{{ __('msg.Delete')}}</button>
            </form>   
            
        </p>
        
        </div>
    @endforeach

   
@endif




    <table class="table table-bordered">
        <tr>
            <th>{{ __('msg.S.No')}}</th>
            <th>{{ __('msg.Image')}}</th>
            <th>{{ __('msg.Name')}}</th>
            <th width="280px">
                <a class="btn btn-success" href="{{ route('addview.dashboard') }}"> {{ __('msg.Add')}} </a>
            </th>
        </tr>
        @foreach ($categories as $cat)
        <tr>
            <td>{{ $cat->id }}</td>
            <td> <img src="{{Storage::url($cat->image)}}" height="75" width="75" alt="error" /> </td>
            <td>{{ $cat->name }}</td>
            <td>
                <form action="{{ route('deletecategory',$cat->id) }}" method="POST">
    

                    <a class="btn btn-primary" href="{{ route('editview.dashboard',['id'=>$cat->id]) }}"> {{ __('msg.Edit')}}</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">{{ __('msg.Delete')}}</button>
                </form>
            </td>
        </tr>

        @endforeach
    </table>
  
    <div>
    {!! $categories->links() !!}
    </div>
</x-guest-layout>

</body>
</html>