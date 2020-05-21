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
    {{--    @if(session()->has('downloadToken'))--}}
    {{--        <section class="hero is-danger">--}}
    {{--            <div class="hero-body">--}}
    {{--                <div class="container">--}}
    {{--                    <h1 class="title is-4">--}}
    {{--                        Downloaded--}}
    {{--                    </h1>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </section>--}}
    {{--    @endif--}}
    {{--    <div class="level">--}}
    {{--        <div class="level-left">--}}
    {{--            <div class="level-item">--}}
    {{--                <form name="qrSelect" id="qrSelect" action="{{Route('qrDownload')}}" method="POST">--}}
    {{--                    @csrf--}}
    {{--                    <button type="submit" class="button">Download</button>--}}
    {{--                </form>--}}


    {{--            </div>--}}
    {{--            <div class="level-item">--}}
    {{--                <a href="{{Route('qrDownloadAll')}}"><button class="button">Download All</button></a>--}}
    {{--            </div>--}}

    {{--                <p><b>Selected rows data:</b></p>--}}
    {{--                <pre id="example-console-rows"></pre>--}}

    {{--        </div>--}}
    <example-component :rows="{{json_encode($data)}}"></example-component>
    {{--    </div>--}}
    {{--    <div class="container" id="tableDiv">--}}

    {{--         <span>Selected: @{{ checkedItems }}</span>--}}
    {{--         <input :v-model="checkedItems" type="text">--}}

    {{--            <table id="table" class="table display stripe" style="width:60%;">--}}
    {{--                <thead style="background-color:#b51f38">--}}
    {{--                <tr>--}}
    {{--                    <th style="color:#ffffff"></th>--}}
    {{--                    <th style="color:#ffffff">Naam </th>--}}
    {{--                    <th style="color:#ffffff">Nummer</th>--}}
    {{--                    <th style="color:#ffffff">Type</th>--}}
    {{--                </tr>--}}
    {{--                </thead>--}}
    {{--                <tbody>--}}
    {{--                @foreach ($data as $product)--}}
    {{--                    <tr data-href="product/{{$product->id}}">--}}
    {{--                        <td><table-checkbox :number="'{{ $product->model_number }}'"></table-checkbox></td>--}}
    {{--                        <td><div class="level-left"><button class="button is-text is-small">{{$product->model_name}}</button></div></td>--}}
    {{--                        <td><button class="button is-text is-small">{{$product->model_number}}</button></td>--}}
    {{--                        <td><button class="button is-text is-small">{{$product->model_type}}</button></td>--}}
    {{--                    </tr>--}}

    {{--                @endforeach--}}

    {{--                </tbody>--}}
    {{--                <tfoot style="background-color:#b51f38; color: #ffffff">--}}
    {{--                <tr>--}}
    {{--                    <th style="color:#ffffff"></th>--}}
    {{--                    <th style="color:#ffffff">Naam </th>--}}
    {{--                    <th style="color:#ffffff">Nummer</th>--}}
    {{--                    <th style="color:#ffffff">Type</th>--}}
    {{--                </tr>--}}
    {{--                </tfoot>--}}
    {{--            </table>--}}
    {{--    </div>--}}
@endsection

@push('scripts')

    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.20/sl-1.3.1/datatables.min.js" defer></script>
    <link type="text/css" href="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.11/css/dataTables.checkboxes.css" rel="stylesheet" />
    <script type="text/javascript" src="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.11/js/dataTables.checkboxes.min.js" defer></script>
    <script>
        $(document).ready(function() {
            $('#table').DataTable({
                // 'columnDefs': [
                //     {
                //         'targets': 0,
                //         'checkboxes': {
                //             'selectRow': true,
                //             'name': 'selectedItems[]'
                //         }
                //     }
                // ],
                'select': {
                    'style': 'multi'
                },
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
<script>
    export default
    {
        data: function() {
            return {
                checkedItems: [],
                variable: []
            }
        },
        mounted(){

        }
    }
</script>