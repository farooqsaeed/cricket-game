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
                        <h2><strong>Add Questions
                        </strong> With options </h2>
                    </div>
                    
                    <div class="body">
                        <form action="{{URL('/questions/store')}}" method="post">
                    @csrf
                    <div class="row clearfix">
                            <div class="col-md-4">
                                <div class="form-group">
                                     <label>Question Type</label>
                                    <select class="form-control" name="type">
                                      <option>--Select--
                                      </option>
                                      <option>Default
                                      </option>
                                      <option>Match Specific
                                      </option>
                                      
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                     <label>Duration</label>
                                     <select class="form-control" name="timebound">
                                      <option disabled>--Select--
                                      </option>
                                      <option>00</option>
                                      <option>10</option>
                                      <option>20</option>
                                      <option>30</option>
                                      <option>40</option>
                                      <option>50</option>
                                      <option>60</option>
                                      <option>70</option>
                                      <option>80</option>
                                      <option>90</option>
                                      
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                     <label>Points</label>
                                     <select class="form-control" name="point_category_id">
                                      <option disabled>--Select--
                                      </option>
                                      <option value="1">Easy
                                      </option>
                                      <option value="2">Medium</option>
                                      <option value="3">Hard
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
                                     name="question" 
                                     >{{old('question') }}</textarea>
                                     @if ($errors->has('question'))
                                     <span class="text-danger">{{ $errors->first('question') }}</span>
                                     @endif
                                </div>
                                
                            </div>
                    </div>
                    <div class="row clearfix">
                            <div class="col-md-6">
                                <div class="form-group">
                                     <label>Option 01</label>
                                    <input type="text" class="form-control" name="option_1" value="{{ Request::old('option_1') }}">
                                    @if ($errors->has('option_1'))
                                     <span class="text-danger">{{ $errors->first('option_1') }}</span>
                                     @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                     <label>Option 02</label>
                                    <input type="text" class="form-control" name="option_2"
                                    value="{{ Request::old('option_2') }}">
                                    @if ($errors->has('option_2'))
                                     <span class="text-danger">{{ $errors->first('option_2') }}</span>
                                     @endif
                                </div>
                            </div>
                    </div>
                    <div class="row clearfix">
                            <div class="col-md-6">
                                <div class="form-group">
                                     <label>Option 03</label>
                                    <input type="text" class="form-control" name="option_3">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                     <label>Option 04</label>
                                    <input type="text" class="form-control" name="option_4">
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