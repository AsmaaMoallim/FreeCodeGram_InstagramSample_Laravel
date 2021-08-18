@extends('layouts.app')

@section('content')
<div class="container">
    @foreach($posts as $post)
        <div class="row pt-3">
            <div class="col-6 offset-3">
                <a href="/profile/{{$post->user->id}}">

                <img src="/storage/{{$post->image}}" class="w-100" >
                </a>

            </div>
        </div>
        <div class="row pt-2 pb-5">

        <div class="col-6 offset-3">
                 <div>
                <p>
                    <span  class="font-weight-bold">
                        <a href="/profile/{{$post->user->id}}">
                            <span class="text-dark">{{$post->user->username}} </span>
                        </a>

                    </span> {{ $post->caption }}
                </p>

        </div>
        </div></div>
    @endforeach
{{--        <div class="row">--}}
{{--            <div class="col-2">--}}
{{--                {{ $posts->links() }}--}}
{{--            </div>--}}
{{--        </div>--}}
        @if(auth()->user()->following->count()!=0)
        <div class="row">
            <div class="col-12 offset-5">
                <!-- a Tag for previous page -->
                <a href="{{$posts->previousPageUrl()}}">
                    <img src="/svg/next.svg" style="max-width: 3%; transform: rotate(180deg)">      </a>
            @for($i=0;$i<=$posts->lastPage();$i++)
                <!-- a Tag for another page -->
                    <a href="{{$posts->url($i)}}"> @if($i%3!=0)<img src="/svg/DotIcon.svg" style="max-width:2%"> @endif</a>

                    {{--                @if($i%3!=0)--}}
{{--                    <a href="{{$posts->url($i)}}"><img src="/svg/DotIcon.svg" style="max-width:2%"></a>--}}
{{--                    @endif--}}
            @endfor
            <!-- a Tag for next page -->
                <a href="{{$posts->nextPageUrl()}}">
                   <img src="/svg/next.svg" style="max-width: 3%">       </a>
            </div>
        </div>
</div>
@else
    <div class="container">
            <div class="row justify-content-center" style="margin-top: 20%">
                <div class="col-8 offset-1 ">

                    <h1>Opps!  You are not following anybody</h1>
                </div>
            </div>
    </div>
@endif

@endsection

