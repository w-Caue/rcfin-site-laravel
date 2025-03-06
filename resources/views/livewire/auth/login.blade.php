<?php

use Illuminate\Auth\Events\Lockout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Volt\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

new #[Layout('components.layouts.auth')] class extends Component {
    // #[Validate('required|string|email')]
    public string $email = '';

    #[Validate('required|')]
    public string $cnpj = '';

    #[Validate('required|string')]
    public string $password = '';

    public bool $remember = false;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        $cnpj = preg_replace('/[^0-9]/', '', (string) $this->cnpj);

        $empresa = User::where('cnpj', $cnpj)->first();

        if (!$empresa) {
            return;
        }

        $senhaCorreta = Hash::check($this->password, $empresa->password);

        if (!$senhaCorreta) {
            return;
        }

        Auth::login($empresa, false);

        $this->redirectIntended(default: route('dashboard', absolute: false), navigate: true);
    }

    /**
     * Ensure the authentication request is not rate limited.
     */
    protected function ensureIsNotRateLimited(): void
    {
        if (!RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout(request()));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'email' => __('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Get the authentication rate limiting throttle key.
     */
    protected function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->email) . '|' . request()->ip());
    }
}; ?>

<div class="flex flex-col gap-6">
    <x-auth-header title="Entre na sua conta" description="Digite seu cnpj e senha abaixo para efetuar login" />

    <!-- Session Status -->
    <x-auth-session-status class="text-center" :status="session('status')" />

    <form wire:submit="login" class="flex flex-col gap-6">
        <!-- Cnpj -->
        <flux:input wire:model="cnpj" label="{{ __('Cnpj') }}" name="cnpj" required autofocus autocomplete="cnpj"
            placeholder="12.3456.678/0009-10"
            x-mask:dynamic="
            $input.startsWith('18') ? '99.999.999/9999-99' : '99.999.999/9999-99'
        " />

        <!-- Password -->
        <div class="relative">
            <flux:input wire:model="password" label="{{ __('Senha') }}" type="password" name="password" required
                autocomplete="current-password" placeholder="Insira a senha" />

            @if (Route::has('password.request'))
                <flux:link class="absolute right-0 top-0 text-sm" href="{{ route('password.request') }}" wire:navigate>
                    {{ __('Esqueceu sua senha?') }}
                </flux:link>
            @endif
        </div>

        <!-- Remember Me -->
        <flux:checkbox wire:model="remember" label="{{ __('Lembre-me') }}" />

        <div class="flex items-center justify-end">
            <flux:button variant="primary" type="submit" class="w-full">{{ __('Entrar') }}</flux:button>
        </div>
    </form>

    <div class="space-x-1 text-center text-sm text-zinc-600 dark:text-zinc-400">
        Não tem uma conta?
        <flux:link href="{{ route('register') }}" wire:navigate>Inscreva-se</flux:link>
    </div>
</div>
