@props(['name'])

<div class="input-group">
    <input id="{{$name}}" class="form-control @error($name) border border-danger is-invalid @enderror" {{ $attributes->merge(['placeholder'=> '', 'type'=>'text','value'=>old($name)]) }} name="{{$name}}" required>
</div>
@error($name)
        <span class="text-danger alert">{{ $message }}</span>
@enderror

