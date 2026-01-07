<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center px-[60px] py-[18px] bg-[#D1D5DB] text-[#6B7280] text-xl hover:text-[#1E293B] border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest  active:bg-[#74767B] active:text-[#FFFFFF] focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 ']) }}>
    <a href="{{route('dashboard')}}">
        {{ $slot }}
    </a>
</button>