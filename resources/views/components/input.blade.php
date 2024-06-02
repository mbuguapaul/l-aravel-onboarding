
<div>
    <div class="">
    <input type="{{ $type }}" class="my-input @error($name) is-invalid @enderror"  name="{{ $name }}" id="{{ $name }}"  {{ $attributes }}>
    @error($name)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
</div>
