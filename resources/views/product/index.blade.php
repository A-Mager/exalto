@extends('layouts/app')
@section('content')
    <div class="container">

    <table id="table" class="table datatable" style="width:auto">
        <thead>
        <tr>
            <th>Model</th>
            <th>Type</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($data as $product)

                <tr data-href="product/{{$product->id}}">
                    <td>{{$product->modelNumber}}</td>
                    <td>{{$product->type}}</td>
                </tr>

        @endforeach

        </tbody>
        <tfoot>
        <tr>
            <th>Model</th>
            <th>Type</th>
        </tr>
        </tfoot>
    </table>
    </div>
    <script>

    </script>
@endsection
