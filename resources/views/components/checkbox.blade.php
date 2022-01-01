<div class="form-check">
    <input type="checkbox" {{ $attributes->merge([
        'value' => 1,
        'checked' => !! old($attributes->get('name')),
    ]) }} class="form-check-input" id="remember">

    <label class="form-check-label" for="remember">
        {{ $slot }}
    </label>
</div>
