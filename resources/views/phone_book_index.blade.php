@extends('layout')

@section('content')
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Action</th>
            <th>Last</th>
            <th>First</th>
            <th>Phone</th>
            <th>Email</th>
        </tr>
        </thead>
        <tbody>
        @foreach($phone_books as $p)
            <tr>
                <td>
                    <form action="{{route('phone_book.destroy', $p->id)}}" method="post" class="d-inline">
                        {{ method_field('DELETE') }}
                        @csrf
                        <a href="javascript:void(0)" onclick='this.parentNode.submit(); return false;'>[DEL]</a>
                    </form>
                    <a href="{{route('phone_book.edit', $p->id)}}" target="_self">[EDIT]</a>
                </td>
                <td>{{$p->last}}</td>
                <td>{{$p->first}}</td>
                <td>{{$p->phone}}</td>
                <td>{{$p->email}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <a href="{{route('phone_book.create')}}" class="float-end btn btn-outline-secondary">Add New</a>
@endsection

@section ('footer')
    <script type="text/javascript">
        $(document).ready(function(){
            $(".alert").slideDown(300).delay(2000).slideUp(300);
        });
    </script>
@endsection
