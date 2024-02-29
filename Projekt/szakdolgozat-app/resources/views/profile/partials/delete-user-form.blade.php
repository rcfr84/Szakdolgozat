@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-8">
        <div class="flex justify-center">
            <div class="w-full max-w-2xl">
                @include('statusAndError')
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <header>
                        <h2 class="text-2xl font-medium text-gray-900">
                            {{ __('Profil törlése') }}
                        </h2>

                        <p class="mt-2 text-sm text-gray-600">
                            {{ __('Amint a fiókodat törlöd, az összes adatod véglegesen törlésre fog majd kerülni. Mielőtt törölnéd a fiókodat, kérjük, töltsd le azokat az adatokat vagy információkat, amelyeket meg szeretnél őrizni.') }}
                        </p>
                    </header>

                    <x-danger-button
                        x-data=""
                        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
                    >
                        {{ __('Profil törlése') }}
                    </x-danger-button>

                    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
                        <form method="post" action="{{ route('profile.destroy') }}" class="mt-6 mr-4 ml-4">
                            @csrf
                            @method('delete')

                            <h2 class="text-lg font-medium text-gray-900">
                                {{ __('Biztos törölni szeretnéd a profilodat?') }}
                            </h2>

                            <p class="mt-1 text-sm text-gray-600">
                                {{ __('Miután a fiókod törlésre kerül, az összes adata véglegesen törlődik. Kérjük, add meg a jelszavadat annak megerősítéséhez, hogy véglegesen törölni szeretnéd a fiókodat.') }}
                            </p>

                            <x-input-label for="password" value="{{ __('Jelszó') }}" class="sr-only" />

                            <x-text-input
                                id="password"
                                name="password"
                                type="password"
                                class="mt-1 block w-full"
                                placeholder="{{ __('Jelszó') }}"
                                required
                            />

                            <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2"/>

                            <div class="mt-6 flex justify-end mr-4 mb-4">
                                <x-secondary-button x-on:click="$dispatch('close')">
                                    {{ __('Mégse') }}
                                </x-secondary-button>

                                <x-danger-button class="ml-3">
                                    {{ __('Profil törlése') }}
                                </x-danger-button>
                            </div>
                        </form>
                    </x-modal>
                </div>
            </div>
        </div>
    </div>
@endsection
