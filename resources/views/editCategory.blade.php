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

        <form method="POST" action="{{ route('categoryedit',$id) }}"   enctype="multipart/form-data">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="name" :value="__('Category Name')" />

                <x-input  id="name" class="block mt-1 w-full" type="text" name="name" required   autofocus />
            </div>

            <!-- Password -->

                <div>
                    <x-label for="image" :value="__('image')"  />

                    <x-input type="file" name="image" class="form-control" placeholder="Image Title"/>
                 
                </div>

                   

            <div class="flex items-center justify-end mt-4">
             
                <button type="submit" class="ml-3">Edit</button>

            </div>

        </form>
    </x-auth-card>
</x-guest-layout>
