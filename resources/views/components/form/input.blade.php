
@props(['name', 'type' => 'text', 'value' => old($name) ])

<div class="w-full flex flex-col md:flex-row align-middle md:justify-between md:items-center md:gap-6">
    <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}" value="{{ $value }}" class="border-2 border-bgcolor bg-white text-lg rounded-full text-black w-full py-2 px-5 my-1 opacity-80">
</div>
