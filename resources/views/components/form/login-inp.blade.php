@props(['type' => 'text', 'name', 'value' => null ])
<input
type="{{ $type }}"
name="{{ $name }}"
value="{{ $value }}"
{{ $attributes -> merge(["class" => "w-full rounded-xl h-10 py-3 px-4 border border-black opacity-90"]) }}
>
