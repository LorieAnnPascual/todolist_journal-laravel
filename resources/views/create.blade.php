@extends('layout')
@section('content')
    <div class="container-sm">
        <div class="title mt-3">
            <h4 class="fw-bold text-center">To-do List and Journal Using Laravel</h4>
        </div>
        <div class="body">
            <form action="{{route('lists.store')}}" method="post">
                <div class="form-group mt-3">
                    @csrf
                        <label for="date">Select Date:
                            <input type="date" name="date" class="form-control" id="">
                        </label>
                </div>
                
                <div class="form-group mt-3">
                    <label for="time">Indicate Time:
                        <input type="time" name="time" class="form-control" id="">
                    </label>
                </div>
                
                <div class="form-group mt-3">
                    <label for="todo">Things to do:
                        <input type="text" name="todo" class="form-control s-md" id="">
                    </label>
                </div>
                
                <div class="form-group mt-3">
                    <label for="journal">Things I'm thankful for:
                        <textarea name="journal" class="form-control" id="" cols="40" rows="2"></textarea>
                    </label>
                </div>
                <button type="submit" class="btn btn-warning mt-3">Add</button>
            </form>
        </div>
    </div>
@endsection()