<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create New Message') }}
        </h2>
    </x-slot>
    {{-- Errors --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="container">
                <div class="row justify-content-md-center">
                    <div class="col-md-4 cart bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <!-- Session Status -->
                        <x-auth-session-status class="mb-4" :status="session('status')" />
                        <!-- Validation Errors -->
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />
                        <form method="POST" action="{{ route('store') }}">
                            @csrf
                            <!-- Title -->
                            <div>
                                <x-label for="title" :value="__('Title')" />
                                <x-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus />
                            </div>
                            <!-- Message -->
                            <div>
                                <x-label for="message" :value="__('Message')" />
                                <x-input id="message" class="block mt-1 w-full" type="text" name="message" :value="old('message')" required autofocus />
                            </div>
                            <!-- Title -->
                            <div>
                                <x-label for="email" :value="__('Email отправителя')" />
                                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                            </div>

                            <div class="text-center m-3">
                                <x-button class="ml-3">
                                    {{ __('Send') }}
                                </x-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
