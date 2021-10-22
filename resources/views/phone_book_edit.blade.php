@extends('layout')

@section('content')
    <form action="{{route('phone_book.update', $phone_book->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        {{ method_field('PUT') }}
        <div class="mb-3">
            <label for="inputFirst" class="form-label">First</label>
            <input type="text" class="form-control" id="inputFirst" aria-describedby="firstDesc" name="first" value="{{$phone_book->first}}" required>
            <div id="firstDesc" class="form-text">Please input your first name</div>
            @if($errors->has('first'))
                <div class="alert alert-danger">{{$errors->first('first')}}</div>
            @endif
        </div>
        <div class="mb-3">
            <label for="inputLast" class="form-label">Last</label>
            <input type="text" class="form-control" id="inputLast" aria-describedby="lastDesc" name="last" value="{{$phone_book->last}}" required>
            <div id="lastDesc" class="form-text">Please input your first name</div>
            @if($errors->has('last'))
                <div class="alert alert-danger">{{$errors->first('last')}}</div>
            @endif
        </div>
        <div class="mb-3">
            <label for="inputPhone" class="form-label">Phone#</label>
            <input type="tel" class="form-control @error('phone') is-invalid @enderror" id="inputPhone" aria-describedby="phoneDesc" name="phone" value="{{$phone_book->phone}}" required>
            <div id="phoneDesc" class="form-text">The format should be ###-###-####</div>
            @if($errors->has('phone'))
                <div class="alert alert-danger">{{$errors->first('phone')}}</div>
            @endif
        </div>
        <div class="mb-3">
            <label for="inputEmail" class="form-label">Email</label>
            <input type="email" class="form-control" id="inputEmail" aria-describedby="emailDesc" name="email" value="{{$phone_book->email}}" required>
            <div id="emailDesc" class="form-text">Please input your email</div>
            @if($errors->has('email'))
                <div class="alert alert-danger">{{$errors->first('email')}}</div>
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
