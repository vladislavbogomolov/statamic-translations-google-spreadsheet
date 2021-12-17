@extends('statamic::layout')
@section('title', Statamic::crumb(__('Updater!'), __('Utilities')))
@section('wrapper_class', 'max-w-full')

@section('content')
    <div class="flex items-center mb-3">
        <h1 class="flex-1">Translations from Google spreadsheet</h1>
    </div>

    <div class="max-w-lg mt-2 mx-auto">
        <form action="{{ cp_route('utilities.statamic-translations-google-spreadsheet.save')  }}" method="post">
            @csrf
            <div class="rounded p-3 lg:px-7 lg:py-5 shadow bg-white text-center">
                <header class="text-center mb-6">
                    <h1 class="mb-3">{{ __('Update translations') }}</h1>
                </header>

                @if(isset($result) && $result === true)
                    <div style="color: green;">Translations updated</div>
                @elseif(isset($result) && $result !== true)
                    <div style="color: red;">Translations have not been updated</div>
                @endif

            </div>

            <div class="flex justify-center mt-4">
                <button tabindex="4" class="btn-primary mx-auto btn-lg">
                    {{ __('Download')}}
                </button>
            </div>
        </form>
    </div>
@endsection

