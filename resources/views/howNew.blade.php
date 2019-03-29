@extends('template.layout')
@section('title', '¡Como Nuevo!')
@section('style')
    <link rel="stylesheet" href="{{url('/css/jquery-ui.css')}}">
@endsection

@section('content')
    @component('components.howNew.banner')
    @endcomponent
    <div class="row rowMenuProducts">
        @component('components.howNew.menu')
        @endcomponent
        @component('components.howNew.products')
        @endcomponent
    </div>
@endsection

@section('script')
    <script src="{{url('js/jquery-ui.js')}}"></script>
    <script>
        $(document).ready(function() {

            $( "#slider-range" ).slider({
                range: true,
                min: 100000,
                max: 1000000,
                step: 10000,
                values: [ 100000, 1000000 ],
                stop: function( event, ui ) {
                    //cargarfiltro(<?=$id?>)
                },
                slide: function( event, ui ) {
                    $( "#minimum" ).text(addCommas(ui.values[ 0 ]));
                    $( "#maximum" ).text(addCommas(ui.values[ 1 ]));
                    $( "#min" ).val(ui.values[ 0 ]);
                    $( "#max" ).val(ui.values[ 1 ]);
                }
            });

            function addCommas(nStr)
            {
                nStr += '';
                x = nStr.split('.');
                x1 = x[0];
                x2 = x.length > 1 ? '.' + x[1] : '';
                var rgx = /(\d+)(\d{3})/;
                while (rgx.test(x1)) {
                    x1 = x1.replace(rgx, '$1' + '.' + '$2');
                }
                return x1 + x2;
            }

        });
    </script>
@endsection