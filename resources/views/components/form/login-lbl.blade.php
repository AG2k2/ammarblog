@props(['inputName', 'value'])
<label for="{{ $inputName }}"
{{ $attributes-> merge(["class" => "block text-bgcolor text-base mb-1 mt-2"]) }}
>{{ $value }}</label>
