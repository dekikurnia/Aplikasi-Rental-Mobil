@if (session()->has('flash_notification.message'))
 <div class="row">
        <div class="col-md-12">
            <div class="col-md-12">
    			<div class="alert alert-{{ session('flash_notification.level') }}">
    			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    			{!! session('flash_notification.message') !!}
    			</div>
       	 	</div>
        </div>
    </div>
@endif