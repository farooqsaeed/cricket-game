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
                        </strong> challenge </h2>
                    </div>
                    
                    <div class="body">
                    <form action="{{ URL('/challenge/update') }}/{{$challenge->id}}" method="post">
                    @csrf
                    <div class="row clearfix">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Overs</label>
                                    <input type="number" class="form-control" name="overs"
                                    value="{{ $challenge->overs }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Runs</label>
                                    <input type="number" class="form-control" name="runs"
                                    value="{{ $challenge->runs }}">
                                </div>
                            </div>

                    </div>
                    
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary btn-round waves-effect">UPDATE</button>
                    </div>
                  
                </form>
             </div>
            </div>
        </div>

        <div class="col-lg-2"></div>
    </div>
</div>    
@endsection