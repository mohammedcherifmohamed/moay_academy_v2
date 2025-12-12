@extends('Layouts.Main')

@section('title', 'Success')

@section('content')
    <div class="min-h-screen flex items-center justify-center bg-green-50">
        <div class="bg-white shadow-lg rounded-lg p-8 text-center">
            <h1 class="text-2xl font-bold text-green-600 mb-4">✅ Succès !</h1>
            <p class="text-gray-700 mb-6">Merci de nous avoir contactés. Nous vous répondrons bientôt.</p>

            <a href="{{ route('home') }}" 
               class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-lg">
                retoure a l'accueil
            </a>
        </div>
    </div>
@endsection