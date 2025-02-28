<?php

use Illuminate\Support\Facades\Password;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('components.layouts.auth')] class extends Component {
    public string $email = '';

    /**
     * Send a password reset link to the provided email address.
     */
    public function sendPasswordResetLink(): void
    {
        $this->validate([
            'email' => ['required', 'string', 'email'],
        ]);

        Password::sendResetLink($this->only('email'));

        session()->flash('status', __('A reset link will be sent if the account exists.'));
    }
}; ?>

<div class="flex flex-col gap-6">
    <x-auth-header title="Esqueceu sua senha"
        description="Insira seu e-mail para receber um link para redefinir sua senha" />

    <!-- Session Status -->
    <x-auth-session-status class="text-center" :status="session('status')" />

    <form wire:submit="sendPasswordResetLink" class="flex flex-col gap-6">
        <!-- Email Address -->
        <flux:input wire:model="email" label="{{ __('Email') }}" type="email" name="email" required autofocus
            placeholder="email@example.com" />

        <flux:button variant="primary" type="submit" class="w-full">{{ __('Enviar') }}
        </flux:button>
    </form>

    <div class="space-x-1 text-center text-sm text-zinc-400">
        Ou, volte para
        <flux:link href="{{ route('login') }}" wire:navigate>Entrar</flux:link>
    </div>
</div>
