@extends('layouts.admin')

@section('content')

    <h1>Media</h1>

    @if($photos)

    <table class="table">
      <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Created At</th>
        <th>&nbsp;</th>
      </tr>
      @foreach($photos as $photo)
      <tr>
        <td>{{$photo->id}}</td>
        <td><img height="50" src="{{$photo->file}}" alt=""></td>
        <td>{{$photo->created_at ? $photo->created_at->diffForHumans() : 'No date'}}</td>
        {{--<td>{{$photo->updated_at ? $photo->updated_at->diffForHumans() : 'No date'}}</td>--}}
        <td>
          {!! Form::open(['method'=>'DELETE', 'action'=>['AdminMediasController@destroy', $photo->id]]) !!}
              <div class="form-group">
                  {!! Form::submit('Delete Photo', ['class'=>'btn btn-danger' ]) !!}
              </div>
          {!! Form::close() !!}
        </td>
      </tr>
      @endforeach
    </table>

    @endif

@endsection