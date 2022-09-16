@extends('layouts.app')

@section('title', 'Home')


@section('content')
<!-- Exportable Table -->
<div class="container">
<div class="row clearfix">
            @include('error')
            @include('success')
            
            <div class="col-lg-12">
                <div class="card">
                    <div class="col-lg-12 col-md-12 text-right">
                         <a class="btn btn-sm btn-success " href="{{ URL('questions/create') }}">
                         <i class="zmdi zmdi-plus-circle zmdi-hc-fw"></i> Questions</a>
                    </div>
                    <div class="header">
                        <h2><strong>Questions
                        </strong> With options </h2>
                    </div>
                    <div class="">
                    <div class="body">
                        <!-- Nav tabs -->
                    <ul class="nav nav-tabs">
                        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#active">Active</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#deactive">Inactive</a></li>
                        
                    </ul>                        
                    <!-- Tab panes -->
                    <div class="tab-content">
                        
                        <div role="tabpanel" class="tab-pane in active" id="active">
                        <div class="text-right">
                           <a href="#" class="btn btn-sn btn-warning changeStatus"
                           data-url="{{ URL('questions/change/bulk/status-inactive') }}">
                               inactive
                           </a> 
                        </div>
                         <b>Active Questions</b>
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable table-responsive
                        ">
                            <thead>
                                <tr>
                                    <th><input 
                                    type="checkbox"
                                    class="selectall"></th>
                                    <th>S.No</th>
                                    <th>Question</th>
                                    <th>Option 1</th>
                                    <th>Option 2</th>
                                    <th>Option 3</th>
                                    <th>Option 4</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($actives as $active)
                                <tr>
                                    <td>
                                    <input 
                                    type="checkbox"
                                    class="sub_chk form-control" data-id="{{$active->id}}">
                                    </td>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$active->Qn}}</td>
                                    <td>{{$active->option_1}}</td>
                                    <td>{{$active->option_2}}</td>
                                    <td>{{$active->option_3}}</td>
                                    <td>{{$active->option_4}}</td>
                                    <td>
                                        <a href="{{ URL('questions/edit') }}/{{$active->id}}" class="btn btn-success btn-sm"><i class="zmdi zmdi-edit"></i></a>
                                        <a onclick="return confirm('are you sure you want to delete this ?')"; href="{{ URL('questions/delete') }}/{{$active->id}}" class="btn btn-danagar btn-sm"><i class="zmdi zmdi-delete"></i></a>

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                            
                        </div>
                        <div role="tabpanel" class="tab-pane" id="deactive"> 
                        <div class="text-right">
                           <a href="#" class="btn btn-sn btn-warning changeStatus"
                           data-url="{{ URL('questions/change/bulk/status-active') }}">
                               active
                           </a> 
                        </div>
                        <b>Inactive Questions</b>
                        <table class="table table-bordered table-striped table-hover dataTable js-exportable table-responsive
                        ">
                        <thead>
                            <tr>
                                    <th>
                                    <input 
                                    type="checkbox"
                                    class="selectall">
                                    </th>
                                    <th>S.No</th>
                                    <th>Question</th>
                                    <th>Option 1</th>
                                    <th>Option 2</th>
                                    <th>Option 3</th>
                                    <th>Option 4</th>
                                    <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($inactives as $inactive)
                                <tr>
                                    <td>
                                    <input 
                                    type="checkbox"
                                    class="sub_chk form-control" data-id="{{$inactive->id}}">
                                    </td>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$inactive->Qn}}</td>
                                    <td>{{$inactive->option_1}}</td>
                                    <td>{{$inactive->option_2}}</td>
                                    <td>{{$inactive->option_3}}</td>
                                    <td>{{$inactive->option_4}}</td>
                                    <td>
                                        <a href="{{ URL('questions/edit') }}/{{$inactive->id}}" class="btn btn-success btn-sm"><i class="zmdi zmdi-edit"></i></a>
                                        <a onclick="return confirm('are you sure you want to delete this ?')"; href="{{ URL('questions/delete') }}/{{$inactive->id}}" class="btn btn-danagar btn-sm"><i class="zmdi zmdi-delete"></i></a>

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        </div>
                    </div>
                        
                    </div>
                  </div>
                </div>
            </div>
        </div>
</div>    
@endsection



                
                    
               