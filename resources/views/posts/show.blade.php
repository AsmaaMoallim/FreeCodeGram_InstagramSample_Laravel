@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row pt-3" style="max-width: 70%">
            <div class="col-6">
                    <img src="/storage/{{$post->image}}" class="w-100" >
            </div>
            <div class="col-4">
                    <div class="d-flex align-items-center">
                        <img src="{{$post->user->profile->defaultProfileimage()}}" class="rounded-circle w-25 " style="max-width: 55px">


                        <div class="font-weight-bold pl-3" >
                            <a href="/profile/{{$post->user->id}}">
                                <span class="text-dark pr-2">{{$post->user->username}} </span>
                            </a>
                        </div>
                        <img src="/svg/DotIcon.svg" style="max-width:3%">
                        <a href="#" class="pl-2"> Follow </a>
                    </div>

                <hr>


                <p>
                    <span  style="font-weight: bolder">
                        <a href="/profile/{{$post->user->id}}">
                            <span class="text-dark">{{$post->user->username}} </span>
                        </a>
                    </span>
                    {{ $post->caption }}
                </p>
            </div>
    </div>
</div>
@endsection

