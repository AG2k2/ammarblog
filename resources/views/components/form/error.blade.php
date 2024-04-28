@props(['name'])
@error($name)
    <p class="w-full text-red-500 text-base py-1 px-3">* {{ $message }}</p>
@enderror
