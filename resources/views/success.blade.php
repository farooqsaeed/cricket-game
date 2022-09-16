<div class="col-md-12">
    @if ($message = Session::get('success'))
     <div class="alert alert-success alert-block" id="success-alert">
     <button type="button" class="close" data-dismiss="alert">×</button> 
     <strong>{{ $message }}</strong>
     </div>
    @endif
 </div>