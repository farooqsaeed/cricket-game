@extends('layouts.app')

@section('title', 'Home')


@section('content')
<!-- Exportable Table -->
<div class="container">
<div class="row clearfix">
           <!-- winners -->
           @include('success')
        <div class="col-lg-12">
            <div class="card">

                <div class="body">
                    <strong>Today Winners</strong>
                    @if(count($winners)!==0)
                    <div class="row align-center">
                        <div class="col-3"></div>

                        @if(array_key_exists(1,$winners))
                        <div class="col-2">
                            <p><strong>2nd</strong></p>
                            <img src="{{ URL::asset($winners[1]['profile_image']) }}" alt="logo" width="65" height="65" style=" border-radius: 50%;">
                            <p class="mt-1">
                                <strong>{{$winners[1]['name']}}</strong><br>
                                <span>{{$winners[1]['city']}}</span>
                            </p> 
                        </div>
                        @endif
                        
                        @if(array_key_exists(0,$winners))
                        <div class="col-2">
                            <p><strong>1st</strong></p>
                            <img src="{{ URL::asset($winners[0]['profile_image']) }}" alt="logo" width="110" height="110" style=" border-radius: 50%;">
                           <p class="mt-1">
                                <strong>{{$winners[0]['name']}}</strong><br>
                                <span>{{$winners[0]['city']}}</span>
                            </p>
                            
                        </div>
                        @endif

                        @if(array_key_exists(2,$winners))
                        <div class="col-2">
                            <p><strong>3rd</strong></p>
                            <img src="{{ URL::asset($winners[2]->profile_image) }}" alt="logo" width="65" height="65" style=" border-radius: 50%;">
                            <p>
                                <strong>{{$winners[2]['name']}}</strong><br>
                                <span>{{$winners[2]['city']}}</span>
                            </p>
                             
                        </div>
                        @endif

                        <div class="col-3"></div>
                    </div>
                    @else
                    <div class="col-lg-12 align-center">
                        <strong>You can see top 3 after this match.</strong>
                    </div>
                    @endif

                </div> 
            </div>
            
        </div>
         <!-- responded answers -->
            <div class="col-lg-12">
                <div class="card">
                    <div class="body">
                        <table class="table table-bordered table-striped table-hover dataTable js-exportable table-responsive 
                        ">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Question</th>
                                    <th>Option 1</th>
                                    <th>Option 2</th>
                                    <th>Option 3</th>
                                    <th>Option 4</th>
                                    <th>User Response</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach($result as $item)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$item->Qn}}</td>
                                    <td>{{$item->option_1}}</td>
                                    <td>{{$item->option_2}}</td>
                                    <td>{{$item->option_3}}</td>
                                    <td>{{$item->option_4}}</td>
                                    <td>{{$item->answers_count}}</td>
                                    <td>
                                      <button onclick="getUserId('<?php echo $item->id ?>')" data-toggle="modal" data-target="#correctanswer" class="btn btn-success btn-sm"><i class="zmdi zmdi-plus-circle zmdi-hc-fw"></i> correct answer</button>
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
@endsection