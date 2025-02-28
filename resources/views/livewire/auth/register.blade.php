<?php

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('components.layouts.auth')] class extends Component {
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        event(new Registered(($user = User::create($validated))));

        Auth::login($user);

        $this->redirect(route('dashboard', absolute: false), navigate: true);
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

        <!-- Password -->
        <flux:input wire:model="password" id="password" label="{{ __('Senha') }}" type="password" name="password"
            required autocomplete="new-password" placeholder="Insira a senha" />

        <!-- Confirm Password -->
        <flux:input wire:model="password_confirmation" id="password_confirmation" label="{{ __('Confirme a senha') }}"
            type="password" name="password_confirmation" required autocomplete="new-password"
            placeholder="Confirme a senha" />

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
