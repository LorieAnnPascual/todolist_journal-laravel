@extends ('layout')
@section ('content')
    <div class="push-top">
        @if(session()->get('success'))
            <div class="alert alert-success">
                {{session()->get('success')}}
            </div> <br />
        @endif
        <table class="table">
            <thead>
                <tr class="table-success">
                    <th>ID</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Task</th>
                    <th>Journal</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($list as $l)
                    <tr>
                        <td>{{$l->id}}</td>
                        <td>{{$l->date}}</td>
                        <td>{{$l->time}}</td>
                        <td>{{$l->todo}}</td>
                        <td>{{$l->journal}}</td>
                        <td>
                            <a href="{{route('lists.edit', $l->id)}}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{route('lists.destroy', $l->id)}}" method="post">
                                @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach  
            </tbody>
        </table>
        <form action="{{route('lists.create')}}">
            <button type="submit" class="btn btn-warning">Back</button>
        </form>
    </div>
@endsection
