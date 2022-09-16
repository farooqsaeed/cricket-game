@extends('layouts.app')

@section('title', 'Home')


@section('content')
<!-- Exportable Table -->
<div class="container">
<div class="row clearfix">
            @include('error')
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <div class="card">
                    
                    <div class="header">
                        <h2><strong>Update
                        </strong> Question</h2>
                    </div>
                    
                    <div class="body">
                        <form action="{{URL('/questions/update')}}" method="post">
                    @csrf
                    <div class="row clearfix">
                      <input type="hidden" name="id" value="{{$question->id}}">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Question Type</label>
                                    <select class="form-control" name="type">
                                      <option
                                      <?=$question->timebound == 'Default' ? ' selected="selected"' : '';?>
                                      >Default
                                      </option>
                                      <option
                                      <?=$question->timebound == 'Match Specific' ? ' selected="selected"' : '';?>
                                      >Match Specific
                                      </option>
                                      
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                     <label>Duration</label>
                                     <select class="form-control" name="timebound">
                                      <option 
                                      <?=$question->timebound == '0' ? ' selected="selected"' : '';?>
                                      >00</option>
                                      <option
                                      <?=$question->timebound == '10' ? ' selected="selected"' : '';?>
                                      >10</option>
                                      <option
                                      <?=$question->timebound == '20' ? ' selected="selected"' : '';?>
                                      >20</option>
                                      <option
                                      <?=$question->timebound == '30' ? ' selected="selected"' : '';?>
                                      >30</option>
                                      <option
                                      <?=$question->timebound == '40' ? ' selected="selected"' : '';?>
                                      >40</option>
                                      <option
                                      <?=$question->timebound == '50' ? ' selected="selected"' : '';?>
                                      >50</option>
                                      <option
                                      <?=$question->timebound == '60' ? ' selected="selected"' : '';?>
                                      >60</option>
                                      <option
                                      <?=$question->timebound == '70' ? ' selected="selected"' : '';?>
                                      >70</option>
                                      <option
                                      <?=$question->timebound == '80' ? ' selected="selected"' : '';?>
                                      >80</option>
                                      <option
                                      <?=$question->timebound == '90' ? ' selected="selected"' : '';?>
                                      >90</option>
                                      
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                     <label>Points</label>
                                     <select class="form-control" name="point_category_id">
                                      <option disabled>--Select--
                                      </option>
                                      <option value="1" <?=$question->point_category_id == '1' ? ' selected="selected"' : '';?> >Easy
                                      </option>
                                      <option value="2"
                                      <?=$question->point_category_id == '3' ? ' selected="selected"' : '';?> >Medium</option>
                                      <option value="3"
                                      <?=$question->point_category_id == '3' ? ' selected="selected"' : '';?>>Hard
                                      </option>
                                    </select>
                                </div>
                            </div>

                    </div>
                    <div class="row clearfix">
                            <div class="col-md-12">
                                <div class="form-group">
                                     <label>Question</label>
                                     <textarea 
                                     class="form-control" 
                                     name="Qn" 
                                     >{{$question->Qn}}</textarea>
                                </div>
                            </div>
                    </div>
                    <div class="row clearfix">
                            <div class="col-md-6">
                                <div class="form-group">
                                     <label>Option 01</label>
                                    <input type="text" class="form-control" name="option_1"
                                    value="{{$question->option_1}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                     <label>Option 02</label>
                                    <input type="text" class="form-control" name="option_2"
                                    value="{{$question->option_2}}">
                                </div>
                            </div>
                    </div>
                    <div class="row clearfix">
                            <div class="col-md-6">
                                <div class="form-group">
                                     <label>Option 03</label>
                                    <input type="text" class="form-control" name="option_3"
                                    value="{{$question->option_3}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                     <label>Option 04</label>
                                    <input type="text" class="form-control" name="option_4"
                                    value="{{$question->option_4}}">
                                </div>
                            </div>
                    </div>

                    <div class="text-right">
                        <button type="submit" class="btn btn-primary btn-round waves-effect">SAVE</button>
                    </div>
                  
                </form>
             </div>
            </div>
        </div>

        <div class="col-lg-2"></div>
    </div>
</div>    
@endsection