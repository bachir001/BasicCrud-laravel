<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>getProduct page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

    <x-guest-layout>

        <x-adminnav />

        <div class="container mt-2">

            <div class="row" style="text-align: center">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h3> <i> {{ __('Products') }} </i> </h3>
                    </div>
                </div>
            </div>

            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif


            <form action="{{ route('searchproduct') }}" method="GET" class="d-flex"
                style="margin-bottom: 20px ; width:250px">
                <input class="form-control me-2" type="text" placeholder="Search" name="search" required
                    aria-label="Search">
                <button class="btn btn-outline-secondary" type="submit">{{ __('Search') }}</button>
            </form>

            @if ($productsearchs == 'notyet')
                <div>

                </div>


            @elseif($productsearchs)


                @foreach ($productsearchs as $prdt)
                    <div class="class-list">
                        <p>{{ $prdt->name }}</p>
                        <img src="{{ Storage::url($prdt->image) }}" height="75" width="75">

                        <p>

                        <form action="{{ route('deleteproduct', $prdt->id) }}" method="POST">

                            <a class="btn btn-primary"
                                href="{{ route('editproduct.dashboard', ['id' => $prdt->id]) }}">{{ __('Edit') }}</a>

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger">{{ __('Delete') }}</button>
                        </form>

                        </p>

                    </div>
                @endforeach


            @endif




            <table class="table table-bordered">
                <tr>
                    <th>{{ __('S.No') }}</th>
                    <th>{{ __('Image') }}</th>
                    <th>{{ __('Name') }}</th>
                    <th>{{ __('Details') }}</th>
                    <th>{{ __('Category Name') }}</th>


                    <th width="280px">
                        <a class="btn btn-success" href="{{ route('addproduct.dashboard') }}"> {{ __('Add') }}
                        </a>
                    </th>
                </tr>
                @foreach ($products as $product)
                    <tr>

                        <td>{{ $product->id }}</td>
                        <td> <img src="{{ Storage::url($product->image) }}" height="75" width="75" alt="error" />
                        </td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->categories->name }}</td>

                        <td>
                            <form action="{{ route('deleteproduct', $product->id) }}" method="POST">

                                <a class="btn btn-primary"
                                    href="{{ route('editproduct.dashboard', ['id' => $product->id]) }}">
                                    {{ __('Edit') }}</a>

                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger">{{ __('Delete') }}</button>
                            </form>
                        </td>
                    </tr>

                @endforeach
            </table>

            <div>
                {!! $products->links() !!}
            </div>
    </x-guest-layout>

</body>

</html>
