<x-guest-layout>
    <x-adminnav/>
    <x-auth-card>
        <x-slot name="logo">
            <img src="https://cdn-icons-png.flaticon.com/512/860/860814.png" alt="" height="40" width="40"> 
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <form method="POST" action="{{ route('useredit',$id) }}"   enctype="multipart/form-data">
            @csrf

            <!-- User Name -->
            <div>
                <x-label for="name" :value="__('User Name')" />

                <x-input  id="name" class="block mt-1 w-full" type="text" name="name"  required   autofocus />
            </div>


             <!-- User Email -->
             <div>
                <x-label for="email" :value="__('Email')" />

                <x-input  id="email" class="block mt-1 w-full" type="text" name="email" required   autofocus />
            </div>

            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required
                                autocomplete="new-password" />
            </div>


                   

            <div class="flex items-center justify-end mt-4">
             
                <button type="submit" class="ml-3">Edit</button>

            </div>

        </form>
    </x-auth-card>
</x-guest-layout>
