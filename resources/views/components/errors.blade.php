@if ($hasErrors($errors))
    <div {{ $attributes->merge(['class' => 'rounded-lg bg-red-50 p-4']) }}>
        <div class="flex items-center pb-3 border-b-2 border-red-200">
            <x-icon class="w-5 h-5 text-red-400 flex-shrink-0 mr-3" name="exclamation-circle" />

            <span class="text-sm font-semibold text-red-800">
                {{ str_replace('{errors}', $count($errors), $title) }}
            </span>
        </div>

        <div class="ml-5 pl-1 mt-2">
            <ul class="list-disc space-y-1 text-sm text-red-700">
                @foreach ($getErrorMessages($errors) as $message)
                    <li>{{ head($message) }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@else
    <div class="hidden"></div>
@endif

