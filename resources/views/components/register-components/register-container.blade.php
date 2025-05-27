<div class="relative z-10 flex justify-center items-center w-full h-full bg-[rgba(237,132,56,0.6)] backdrop-blur-sm">
    <div class="bg-[#ea7025] text-white rounded-xl p-8 w-full max-w-md shadow-lg border border-white/10 mx-4">
        <h1 class="text-3xl font-bold text-center mb-2">Inscription</h1>
        <p class="text-center text-gray-200 text-sm mb-6">Créez votre compte maintenant.</p>

        <form method="POST" action="{{route('register')}}" class="space-y-5">
            @csrf

            <!-- Name -->
            <div>
                <label for="name" class="block text-sm font-medium mb-1">Nom complet</label>
                <input id="name" name="name" type="text" value="{{ old('name') }}" required autofocus
                    class="w-full bg-white px-4 py-2 text-gray-800 rounded-md placeholder-gray-400 outline-none @error('name') border border-red-500 @enderror"
                    placeholder="Votre nom" />
                @error('name')
                    <p class="text-red-400 text-xs italic mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium mb-1">E-mail</label>
                <div class="relative">
                    <input id="email" name="email" type="email" value="{{ old('email') }}" required
                        class="w-full px-4 bg-white py-2 text-gray-800 rounded-md placeholder-gray-400 outline-none @error('email') border border-red-500 @enderror"
                        placeholder="exemple@mail.com" />
                    <div class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5.121 17.804A9 9 0 0112 15a9 9 0 016.879 2.804M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                </div>
                @error('email')
                    <p class="text-red-400 text-xs italic mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block text-sm font-medium mb-1">Mot de passe</label>
                <div class="relative">
                    <input id="password" name="password" type="password" required
                        class="w-full px-4 py-2 bg-white text-gray-800 rounded-md placeholder-gray-400 outline-none @error('password') border border-red-500 @enderror"
                        placeholder="Mot de passe" />
                    <button type="button" onclick="togglePassword()"
                        class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-500">
                        <svg id="eye-icon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 cursor-pointer" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                    </button>
                </div>
                @error('password')
                    <p class="text-red-400 text-xs italic mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div>
                <label for="password_confirmation" class="block text-sm font-medium mb-1">Confirmer le mot de passe</label>
                <input id="password_confirmation" name="password_confirmation" type="password" required
                    class="w-full px-4 py-2 bg-white text-gray-800 rounded-md placeholder-gray-400 outline-none"
                    placeholder="Confirmez le mot de passe" />
            </div>

            <!-- Submit -->
            <button type="submit"
                class="w-full bg-[#91341b] cursor-pointer hover:opacity-90 transition-colors duration-300 text-white font-semibold py-2 rounded-md shadow-md">
                S'inscrire
            </button>

            <p class="text-center text-sm mt-4 text-gray-300">
                Vous avez déjà un compte ?
                <a href="{{ route('login') }}" class="text-[#91341b] font-semibold hover:underline">Connectez-vous ici</a>
            </p>
        </form>
    </div>
</div>

<script>
function togglePassword() {
    const input = document.getElementById('password');
    const icon = document.getElementById('eye-icon');
    const isHidden = input.type === 'password';

    input.type = isHidden ? 'text' : 'password';

    icon.innerHTML = isHidden
        ? `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a9.964 9.964 0 012.265-3.568M6.12 6.12A9.952 9.952 0 0112 5c4.477 0 8.267 2.943 9.541 7a9.953 9.953 0 01-1.276 2.063M15 12a3 3 0 11-6 0 3 3 0 016 0zM3 3l18 18"/>`
        : `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />`;
}
</script>
