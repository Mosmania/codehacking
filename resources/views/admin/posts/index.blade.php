@extends('layouts.admin')

@section('content')

    @if(Session::has('created_post'))
        <p class="bg-success">{{session('created_post')}}</p>
    @endif
    @if(Session::has('updated_post'))
        <p class="bg-success">{{session('updated_post')}}</p>
    @endif
    @if(Session::has('deleted_post'))
        <p class="bg-danger">{{session('deleted_post')}}</p>
    @endif

    <h1>Posts</h1>

    <table class="table">
      <tr>
          <th>Id</th>
          <th>Photo</th>
          <th>Title</th>
          <th>Owner</th>
          <th>Category</th>
          {{--<th>Body</th>--}}
          <th>Post</th>
          <th>Comments</th>
          <th>Created at</th>
          <th>Updated at</th>
      </tr>

      @if($posts)

          @foreach($posts as $post)
              <tr>
                  <td>{{$post->id}}</td>
                  <td><img height="50" src="{{$post->photo ? $post->photo->file : 'http://placehold.it/400x400' }}" alt=""></td>
                  <td><a href="{{route('admin.posts.edit', $post->id)}}">{{str_limit($post->title, 30)}}</a></td>
                  <td>{{$post->user->name}}</td>
                  <td>{{$post->category ? $post->category->name : 'Uncategorized'}}</td>
                  {{--<td>{{str_limit($post->body, 30)}}</td>--}}

                  {{--<td><a href="{{route('home.post', $post->slug)}}">View Post</a></td>--}}
                  <td><a href="{{route('home.post', $post->id)}}">View Post</a></td>
                  <td><a href="{{route('admin.comments.show', $post->id)}}">View Comments</a></td>
                  <td>{{$post->created_at->diffForHumans()}}</td>
                  <td>{{$post->updated_at->diffForHumans()}}</td>
              </tr>
          @endforeach

      @endif

    </table>

    <div class="row">
        <div class="col-sm-6 col-sm-offset-5">
            {{$posts->render()}}

        </div>
    </div>
@endsection
