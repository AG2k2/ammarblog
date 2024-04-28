@props(['name', 'row' => 10])

<div>
    <textarea name="{{ $name }}" id="{{ $name }}"
    cols="30" rows="{{ $row }}"
    class="w-full border-2 border-black rounded-lg py-2 px-4 resize-none"
    >{{ old($name) }}</textarea>
</div>
