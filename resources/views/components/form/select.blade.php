

@props(['name'])

<div class="input-group1">
    <select class="form-control" {{ $attributes->merge(['placeholder'=> '', 'type'=>'text','value'=>old($name)]) }} name="{{$name}}" required>
        <option value="">-- Gender --</option>
        <option value="10">Male</option>
        <option value="20">Female</option>
    </select>
    <span class="input-group-addon">
        @if ($errors->has($name))
        <span class="text-danger">{{ $errors->first($name) }}</span>
        @endif
    </span>
</div>
