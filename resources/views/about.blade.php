@extends('template.layout')
@section('title', 'Sobre nosotros')
@section('style')
    <link rel="stylesheet" href="{{url('lightgallery/css/lightgallery.css')}}">
    <link rel="stylesheet" href="{{url('galeryVideos/css/svvg-styles.css')}}">
    <style>
        #modalVideos .ytVideo .sv-overlay{
            background: #FFD000 url('{{asset('galeryVideos/images/youtube.png')}}') no-repeat center 20%;
            background-size: 35px auto;
        }
    </style>
@endsection

@section('content')
    @component('components.about.banner',[
        'textos' => $textos,
        'galeria_imagenes' => $galeria_imagenes
    ])
    @endcomponent
    @component('components.about.videos',[
        'galeria_videos' => $galeria_videos
    ])
    @endcomponent
@endsection

@section('script')
    <!-- lightgallery plugins -->
    <script src="{{url('lightgallery/js/lightgallery.min.js')}}"></script>
    <script src="{{url('lightgallery/js/lg-thumbnail.min.js')}}"></script>
    <script src="{{url('lightgallery/js/lg-fullscreen.min.js')}}"></script>
    <script src="{{url('lightgallery/js/lg-share.min.js')}}"></script>
    <script src="{{url('lightgallery/js/lg-zoom.min.js')}}"></script>
    <script>
        lightGallery(document.getElementById('galeryImagenes'));
    </script>
    <script src="{{url('galeryVideos/js/speedvault.js')}}"></script>
    <script>
        $('#galery').on('click', function() {
            $('.containerImagenesGaleria').trigger('click');
        });
    </script>
@endsection