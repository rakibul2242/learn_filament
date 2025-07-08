<div class="max-w-md mx-auto mt-16 bg-white px-8 py-10 rounded-2xl shadow-xl">
    <h2 class="text-3xl font-bold text-center text-gray-800 mb-6">Create Your Account</h2>

    <form wire:submit.prevent="register" class="space-y-5">
        <div>
            <label for="name" class="block mb-1 text-sm font-medium text-gray-700">Full Name</label>
            <input type="text" wire:model="name" id="name"
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none" />
            @error('name') <span class="text-xs text-red-600 mt-1">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="email" class="block mb-1 text-sm font-medium text-gray-700">Email Address</label>
            <input type="email" wire:model="email" id="email"
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none" />
            @error('email') <span class="text-xs text-red-600 mt-1">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="password" class="block mb-1 text-sm font-medium text-gray-700">Password</label>
            <input type="password" wire:model="password" id="password"
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none" />
            @error('password') <span class="text-xs text-red-600 mt-1">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="password_confirmation" class="block mb-1 text-sm font-medium text-gray-700">Confirm Password</label>
            <input type="password" wire:model="password_confirmation" id="password_confirmation"
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none" />
        </div>

        <div>
            <label for="role" class="block mb-1 text-sm font-medium text-gray-700">Register as</label>
            <select wire:model="role" id="role"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                <option value="student">Student</option>
                <option value="instructor">Instructor</option>
            </select>
        </div>

        <button type="submit"
                class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-3 rounded-lg transition-all duration-300 shadow-md hover:shadow-lg">
            Sign Up
        </button>
    </form>
</div>
