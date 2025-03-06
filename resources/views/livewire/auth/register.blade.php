<?php

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('components.layouts.auth')] class extends Component {
    #[Validate('required|string')]
    public string $name = '';
    #[Validate('required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class)]
    public string $email = '';
    #[Validate('required', 'unique:' . User::class)]
    public string $cnpj = '';
    #[Validate('required')]
    public string $whatsapp = '';

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $cnpj = preg_replace('/[^0-9]/', '', (string) $this->cnpj);
        $whatsapp = preg_replace('/[^0-9]/', '', (string) $this->whatsapp);

        $new = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'cnpj' => $cnpj,
            'whatsapp' => $whatsapp,
            'password' => Hash::make(12345678),
        ]);

        if ($new->save()) {
            Auth::login($new);

            $this->redirect(route('dashboard', absolute: false), navigate: true);
        }

        // event(new Registered(($user = User::create($validated))));
    }
}; ?>

<div class="flex flex-col gap-6">
    <x-auth-header title="Crie uma conta" description="Insira seus dados abaixo para criar sua conta" />

    <!-- Session Status -->
    <x-auth-session-status class="text-center" :status="session('status')" />

    <form wire:submit="register" class="flex flex-col gap-6">
        <!-- Name -->
        <flux:input wire:model="name" id="name" label="{{ __('Nome') }}" type="text" name="name" required
            autofocus autocomplete="name" placeholder="Nome Completo" />

        <!-- Email Address -->
        <flux:input wire:model="email" id="email" label="{{ __('Email') }}" type="email" name="email" required
            autocomplete="email" placeholder="email@example.com" />

        <!-- Whatsapp -->
        <flux:input wire:model="whatsapp" label="{{ __('Whatsapp') }}" name="whatsapp" required autofocus
            autocomplete="whatsapp" placeholder="(12) 3 4567-8910"
            x-mask:dynamic="
            $input.startsWith('18') ? '(99) 9 9999-9999' : '(99) 9 9999-9999'
            " />

        <!-- Cnpj -->
        <flux:input wire:model="cnpj" label="{{ __('Cnpj') }}" name="cnpj" required autofocus autocomplete="cnpj"
            placeholder="12.3456.678/0009-10"
            x-mask:dynamic="
            $input.startsWith('18') ? '99.999.999/9999-99' : '99.999.999/9999-99'
        " />

        <div class="flex items-center justify-end">
            <flux:button type="submit" variant="primary" class="w-full">
                {{ __('Criar Conta') }}
            </flux:button>
        </div>
    </form>

    <div class="space-x-1 text-center text-sm text-zinc-600 dark:text-zinc-400">
        Já tem uma conta?
        <flux:link href="{{ route('login') }}" wire:navigate>Entrar</flux:link>
    </div>
</div>
