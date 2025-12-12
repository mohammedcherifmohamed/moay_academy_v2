@extends('Layouts.Main')

@section('title', 'ERROR')

@section('content')
    <div class="min-h-screen flex items-center justify-center bg-green-50">
        <div class="bg-white shadow-lg rounded-lg p-8 text-center">
            <h1 class="text-2xl font-bold text-red-600 mb-4">ERROR !</h1>

            <p class="text-gray-700 mb-6">
                Une erreur s'est produite lors de l'envoi de votre message. Veuillez réessayer plus tard.
            </p>

            @if ($errors->any())
                <div class="mb-4 text-left">
                    <ul class="list-disc list-inside text-red-500">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <a href="{{ route('home') }}" 
                class="bg-red-600 hover:bg-red-700 text-white px-6 py-2 rounded-lg">
                Retour à l'accueil
            </a>
        </div>
    </div>
@endsection
