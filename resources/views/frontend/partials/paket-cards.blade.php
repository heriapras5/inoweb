{{-- Kartu paket harga - dipakai di section beranda & halaman /paket. Butuh variabel $packages. --}}
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
    @foreach($packages as $i => $package)
    @php $popular = !empty($package->badge); @endphp
    <div class="relative flex flex-col rounded-2xl p-7 transition-all duration-300 hover:-translate-y-1.5 {{ $popular ? 'bg-gradient-to-b from-blue-700 to-blue-900 text-white shadow-xl shadow-blue-600/30 ring-2 ring-blue-500 lg:scale-[1.03]' : 'bg-white border border-[#e2e8f0] shadow-sm hover:shadow-xl' }}"
         data-aos="fade-up" data-aos-delay="{{ $i * 60 }}">
        @if($popular)
        <span class="absolute -top-3.5 left-1/2 -translate-x-1/2 bg-white text-blue-700 text-[11px] font-bold tracking-wider uppercase px-4 py-1.5 rounded-full shadow-lg whitespace-nowrap">{{ $package->badge }}</span>
        @endif
        <h3 class="text-lg font-extrabold tracking-wide {{ $popular ? 'text-white' : 'text-[#0f172a]' }}">{{ $package->name }}</h3>
        @if($package->old_price)
        <div class="mt-1 mb-3">
            <p class="text-[1.375rem] leading-8 font-bold line-through decoration-2 text-red-600">{{ $package->old_price }}</p>
            <div class="mt-0.5 flex items-center gap-2 flex-wrap">
                <span class="text-2xl font-extrabold {{ $popular ? 'text-white' : 'text-blue-600' }}">{{ $package->price }}</span>
                <span class="inline-flex items-center bg-amber-400 text-[#78350f] text-[10px] font-extrabold tracking-wider uppercase px-2 py-0.5 rounded-full shrink-0">Promo</span>
            </div>
            @if($package->saving_text)
            <div class="mt-1.5">
                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-extrabold tracking-wide ring-1 {{ $popular ? 'bg-white/15 text-emerald-100 ring-white/25' : 'bg-emerald-50 text-emerald-700 ring-emerald-200' }}">
                    {{ $package->saving_text }}
                </span>
            </div>
            @endif
        </div>
        @else
        <p class="mt-1 {{ $package->saving_text ? 'mb-1.5' : 'mb-3' }} text-2xl font-extrabold {{ $popular ? 'text-white' : 'text-blue-600' }}">{{ $package->price }}</p>
        @if($package->saving_text)
        <div class="mb-3">
            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-extrabold tracking-wide ring-1 {{ $popular ? 'bg-white/15 text-emerald-100 ring-white/25' : 'bg-emerald-50 text-emerald-700 ring-emerald-200' }}">
                {{ $package->saving_text }}
            </span>
        </div>
        @endif
        @endif
        @if($package->tagline)
        <p class="text-sm leading-relaxed mb-5 {{ $popular ? 'text-white/80' : 'text-[#64748b]' }}">{{ $package->tagline }}</p>
        @endif
        @if(!empty($package->facilities))
        <ul class="space-y-2.5 text-left text-sm flex-1 mb-6">
            @foreach($package->facilities as $facility)
            <li class="flex items-start gap-2.5 {{ $popular ? 'text-white/90' : 'text-[#475569]' }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="{{ $popular ? '#ffffff' : '#2563eb' }}" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="mt-0.5 shrink-0"><polyline points="20 6 9 17 4 12"/></svg>
                <span>{{ $facility }}</span>
            </li>
            @endforeach
        </ul>
        @endif
        @if($package->renewal)
        <p class="text-xs mb-5 flex items-center gap-1.5 {{ $popular ? 'text-white/80' : 'text-gray-500' }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="shrink-0"><polyline points="23 4 23 10 17 10"/><path d="M20.49 15a9 9 0 1 1-2.12-9.36L23 10"/></svg>
            Perpanjangan: {{ $package->renewal }}
        </p>
        @endif
        @php
            $waMessage = 'Halo INOWEB, saya tertarik dengan paket ' . $package->name . ' (' . $package->price . ').';
            $waMessage .= "\nMohon info lebih lanjut. Terima kasih.";
        @endphp
        <a href="https://wa.me/{{ setting('whatsapp_number', '6285736186308') }}?text={{ urlencode($waMessage) }}" target="_blank" rel="noopener"
           class="mt-auto inline-flex items-center justify-center gap-2 px-6 py-3 rounded-full font-semibold text-sm no-underline transition-all {{ $popular ? 'bg-white text-blue-700 hover:bg-blue-50 hover:shadow-lg' : 'border-2 border-blue-600 text-blue-600 hover:bg-blue-600 hover:text-white' }}">
            Pilih {{ $package->name }}
        </a>
    </div>
    @endforeach
</div>
