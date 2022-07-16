@extends('layouts.main')
@section('content')
    <div class="card redial-border-light redial-shadow mb-4" style="margin-top: 40px">
        <div class="col-md-12">
            @if($errors->any())
                <div class="alert alert-danger" role="alert">
                    {{$errors->first()}}
                </div>
            @endif
        </div>
        <div class="card-body">
            <h6 class="header-title pl-3 redial-relative">Form Applications</h6>
            <table class="table table-hover mb-0 redial-font-weight-500 table-responsive d-md-table">
                <thead class="redial-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Theme</th>
                    <th scope="col">Message</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">File</th>
                    <th scope="col">Status</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($forms as $form)
                    <tr class="{{$form->status->label =='waiting' ? 'bg-warning' : 'bg-success'}}">
                        <th scope="row">{{$form->id}}</th>
                        <td>{{$form->theme}}</td>
                        <td>{{$form->message}}</td>
                        <td>{{$form->user->name}}</td>
                        <td>{{$form->user->email}}</td>
                        <td>
                            <a href="{{$form->file_path}}">Document</a>
                        </td>
                        <td>{{$form->status->label}}</td>
                        <td>{{$form->created_at}}</td>
                        <td>
                            @if($form->status->label =='waiting')

                                <form action="{{route('form.update-status',['form'=>$form->id])}}" method="post">
                                    @csrf
                                    {{method_field('PUT')}}
                                    <button type="submit" class="btn btn-primary">Answered</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
