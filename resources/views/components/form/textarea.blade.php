@props(['name','value'=>''])

<div class="input-group">
    <textarea id="{{$name}}"  class="form-control" {{ $attributes->merge(['placeholder'=> '', 'type'=>'text','value'=>old($name)]) }} name="{{$name}}" rows="5" required>{{$value}}</textarea>
    <span class="input-group-addon">
        @if ($errors->has($name))
        <span class="text-danger">{{ $errors->first($name) }}</span>
        @endif
    </span>
</div>
