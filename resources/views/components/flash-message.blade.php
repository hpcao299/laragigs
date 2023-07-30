@if (session()->has('message'))
    <div class="fixed transform top-1 left-1/2 -translate-x-1/2 bg-laravel text-white px-48 py-3">
        <p>
            {{session('message')}}
        </p>
    </div>
@endif