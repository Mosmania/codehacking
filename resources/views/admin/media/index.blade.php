@extends('layouts.admin')

@section('content')

    <h1>Media</h1>

    @if($photos)

        <form action="delete/media" method="post" class="form-inline">
            {{csrf_field()}}
            {{method_field('delete')}}

            <div class="form-group">
                <select name="checkBoxArray" id="" class="form-control">
                    <option value="">Delete</option>
                </select>
            </div>
            <div class="form-group">
                <input type="submit" name="delete_all" class="btn-primary">
            </div>

            <table class="table">
              <tr>
                <th><input type="checkbox" id="options"></th>
                <th>Id</th>
                <th>Name</th>
                <th>Created At</th>
                <th>&nbsp;</th>
              </tr>
              @foreach($photos as $photo)
              <tr>
                <th><input class="checkBoxes" type="checkbox" name="checkBoxArray[]" value="{{$photo->id}}"></th>
                <td>{{$photo->id}}</td>
                <td><img height="50" src="{{$photo->file}}" alt=""></td>
                <td>{{$photo->created_at ? $photo->created_at->diffForHumans() : 'No date'}}</td>
                {{--<td>{{$photo->updated_at ? $photo->updated_at->diffForHumans() : 'No date'}}</td>--}}
                <td>
                  {{--{!! Form::open(['method'=>'DELETE', 'action'=>['AdminMediasController@destroy', $photo->id]]) !!}--}}
                      {{--<div class="form-group">--}}
                          {{--{!! Form::submit('Delete Photo', ['class'=>'btn btn-danger' ]) !!}--}}
                      {{--</div>--}}
                  {{--{!! Form::close() !!}--}}

                    {{--<input type="hidden" name="photo" value="{{$photo->id}}">--}}
                    {{--<div class="form-group">--}}
                        {{--<input type="submit" name="delete_single" value="Delete" class="btn btn-danger">--}}
                    {{--</div>--}}
                </td>
              </tr>
              @endforeach
            </table>

        </form>
    @endif


@endsection

@section('scripts')

    <script>
        $(document).ready(function(){

            $('#options').click(function(){
                if(this.checked){
                    $('.checkBoxes').each(function(){

                        this.checked = true;
                    })
                }
                else {
                    $('.checkBoxes').each(function(){

                        this.checked = false;
                    })
                }

                console.log('it works');
            })


        })

    </script>

@endsection