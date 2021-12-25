<input type="hidden" {{ $attributes }} id="{{ $name }}">
<trix-editor input="content"></trix-editor>

@once
    @push('css')
        <link rel="stylesheet" type="text/css" href="/css/trix.css">
    @endpush

    @push('js')
        <script src="/js/trix.js"></script>
    @endpush
@endonce
