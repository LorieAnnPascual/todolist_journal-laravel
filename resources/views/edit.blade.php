@extends ('layout')
@section ('content')
    <div class="container-sm">
        <div class="title">
            <h4 class="fw-bold text-center">Edit List</h4>
        </div>
        <div class="body">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div> <br />
            @endif
            <form action="{{route('lists.update', $list->id)}}" method="post">
                <div class="form-group mt-3">
                    @csrf
                        @method('PATCH') 
                            <label for="date">Select Date:
                                <input type="date" name="date" class="form-control" id="date" value="{{$list->date}}">
                            </label>
                </div>
                
                <div class="form-group mt-3">
                    <label for="time">Indicate Time:
                        <input type="time" name="time" class="form-control" id="time" value="{{$list->time}}">
                    </label>
                </div>

                <div class="form-group mt-3">
                    <label for="todo">Things to do:
                        <input type="text" name="todo" class="form-control" id="todo" value="{{$list->todo}}">
                    </label>
                </div>
               
                <div class="form-group mt-3">
                    <label for="journal">Things I'm thankful for:
                        <textarea name="journal" class="form-control" id="journal" cols="40" rows="2" value="{{$list->journal}}"></textarea>
                    </label>
                </div> <br />
                <button class="btn btn-block btn-warning" type="submit">Update List</button>                
            </form>
        </div>
    </div>
@endsection