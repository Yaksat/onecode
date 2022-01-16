@if($alert = session()->pull('alert'))
    <div class="alert alert-{{ session()->pull('alertClass') }} mb-0 rounded-0 text-center small py-2">
        {{ $alert }}
    </div>
@endif
