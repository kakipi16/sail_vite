<button {{ $attributes->merge(['type' => 'submit', 'id' => 'submit' , 'class' => 'px-12 py-4 overflow-hidden group bg-btn relative hover:bg-gradient-to-r hover:bg-btn-hover rounded-full hover:bg-btn-hover text-gl text-main hover:ring-2 hover:ring-offset-2 hover:bg-btn-hover transition-all ease-out duration-300']) }}>
    <span class="absolute right-0 w-8 h-32 -mt-12 transition-all duration-1000 transform translate-x-12 bg-main opacity-40 rotate-12 group-hover:-translate-x-60 ease"></span>
    <span class="relative">{{ $slot }}</span>
</button>