@extends('layout')

@section('title','บทความทั้งหมด')
    
@section('content')
<h2 class="text-center py-2" >บทความ</h2>
<table class="table table-bordered text-center">
  <thead>
    <tr>
      <th scope="col">title</th>
      {{-- <th scope="col">Content</th> --}}
      <th scope="col">Content</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>

    </tr>
  </thead>
  <tbody>
     @foreach($blogs as $item)
    <tr>
      <td>{{$item ->title}}</td>
      {{-- <td>{{ Str::limit ($item ->content , 20)}}</td> --}}
      <td>
         @if ($item -> status )
         <a href="{{route('change', $item->id)}}"><span class="btn btn-success">สถานะ : เผยแพร่</span> </a>
          @else
          <a href="{{route('change', $item->id)}}"><span class="btn btn-danger">สถานะ : ไม่เผยแพร่</span> </a>
          @endif  
      </td>
      <td>
        <a href="{{route('edit', $item->id)}}"><span class="btn btn-warning">แก้ไข</span> </a>
      </td>
      <td>
        <a href = "{{route('delete', $item->id)}}" class="btn btn-danger"
           onclick="return confirm('คุณต้องการลบบทความนี้ {{ $item ->title }} จริงหรือไม่?')">ลบ</a></td>
    </tr> 
    @endforeach

@endsection