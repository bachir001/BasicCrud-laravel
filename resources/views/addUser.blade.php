<x-guest-layout>
    <x-adminnav/>
    <x-auth-card>
        <x-slot name="logo">
            <img src="https://cdn-icons-png.flaticon.com/512/992/992651.png" alt="" height="50" width="50"> 
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('useradd') }}"   enctype="multipart/form-data">
            @csrf

            <!--  user name -->
            <div>
                <x-label for="name" :value="__('User Name')" />

                <x-input required id="name" class="block mt-1 w-full" type="text" name="name" :value="old('User Name')"  autofocus />
            </div>


             <!--  email  -->
             <div>
                <x-label for="email" :value="__('Email')" />

                <x-input required id="email" class="block mt-1 w-full" type="email" name="email" :value="old(' email')"  autofocus />
            </div>

            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

                   

            <div class="flex items-center justify-end mt-4">
             
                <button type="submit" class="ml-3">Submit</button>

            </div>

        </form>
    </x-auth-card>
</x-guest-layout>
