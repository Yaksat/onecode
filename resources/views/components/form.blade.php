{{-- html формы могут принимать только GET или POST. Если нам надо передать другой метод, то делается с помощью
 специального скрытого поля _method --}}
@props(['method' => 'GET'])

@php($method = strtoupper($method))
@php($_method = in_array($method,['GET', 'POST']))

<form {{ $attributes }} method="{{ $_method ? $method : 'POST' }}">
    @unless($_method)
        {{-- <input type="hidden" name="_method" method="{{ $method }}"> Это аналогично @method($method)--}}
        @method($method)
    @endunless

    @if($method !== 'GET')
            @csrf
    @endif


    {{ $slot }}
</form>
