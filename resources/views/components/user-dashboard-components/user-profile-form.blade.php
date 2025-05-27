<!-- Profile Section -->
<div data-aos="zoom-in" class="bg-[#f8d5b0] w-full md:w-2/3 p-8 rounded-xl shadow-md min-h-[550px] flex flex-col justify-center">
    <div>
        <h1 class="text-3xl font-bold text-[#db571b] mb-8 text-left">Profile</h1>
<form action="{{ route('profile.update') }}" method="POST" class="space-y-6">
    @csrf
    @method('PUT')

    <input type="text" name="name" value="{{ old('name', auth()->user()->name) }}" placeholder="Name"
        class="w-full border-2 border-[#db571b] px-4 py-3 rounded-md bg-white placeholder-gray-400 focus:outline-none" required />

    <input type="email" name="email" value="{{ old('email', auth()->user()->email) }}" placeholder="Email"
        class="w-full border-2 border-[#db571b] px-4 py-3 rounded-md bg-white placeholder-gray-400 focus:outline-none" required />

    <div class="text-left">
        <button type="submit" class="bg-[#db571b] cursor-pointer text-white font-semibold px-6 py-3 rounded-md hover:bg-orange-700">
            Mettre à jour
        </button>
    </div>
</form>

    </div>
</div>


<!-- Password Update Section -->
<form action="{{ route('password.update') }}" method="POST" class="space-y-6 mt-10">
    @csrf
    @method('PUT')

    <input type="password" name="current_password" placeholder="Mot de passe actuel"
        class="w-full border-2 border-[#db571b] px-4 py-3 rounded-md bg-white placeholder-gray-400 focus:outline-none" required />

    <input type="password" name="new_password" placeholder="Nouveau mot de passe"
        class="w-full border-2 border-[#db571b] px-4 py-3 rounded-md bg-white placeholder-gray-400 focus:outline-none" required />

    <input type="password" name="new_password_confirmation" placeholder="Confirmer le mot de passe"
        class="w-full border-2 border-[#db571b] px-4 py-3 rounded-md bg-white placeholder-gray-400 focus:outline-none" required />

    <div class="text-left">
        <button type="submit"
            class="bg-[#db571b] cursor-pointer text-white font-semibold px-6 py-3 rounded-md hover:bg-orange-700">
            Mettre à jour le mot de passe
        </button>
    </div>
</form>
