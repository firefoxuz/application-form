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
            <div class="col-md-6">
                <h6 class="header-title pl-3 redial-relative">Form Applications</h6>
            </div>
            <div class="col-md-6 text-right">
                <a class="btn btn-outline-primary" data-toggle="modal" data-target="#largemodel">Create new form</a>
            </div>
            <table class="table table-hover mb-0 redial-font-weight-500 table-responsive d-md-table">
                <thead class="redial-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Theme</th>
                    <th scope="col">Message</th>
                    <th scope="col">File</th>
                    <th scope="col">Status</th>
                    <th scope="col">Created At</th>
                </tr>
                </thead>
                <tbody>
                @foreach($forms as $form)
                    <tr class="{{$form->status->label =='waiting' ? 'bg-warning' : 'bg-success'}}">
                        <th scope="row">{{$form->id}}</th>
                        <td>{{$form->theme}}</td>
                        <td>{{$form->message}}</td>
                        <td>
                            <a href="{{$form->file_path}}">Document</a>
                        </td>
                        <td>{{$form->status->label}}</td>
                        <td>{{$form->created_at}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- Large Demo Modal -->
    <div class="modal fade" id="largemodel" tabindex="-1" role="dialog" aria-labelledby="largemodel" aria-hidden="true">
        <div class="modal-dialog  modal-lg" role="document">
            <div class="modal-content redial-border-light">
                <div class="modal-header redial-border-light">
                    <h5 class="modal-title pt-2" id="exampleModalLabel">Form</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="sendForm" action="{{route('store')}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label class="redial-font-weight-600">Theme</label>
                            <input type="text" class="form-control" placeholder="Enter theme (required)" name="theme"/>
                        </div>
                        <div class="form-group">
                            <label class="redial-font-weight-600">Message</label>
                            <textarea class="form-control" placeholder="Enter message (required)"
                                      name="message"></textarea>
                        </div>
                        <div class="form-group">
                            <label class="redial-font-weight-600 d-block">Attach document</label>
                            <input type="file" name="document"/>
                        </div>
                    </form>
                </div>
                <div class="modal-footer redial-border-light">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" form="sendForm" class="btn btn-primary">Send</button>
                </div>
            </div>
        </div>
    </div>
    <!--End Large Demo Modal -->
@endsection
