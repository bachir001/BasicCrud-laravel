<x-guest-layout>

    <x-adminnav/>

 

    <div class="py-12" style="border-style:solid">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" >
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg "  >
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
                <div class="flex items-center justify-end mt-4">

                    <p style="margin-right: 10px">
                        <a  href="{{ url('get/user') }}" class="text-sm text-gray-700 underline"> get Users</a>
                    </p>

                    <p style="margin-right: 10px">
                        <a  href="{{ url('get/category') }}" class="text-sm text-gray-700 underline"> get categories</a>
                    </p>

                    <p style="margin-right: 10px">     
                    <a  href="{{ url('getp/product') }}" class="text-sm text-gray-700 underline"> get Products</a>
                    </p>
                </div>
                <div class="flex items-center justify-end mt-4">


                </div>
            </div>
        </div>
    </div>    
    
    
</x-guest-layout>



