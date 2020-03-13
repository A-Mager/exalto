@extends('layouts/app')
@section('header')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
@endsection

@section('content')
    @if(session()->has('errorToken'))
        <section class="hero is-danger">
            <div class="hero-body">
                <div class="container">
                    <h1 class="title is-4">
                        Selecteer minimaal 1 item
                    </h1>
                </div>
            </div>
        </section>
    @endif
    @if(session()->has('downloadToken'))
        <section class="hero is-danger">
            <div class="hero-body">
                <div class="container">
                    <h1 class="title is-4">
                        Downloaded
                    </h1>
                </div>
            </div>
        </section>
    @endif
    <div class="level">
        <div class="level-left">
            <div class="level-item">
                <form name="qrSelect" id="qrSelect" action="{{Route('qrDownload')}}" method="POST">
                    @csrf
                    <button type="submit" class="button">Download</button>
                </form>
            </div>
            <div class="level-item">
                <a href="{{Route('qrDownloadAll')}}"><button class="button">Download All</button></a>
            </div>
        </div>
    </div>
    <div class="container" id="tableDiv">



         <p>Selected: @{{ checkedItems }}</p>
        <test-component :product-data="'{{ json_encode($data) }}'"></test-component>
{{--            <table id="table" class="table display stripe" style="width:60%;">--}}
{{--                <thead style="background-color:#b51f38">--}}
{{--                <tr>--}}
{{--                    <th style="color:#ffffff">Naam </th>--}}
{{--                    <th style="color:#ffffff">Nummer</th>--}}
{{--                    <th style="color:#ffffff">Type</th>--}}
{{--                </tr>--}}
{{--                </thead>--}}
{{--                <tbody>--}}
{{--                @foreach ($data as $product)--}}
{{--                    <tr data-href="product/{{$product->id}}">--}}
{{--                        <td><div class="level-left"><input type="checkbox" name="selected[]" value="{{ $product->model_number }}" form="qrSelect"><button class="button is-text is-small">{{$product->model_name}}</button></div></td>--}}
{{--                        <td><button class="button is-text is-small">{{$product->model_number}}</button></td>--}}
{{--                        <td><button class="button is-text is-small">{{$product->model_type}}</button></td>--}}
{{--                    </tr>--}}

{{--                @endforeach--}}

{{--                </tbody>--}}
{{--                <tfoot style="background-color:#b51f38; color: #ffffff">--}}
{{--                <tr>--}}
{{--                    <th style="color:#ffffff">Naam</th>--}}
{{--                    <th style="color:#ffffff">Nummer</th>--}}
{{--                    <th style="color:#ffffff">Type</th>--}}
{{--                </tr>--}}
{{--                </tfoot>--}}
{{--            </table>--}}
    </div>
@endsection

@push('scripts')



    <script src="https://code.jquery.com/jquery-3.3.1.js" ></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" defer></script>
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

@endpush


{{--  TODO Implement VueJS for the checkboxes. Usecase would look like this: User clicks on a checkbox, Vue would then add the value to a hidden field. After the user presses download the hidden fields values get sent to the controller which will then fetch the appropriate files --}}
{{--  TODO Styling. Fun.  --}}
