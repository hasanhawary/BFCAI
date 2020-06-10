@foreach ($users as $user)
    @if ($user->type)
        <option value="{{$user->id}}">{{$user->full_name}}</option>     
    @else
        <option value="{{$user->id}}">{{$user->full_name}}</option>     
    @endif
@endforeach
