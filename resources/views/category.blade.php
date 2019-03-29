@extends('template.layout')
@section('title', 'Productos')
@section('style')
    <link rel="stylesheet" href="{{url('/css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{url('/css/app.css')}}">
@endsection

@section('content')
    @component('components.product.banner',[
        'categoria' => $categoria
    ])
    @endcomponent
    <div class="row rowMenuProducts">
        @component('components.category.menu',[
            'categorias' => $categorias,
            'cat_id'=>$cat_id,'categoria'=>$categoria,'subcat_id'=>$subcat_id,'subcategoria'=>$subcategoria,
            'sub_subcat_id'=>$sub_subcat_id,'sub_subcategoria'=>$sub_subcategoria,
            'subcategorias'=>$subcategorias,'sub_subcategorias'=>$sub_subcategorias,
        ])
        @endcomponent
        @component('components.category.products',[
            'cat_id'=>$cat_id,'categoria'=>$categoria,'subcat_id'=>$subcat_id,'subcategoria'=>$subcategoria,
            'sub_subcat_id'=>$sub_subcat_id,'sub_subcategoria'=>$sub_subcategoria,
        ])
        @endcomponent
    </div>
@endsection

@section('script')
    <script src="{{url('js/jquery-ui.js')}}"></script>
    <script>
        $(document).ready(function() {
            var min = 10000,
                max = 3000000,
                cat_id = '{{$cat_id}}',subcat_id  = '{{$subcat_id}}' ,sub_subcat_id = '{{$sub_subcat_id}}';

            //alert(min+max+cat_id+subcat_id+sub_subcat_id);
            searchProductsFilter();
            $( "#slider-range" ).slider({
                range: true,
                min: 10000,
                max: 3000000,
                step: 10000,
                values: [ 10000, 3000000 ],
                stop: function( event, ui ) {
                    searchProductsFilter();
                },
                slide: function( event, ui ) {
                    $( "#minimum" ).text(addCommas(ui.values[ 0 ]));
                    $( "#maximum" ).text(addCommas(ui.values[ 1 ]));
                    $( "#min" ).val(ui.values[ 0 ]);
                    $( "#max" ).val(ui.values[ 1 ]);
                    min = $("#min").val();
                    max = $("#max").val();
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
            
            function searchProductsFilter()
            {
                $.ajax({
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    type: "POST",
                    url: '{{url('/')}}/searchProductsFilter/'+min+"/"+max+"/"+cat_id+"/"+subcat_id+"/"+sub_subcat_id,
                    data: {},
                    beforeSend: function() {
                        $('#productlist').hide();
                        $('#loader').show();
                    },
                    complete: function(){
                        setTimeout(function () {
                            $('#loader').hide();
                            $('#productlist').show();
                        },3000);
                    },
                    success: function( msg ) {
                        setTimeout(function () {
                            $("#productlist").html(msg);
                        },3000);
                    }
                });
            }
        });
    </script>
@endsection