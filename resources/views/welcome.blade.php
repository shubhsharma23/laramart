@extends('layouts.app') 

@section('content')
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
            

           <div>

               <h3 class="text-center">welcome to Laramart</h3>
               <p class="text-info text-center bg-dark">Laramart is an online ecommerce website where you can buy electronic gadgets like smartphone, laptops, headphoes, smart_tv and many more....</p>
               @if (Route::has('login'))
                <div class="hidden fixed top-0 mx-auto text-center right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/home') }}" class="tclass='btn btn-danger flex-fill'   ">Home</a>
                    @else
                        <a href="{{ route('login') }}" class='btn btn-danger flex-fill'>Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class='btn btn-success flex-fill text-white'>Register</a>
                        @endif
                    @endif
                </div>
            @endif

            
           </div>
        </div>
   @endsection
