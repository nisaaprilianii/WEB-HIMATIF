{{-- Flash message status + daftar error validasi. Taruh sekali di atas form. --}}
@php($status = session('status'))

@if ($status)
    <div role="status" {{ $attributes->class('mb-6 flex items-start gap-3 rounded-xl border border-emerald-200 bg-emerald-50 p-4 text-sm text-emerald-800') }}>
        <x-ui.icon name="check-circle" class="mt-0.5 size-5 text-emerald-600" />
        <p class="font-medium">{{ $status }}</p>
    </div>
@endif

@if ($errors->any())
    <div role="alert" {{ $attributes->class('mb-6 flex items-start gap-3 rounded-xl border border-red-200 bg-red-50 p-4 text-sm text-red-800') }}>
        <x-ui.icon name="exclamation-circle" class="mt-0.5 size-5 text-red-600" />
        <div>
            <p class="mb-1 font-semibold">Mohon periksa kembali isian formulir:</p>
            <ul class="list-inside list-disc space-y-0.5 text-xs">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif
