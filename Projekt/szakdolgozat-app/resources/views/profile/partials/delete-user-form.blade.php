@extends('layouts.app')
@section('delete-user-form')
<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profil törlése') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('
            Amint a fiókodat törlöd, az összes adatod véglegesen törlésre fog majd kerülni. Mielőtt törölnéd a fiókodat, kérjük, töltsd le azokat az adatokat vagy információkat, amelyeket meg szeretnél őrizni.') }}
        </p>
    </header>

    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
    >{{ __('Profil törlése') }}</x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Biztos törölni szeretnéd a profilodat?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('Miután a fiókod törlésre kerül, az összes adata véglegesen törlődik. Kérjük, add meg a jelszavadat annak megerősítéséhez, hogy véglegesen törölni szeretnéd a fiókodat.') }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Jelszó') }}" class="sr-only" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-3/4"
                    placeholder="{{ __('Jelszó') }}"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Mégse') }}
                </x-secondary-button>

                <x-danger-button class="ml-3">
                    {{ __('Profil törlése') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
@endsection
