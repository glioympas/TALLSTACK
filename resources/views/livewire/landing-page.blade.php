<div

class="flex flex-col w-full h-screen bg-indigo-800"

x-data="{
    showSubscribe: @entangle('showSubscribe'),
    showSuccess : @entangle('showSuccess'),
    successMessage: @entangle('successMessage')
}"

>
<nav class="container flex items-center justify-between pt-5 mx-auto text-indigo-200">
    <a href="/" class="text-4xl font-bold">
        <x-application-logo class="w-16 h-16 fill-current"></x-application-logo>
    </a>

    <div class="flex justify-end">
        @auth
            <a href="{{ route('dashboard') }}">Dashboard</a>
        @else
            <a href="{{ route('login') }}">Login</a>
        @endauth
    </div>

</nav>

<div class="container flex items-center h-full mx-auto">
    <div class="flex flex-col items-start w-1/3">
        <h1 class="mb-4 text-5xl font-bold leading-tight text-white">Simple generic landing page to subscribe</h1>
        <p class="mb-10 text-xl text-indigo-200">I am George, and we test together the <span class="underline bold">TALL</span> stack. Would you mind subscribing?</p>
        <x-button x-on:click="showSubscribe = true" class="px-8 py-3 text-white bg-red-500 hover:bg-red-600">Subscribe</x-button>
    </div>
</div>


<x-modal  trigger="showSubscribe"  class="bg-pink-500">
    <p class="text-5xl text-center text-white animate-pulse">Subscribe Now!</p>
    <form class="flex flex-col items-center p-20" wire:submit.prevent="subscribe">
        <x-input class="px-5 py-3 border border-blue-400 w-80" type="email" name="email" placeholder="Email Address" wire:model.defer="email"></x-input>
        <span class="mt-2 text-xs text-gray-100">
            @error('email')
                {{ $message }}
            @else
                We will send you back!
            @enderror 
        </span>
        <x-button  class="justify-center px-5 py-3 mt-5 bg-blue-500 w-80">
            <span wire:loading.remove wire:target="subscribe">Get In!</span>
            <span class="animate-spin" wire:loading wire:target="subscribe">&#9696;</span>
        </x-button>
    </form>

</x-modal>


<x-modal trigger="showSuccess" class="bg-green-500">
     <p class="text-9xl font-extrabold text-center text-white animate-pulse">&check;</p>
     <p class="text-5xl font-extrabold text-center text-white animate-pulse mt-16">Great!</p>
     <p x-text="successMessage" class="text-white text-3xl text-center mt-2">
             
     </p>
     <span class="absolute text-3xl font-bold text-white cursor-pointer right-5 top-2" x-on:click="showSuccess = false">&times;</span>
</x-modal>


</div>