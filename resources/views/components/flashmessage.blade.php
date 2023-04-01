@if(session()->has('message'))
    <div style="color: orange">
        {{ session('message')}}
    </div>
@endif
