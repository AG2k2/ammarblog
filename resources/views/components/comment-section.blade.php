@props(['post'])

<section {{ $attributes->merge(['class' => 'text-white p-5']) }}>
@auth
    <div class="flex w-full gap-4 p-5 bg-cyan-950/80 rounded-xl mb-7">
        <img src="{{ asset('storage/' . auth()->user()->pro_pic) }}" alt="user profile pic" class="flex-shrink-0 object-cover w-10 h-10 rounded-full">
        <form action="/posts/{{ $post->slug }}/comments" class="flex flex-col w-full" method="POST">
            @csrf
            <textarea name="body" id="comment" cols="30" rows="auto" class="w-full p-2 text-black bg-gray-200 rounded-md resize-none focus:ring ring-bgcolor" placeholder="أخبرنا برأيك:" required></textarea>
            <div class="flex justify-end w-full px-5 mt-5">
                <button type="submit" id="publish" name="publish" class="px-6 py-2 bg-cyan-400 rounded-xl hover:bg-cyan-500 text-bgcolor shadow-around-sm">نشر</button>
            </div>
        </form>
    </div>
@endauth

@include('components.form._comments')

</section>
