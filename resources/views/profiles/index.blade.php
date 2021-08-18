@extends('layouts.app')
<script src="{{ mix('/js/app.js') }}"></script>

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5 text-md-center"  >
            <img src="{{$user->profile->defaultProfileimage()}}" alt="no image" class="rounded-circle w-100">
            @can('update', $user->profile)
                <a  href="/profile/{{$user->id}}/edit">Edit Profile</a>
            @endcan

        </div>
        <div class="col-6  pt-5">


            <div class="d-flex align-items-baseline justify-content-between">
                <div class="d-flex align-items-center pb-3">
                    <div class="h4">{{ $user->username}}</div>
                    <div id="app">
                        <follow-button user-id="{{$user->id}}" follows="{{$follows}}"></follow-button>

                    </div>
                </div>

                @can('update', $user->profile)
                    <div class="d-flex">
                        <a href="/p/create">Add new Post</a>

                    </div>

                @endcan
            </div>

{{--            @can('update', $user->profile)--}}
{{--                <div class=" align-baseline float-right">--}}
{{--                    <a href="/profile/{{$user->id}}/edit">Edit Profile</a>--}}
{{--                </div>--}}
{{--            @endcan--}}

            <div class="d-flex">
                <div class="pr-5"><strong>{{ $postCount }}</strong> posts</div>
                <div class="pr-5"><strong>{{ $followersCount }}</strong> followers</div>
                <div class="pr-5"><strong>{{ $followingCount }}</strong> following</div>
            </div>

            <div class="pt-3 font-weight-bold">{{ $user->profile->title }}</div>
            <div>{{$user->profile->description}}</div>
{{--            We are globaly a community of million people learning together. We are an open source, donor-supported, 501(c)(3) nonprofit.--}}
            <div> <a href="#" > {{ $user->profile->url}}</a></div>
{{--            www.freecodecamp.com--}}

        </div>
    </div>

    <div class="row pt-3">
        @foreach($user->posts as $post)
            <div class="col-4">
                <a href="/p/{{$post->id}}">
                    <img src="/storage/{{$post->image}}" class="w-100 pt-5 " >

                </a>

            </div>
        @endforeach




    </div>
{{--    <div class="row justify-content-center">--}}
{{--        <div class="col-md-8">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header">{{ __('Dashboard') }}</div>--}}

{{--                <div class="card-body">--}}
{{--                    @if (session('status'))--}}
{{--                        <div class="alert alert-success" role="alert">--}}
{{--                            {{ session('status') }}--}}
{{--                        </div>--}}
{{--                    @endif--}}

{{--                    {{ __('You are logged in!') }}--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

</div>
@endsection
{{--<script>--}}
{{--    import FollowButton from "../../js/components/FollowButton";--}}
{{--    export default {--}}
{{--        components: {FollowButton}--}}
{{--    }--}}
{{--</script>--}}
