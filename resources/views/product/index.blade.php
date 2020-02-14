@extends('layouts/app')
@section('content')
    <div class="container">

    <table id="table" class="table datatable" style="width:auto">
        <thead>
        <tr>
            <th>Model</th>
            <th>Type</th>
            @if(Auth::check() === true)
                <th>Aanpassen</th>
                <th>Verwijder</th>
            @endif
        </tr>
        </thead>
        <tbody>
        @foreach ($data as $product)

                <tr data-href="product/{{$product->id}}">
                    <td><a href="product/{{$product->id}}">{{$product->model_number}}</a></td>
                    <td>{{$product->type}}</td>
                    @if(Auth::check() === true)
                        <td><a href="product/{{$product->id}}"><button class="button is-info is-small">Pas aan</button></a></td>
                        <td><a href="product/{{$product->id}}/delete"><button class="button is-danger is-small">Verwijder</button></a></td>
                    @endif
                </tr>

        @endforeach

        </tbody>
        <tfoot>
        <tr>
            <th>Model</th>
            <th>Type</th>
            @if(Auth::check() === true)
                <th>Aanpassen</th>
                <th>Verwijder</th>
            @endif
        </tr>
        </tfoot>
    </table>
    </div>
    <script>
        $(document).ready(function() {
            $('#table').DataTable({
                language: {
                    "sProcessing": "Bezig...",
                    "sLengthMenu": "_MENU_ resultaten weergeven",
                    "sZeroRecords": "Geen resultaten gevonden",
                    "sInfo": "_START_ tot _END_ van _TOTAL_ resultaten",
                    "sInfoEmpty": "Geen resultaten om weer te geven",
                    "sInfoFiltered": " (gefilterd uit _MAX_ resultaten)",
                    "sInfoPostFix": "",
                    "sSearch": "Zoeken:",
                    "sEmptyTable": "Geen resultaten aanwezig in de tabel",
                    "sInfoThousands": ".",
                    "sLoadingRecords": "Een moment geduld aub - bezig met laden...",
                    "oPaginate": {
                        "sFirst": "Eerste",
                        "sLast": "Laatste",
                        "sNext": "Volgende",
                        "sPrevious": "Vorige"
                    },
                }
            });
        });

    </script>
@endsection
