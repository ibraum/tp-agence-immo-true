@extends('navbar.navbar')

@section('content')
<div class="options-div" style="margin-bottom: 292px">
  <div class="create-option">
    <a href="{{route('admin.options.create')}}" class="btn-normal btn-warning border border-dark" style="text-decoration: none;">add option</a>
  </div>
  <div class="option-div-body">
  <table class="option-table">
  <thead>
    <tr>
      <th>#ITERATION</th>
      <th>#ID</th>
      <th>Name</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
  @forelse($options as $option)
        @if(($loop->iteration) % 2 == 0)
        <tr style="background-color: #c9d8dd66;">
            <td>{{$loop->iteration}}</td>
            <td>{{$option->id}}</td>
            <td>{{$option->name}}</td>
            <td class="actions">
                <form action="{{route('admin.options.destroy', $option->id)}}" method="post" class="w-100 d-flex align-items-center justify-content-between">
                    @csrf
                    @method("DELETE")
                    <a href="{{route('admin.options.edit', $option->id)}}" class="btn-form btn-form-edit">edit</a>
                    <a href="{{route('admin.options.show', $option->id)}}" class="btn-form btn-form-show">show</a>
                    <button type="submit" class="btn-form btn-form-delete">delete</button>
                </form>
            </td>
        </tr>
        @else
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$option->id}}</td>
            <td>{{$option->name}}</td>
            <td class="actions">
                <form action="{{route('admin.options.destroy', $option->id)}}" method="post" class="w-100 d-flex align-items-center justify-content-between">
                    @csrf
                    @method("DELETE")
                    <a href="{{route('admin.options.edit', $option->id)}}" class="btn-form btn-form-edit">edit</a>
                    <a href="{{route('admin.options.show', $option->id)}}" class="btn-form btn-form-show">show</a>
                    <button type="submit" class="btn-form btn-form-delete">delete</button>
                </form>
            </td>
        </tr>
        @endif
        
    @empty
        <tr class="container">
            <th colspan="4" class="" style="color: red; font-weight: lighter;">Aucune option enregistrée ... </th>
        </tr>
    @endforelse
  </tbody>
</table>
  </div>
</div>
@endsection
