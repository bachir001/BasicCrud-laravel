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

        <form method="POST" action="{{ route('productadd') }}"   enctype="multipart/form-data">
            @csrf

            <!--  product name -->
            <div>
                <x-label for="name" :value="__('Product Name')" />

                <x-input required id="name" class="block mt-1 w-full" type="text" name="name" :value="old('Product Name')"  autofocus />
            </div>


             <!--  description  -->
             <div>
                <x-label for="description" :value="__('Description')" />

                <x-input required id="description" class="block mt-1 w-full" type="text" name="description" :value="old(' Details')"  autofocus />
            </div>

            <div style="margin-top:17px ; margin-bottom:17px">
            
                <?php $categories = \App\Models\Category::all(); ?>

                <select required name="categoryname" id="categoryname"  >
            
                     <option
                     selected=""
                     value={{null}}
                     >
                     Categories
                      </option>

                     @foreach($categories as $categ)
                     <option key="{{$categ->id}}" value={{$categ->id}}>{{ $categ->name }}</option>
                     @endforeach
                 
                </select>

            </div>

            
       
    


            <!-- image  -->

                <div>
                    <x-label for="image" :value="__('image')"  />

                    <x-input type="file" name="image" class="form-control" placeholder="Image Title"/>
                 
                </div>

                   

            <div class="flex items-center justify-end mt-4">
             
                <button type="submit" class="ml-3">Submit</button>

            </div>

        </form>
    </x-auth-card>
</x-guest-layout>
