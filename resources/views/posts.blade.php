@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
            
            <!-- Sidebar izquierdo -->
            <aside class="lg:col-span-3">
                <div class="bg-white rounded-lg shadow overflow-hidden">
                    <div class="h-16 bg-gradient-to-r from-blue-500 to-blue-600"></div>
                    <div class="px-4 pb-4 -mt-8">
                        <img class="h-16 w-16 rounded-full border-4 border-white" src="https://ui-avatars.com/api/?name={{ auth()->user()->name }}&background=3b82f6&color=fff" alt="{{ auth()->user()->name }}">
                        <h3 class="mt-2 text-lg font-semibold text-gray-900">{{ auth()->user()->name }}</h3>
                        <p class="text-sm text-gray-600">{{ auth()->user()->headline ?? 'Profesional' }}</p>
                    </div>
                    <div class="border-t border-gray-200 px-4 py-3">
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Conexiones</span>
                            <span class="font-semibold text-blue-600">{{ auth()->user()->connections_count ?? 0 }}</span>
                        </div>
                    </div>
                </div>

                <div class="mt-4 bg-white rounded-lg shadow p-4">
                    <h4 class="text-sm font-semibold text-gray-900 mb-3">Grupos</h4>
                    <ul class="space-y-2">
                        <li class="text-sm text-gray-600 hover:text-blue-600 cursor-pointer">Laravel Developers</li>
                        <li class="text-sm text-gray-600 hover:text-blue-600 cursor-pointer">Tech Innovation</li>
                        <li class="text-sm text-gray-600 hover:text-blue-600 cursor-pointer">Startups Argentina</li>
                    </ul>
                </div>
            </aside>

            <!-- Feed principal -->
            <main class="lg:col-span-6">
                <!-- Crear publicación -->
                <div class="bg-white rounded-lg shadow p-4 mb-6">
                    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="flex items-start space-x-3">
                            <img class="h-10 w-10 rounded-full" src="https://ui-avatars.com/api/?name={{ auth()->user()->name }}&background=3b82f6&color=fff" alt="{{ auth()->user()->name }}">
                            <div class="flex-1">
                                <textarea 
                                    name="content" 
                                    rows="3" 
                                    class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 resize-none" 
                                    placeholder="¿Sobre qué te gustaría hablar?"
                                    required
                                ></textarea>
                            </div>
                        </div>
                        
                        <div class="mt-4 flex items-center justify-between">
                            <div class="flex space-x-4">
                                <label class="flex items-center space-x-2 text-gray-600 hover:text-blue-600 cursor-pointer">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    <span class="text-sm font-medium">Foto</span>
                                    <input type="file" name="image" accept="image/*" class="sr-only">
                                </label>
                                
                                <label class="flex items-center space-x-2 text-gray-600 hover:text-blue-600 cursor-pointer">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                                    </svg>
                                    <span class="text-sm font-medium">Video</span>
                                </label>
                                
                                <button type="button" class="flex items-center space-x-2 text-gray-600 hover:text-blue-600">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                    <span class="text-sm font-medium">Documento</span>
                                </button>
                            </div>
                            
                            <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-full shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                Publicar
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Lista de publicaciones -->
                @forelse($posts ?? [] as $post)
                <article class="bg-white rounded-lg shadow mb-4 overflow-hidden">
                    <!-- Header del post -->
                    <div class="p-4">
                        <div class="flex items-start justify-between">
                            <div class="flex items-center space-x-3">
                                <img class="h-12 w-12 rounded-full" src="https://ui-avatars.com/api/?name={{ $post->user->name }}&background=random" alt="{{ $post->user->name }}">
                                <div>
                                    <h3 class="text-sm font-semibold text-gray-900">{{ $post->user->name }}</h3>
                                    <p class="text-xs text-gray-600">{{ $post->user->headline ?? 'Profesional' }}</p>
                                    <p class="text-xs text-gray-500">{{ $post->created_at->diffForHumans() }}</p>
                                </div>
                            </div>
                            <button class="text-gray-400 hover:text-gray-600">
                                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                                </svg>
                            </button>
                        </div>
                        
                        <!-- Contenido del post -->
                        <div class="mt-3">
                            <p class="text-gray-900 text-sm whitespace-pre-line">{{ $post->content }}</p>
                        </div>
                    </div>

                    <!-- Imagen del post (si existe) -->
                    @if($post->image_url)
                    <div class="w-full">
                        <img src="{{ $post->image_url }}" alt="Post image" class="w-full h-auto">
                    </div>
                    @endif

                    <!-- Estadísticas -->
                    <div class="px-4 py-2 border-t border-gray-200">
                        <div class="flex items-center justify-between text-sm text-gray-600">
                            <div class="flex items-center space-x-1">
                                <span class="inline-flex items-center">
                                    <svg class="h-4 w-4 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                                    </svg>
                                    <span class="ml-1">{{ $post->likes_count ?? 0 }}</span>
                                </span>
                            </div>
                            <div class="flex items-center space-x-4">
                                <span>{{ $post->comments_count ?? 0 }} comentarios</span>
                                <span>{{ $post->shares_count ?? 0 }} veces compartido</span>
                            </div>
                        </div>
                    </div>

                    <!-- Acciones -->
                    <div class="px-4 py-2 border-t border-gray-200 flex items-center justify-around">
                        <button class="flex items-center space-x-2 text-gray-600 hover:bg-gray-50 px-4 py-2 rounded-lg transition">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5" />
                            </svg>
                            <span class="text-sm font-medium">Me gusta</span>
                        </button>
                        
                        <button class="flex items-center space-x-2 text-gray-600 hover:bg-gray-50 px-4 py-2 rounded-lg transition">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                            </svg>
                            <span class="text-sm font-medium">Comentar</span>
                        </button>
                        
                        <button class="flex items-center space-x-2 text-gray-600 hover:bg-gray-50 px-4 py-2 rounded-lg transition">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z" />
                            </svg>
                            <span class="text-sm font-medium">Compartir</span>
                        </button>
                        
                        <button class="flex items-center space-x-2 text-gray-600 hover:bg-gray-50 px-4 py-2 rounded-lg transition">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                            </svg>
                            <span class="text-sm font-medium">Enviar</span>
                        </button>
                    </div>
                </article>
                @empty
                <div class="bg-white rounded-lg shadow p-8 text-center">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                    </svg>
                    <h3 class="mt-2 text-sm font-medium text-gray-900">No hay publicaciones</h3>
                    <p class="mt-1 text-sm text-gray-500">Comienza siguiendo a más personas para ver su contenido.</p>
                </div>
                @endforelse
            </main>

            <!-- Sidebar derecho -->
            <aside class="lg:col-span-3">
                <div class="bg-white rounded-lg shadow p-4">
                    <h4 class="text-sm font-semibold text-gray-900 mb-4">Noticias relevantes</h4>
                    <ul class="space-y-3">
                        <li>
                            <a href="#" class="block hover:bg-gray-50 -mx-2 px-2 py-1 rounded">
                                <p class="text-sm font-medium text-gray-900">Tendencias en IA</p>
                                <p class="text-xs text-gray-500">Hace 2 horas • 1,234 lectores</p>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="block hover:bg-gray-50 -mx-2 px-2 py-1 rounded">
                                <p class="text-sm font-medium text-gray-900">Laravel 11 lanzado</p>
                                <p class="text-xs text-gray-500">Hace 5 horas • 892 lectores</p>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="block hover:bg-gray-50 -mx-2 px-2 py-1 rounded">
                                <p class="text-sm font-medium text-gray-900">Tech salaries 2024</p>
                                <p class="text-xs text-gray-500">Hace 1 día • 2,456 lectores</p>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="block hover:bg-gray-50 -mx-2 px-2 py-1 rounded">
                                <p class="text-sm font-medium text-gray-900">Startups argentinas</p>
                                <p class="text-xs text-gray-500">Hace 2 días • 567 lectores</p>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="mt-4 bg-white rounded-lg shadow p-4">
                    <h4 class="text-sm font-semibold text-gray-900 mb-4">Personas que quizás conozcas</h4>
                    <ul class="space-y-3">
                        <li class="flex items-center justify-between">
                            <div class="flex items-center space-x-2">
                                <img class="h-10 w-10 rounded-full" src="https://ui-avatars.com/api/?name=Maria+Garcia&background=random" alt="Maria Garcia">
                                <div>
                                    <p class="text-sm font-medium text-gray-900">María García</p>
                                    <p class="text-xs text-gray-500">UX Designer</p>
                                </div>
                            </div>
                            <button class="text-sm font-medium text-blue-600 hover:text-blue-700">Conectar</button>
                        </li>
                        <li class="flex items-center justify-between">
                            <div class="flex items-center space-x-2">
                                <img class="h-10 w-10 rounded-full" src="https://ui-avatars.com/api/?name=Juan+Lopez&background=random" alt="Juan Lopez">
                                <div>
                                    <p class="text-sm font-medium text-gray-900">Juan López</p>
                                    <p class="text-xs text-gray-500">Backend Developer</p>
                                </div>
                            </div>
                            <button class="text-sm font-medium text-blue-600 hover:text-blue-700">Conectar</button>
                        </li>
                    </ul>
                </div>
            </aside>
        </div>
    </div>
</div>
@endsection