@extends('layouts.app')

@section('title')
    Registro
@endsection

@section('contain')
<form action="{{ route('register') }}" method="POST">
  @csrf
  <div class="space-y-8 space-x-6 p-12">
    <div class="border-b border-gray-900/10 pb-12">
      <h2 class="text-base/10 font-semibold text-gray-900">Perfil</h2>
      <p class="mt-1 text-sm/6 text-gray-600">Esta información será visible públicamente.</p>

      <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        <div class="sm:col-span-4">
          <label for="username" class="block text-sm/6 font-semibold text-gray-900">Nombre de usuario</label>
          <div class="mt-2">
            <div class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-blue-800">
              <div class="shrink-0 text-base text-gray-500 select-none sm:text-sm/6">eoners.com.ar/</div>
              <input id="username" type="text" name="username" placeholder="Tu usuario" class="block min-w-0 grow bg-white py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" />
            </div>
            @error('username')
            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p2 text-center">{{ $message }}</p>
            @enderror
          </div>
        </div>

        <div class="col-span-full">
          <label for="about" class="block text-sm/6 font-medium text-gray-900">Sobre mí</label>
          <div class="mt-2">
            <textarea id="about" name="about" placeholder="Cuéntanos acerca de ti" rows="3" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-blue-800 sm:text-sm/6"></textarea>
          </div>
          @error('about')
          <p class="bg-red-500 text-white my-2 rounded-lg text-sm p2 text-center">{{ $message }}</p>
          @enderror
        </div>

        <div class="col-span-full">
          <label for="photo" class="block text-sm/6 font-medium text-gray-900">Foto de perfil</label>
          <div class="mt-2 flex items-center gap-x-3">
            <svg viewBox="0 0 24 24" fill="currentColor" class="size-12 text-gray-300">
              <path d="M18.685 19.097A9.723 9.723 0 0 0 21.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 0 0 3.065 7.097A9.716 9.716 0 0 0 12 21.75a9.716 9.716 0 0 0 6.685-2.653Zm-12.54-1.285A7.486 7.486 0 0 1 12 15a7.486 7.486 0 0 1 5.855 2.812A8.224 8.224 0 0 1 12 20.25a8.224 8.224 0 0 1-5.855-2.438ZM15.75 9a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" clip-rule="evenodd" fill-rule="evenodd" />
            </svg>
            <button type="button" class="rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-xs inset-ring inset-ring-gray-300 hover:bg-gray-50">Cambiar</button>
          </div>
          @error('photo')
          <p class="bg-red-500 text-white my-2 rounded-lg text-sm p2 text-center">{{ $message }}</p>
          @enderror
        </div>

        <div class="col-span-full">
          <label class="block text-sm/6 font-medium text-gray-900">Foto de portada</label>
          <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
            <div class="text-center">
              <svg viewBox="0 0 24 24" fill="currentColor" class="mx-auto size-12 text-gray-300">
                <path d="M1.5 6a2.25 2.25 0 0 1 2.25-2.25h16.5A2.25 2.25 0 0 1 22.5 6v12a2.25 2.25 0 0 1-2.25 2.25H3.75A2.25 2.25 0 0 1 1.5 18V6ZM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0 0 21 18v-1.94l-2.69-2.689a1.5 1.5 0 0 0-2.12 0l-.88.879.97.97a.75.75 0 1 1-1.06 1.06l-5.16-5.159a1.5 1.5 0 0 0-2.12 0L3 16.061Zm10.125-7.81a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Z" clip-rule="evenodd" fill-rule="evenodd" />
              </svg>
              <div class="mt-4 flex text-sm/6 text-gray-600">
                <label for="file-upload" class="relative cursor-pointer rounded-md bg-transparent font-semibold text-blue-800 focus-within:outline-2 focus-within:outline-offset-2 focus-within:outline-blue-800 hover:text-blue-800/75">
                  <span>Subir archivo</span>
                  <input id="file-upload" type="file" name="file-upload" class="sr-only" />
                </label>
                <p class="pl-1">o arrastrar aquí</p>
              </div>
              <p class="text-xs/5 text-gray-600">PNG, JPG, GIF hasta 10MB</p>
            </div>
          </div>
          @error('file-upload')
          <p class="bg-red-500 text-white my-2 rounded-lg text-sm p2 text-center">{{ $message }}</p>
          @enderror
        </div>
      </div>
    </div>

    <!-- Información Personal -->
    <div class="border-b border-gray-900/10 pb-12">
      <h2 class="text-base/7 font-semibold text-gray-900">Información Personal</h2>
      <p class="mt-1 text-sm/6 text-gray-600">Usa una dirección permanente donde recibas correo.</p>

      <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        <div class="sm:col-span-3">
          <label for="first-name" class="block text-sm/6 font-medium text-gray-900">Nombre</label>
          <input id="first-name" name="first-name" type="text" placeholder="Ingrese su nombre" class="mt-2 block w-full rounded-md bg-white px-3 py-1.5 outline-gray-300 focus:outline-blue-800"/>
          @error('first-name')
          <p class="bg-red-500 text-white my-2 rounded-lg text-sm p2 text-center">{{ $message }}</p>
          @enderror
        </div>

        <div class="sm:col-span-3">
          <label for="last-name" class="block text-sm/6 font-medium text-gray-900">Apellido</label>
          <input id="last-name" name="last-name" type="text" placeholder="Ingrese su apellido" class="mt-2 block w-full rounded-md bg-white px-3 py-1.5 outline-gray-300 focus:outline-blue-800"/>
          @error('last-name')
          <p class="bg-red-500 text-white my-2 rounded-lg text-sm p2 text-center">{{ $message }}</p>
          @enderror
        </div>

        <div class="sm:col-span-4">
          <label for="email" class="block text-sm/6 font-medium text-gray-900">Correo electrónico</label>
          <input id="email" name="email" type="email" placeholder="nombre@ejemplo.com" class="mt-2 block w-full rounded-md bg-white px-3 py-1.5 outline-gray-300 focus:outline-blue-800"/>
          @error('email')
          <p class="bg-red-500 text-white my-2 rounded-lg text-sm p2 text-center">{{ $message }}</p>
          @enderror
        </div>

        <div class="sm:col-span-3">
          <label for="country" class="block text-sm/6 font-medium text-gray-900">País</label>
          <select id="country" name="country" class="mt-2 w-full rounded-md bg-white py-1.5 pr-8 pl-3 border outline-gray-300 focus:outline-blue-800">
            <option>Argentina</option>
          </select>
          @error('country')
          <p class="bg-red-500 text-white my-2 rounded-lg text-sm p2 text-center">{{ $message }}</p>
          @enderror
        </div>

        <div class="col-span-full">
          <label for="street-address" class="block text-sm/6 font-medium text-gray-900">Dirección</label>
          <input id="street-address" name="street-address" type="text" placeholder="Ingrese su dirección" class="mt-2 block w-full rounded-md bg-white px-3 py-1.5 outline-gray-300 focus:outline-blue-800"/>
          @error('street-address')
          <p class="bg-red-500 text-white my-2 rounded-lg text-sm p2 text-center">{{ $message }}</p>
          @enderror
        </div>

        <div class="sm:col-span-2 sm:col-start-1">
          <label for="city" class="block text-sm/6 font-medium text-gray-900">Ciudad</label>
          <input id="city" name="city" type="text" placeholder="Ciudad" class="mt-2 block w-full rounded-md bg-white px-3 py-1.5 outline-gray-300 focus:outline-blue-800"/>
          @error('city')
          <p class="bg-red-500 text-white my-2 rounded-lg text-sm p2 text-center">{{ $message }}</p>
          @enderror
        </div>

        <div class="sm:col-span-2">
          <label for="region" class="block text-sm/6 font-medium text-gray-900">Provincia</label>
          <input id="region" name="region" type="text" placeholder="Provincia" class="mt-2 block w-full rounded-md bg-white px-3 py-1.5 outline-gray-300 focus:outline-blue-800"/>
          @error('region')
          <p class="bg-red-500 text-white my-2 rounded-lg text-sm p2 text-center">{{ $message }}</p>
          @enderror
        </div>

        <div class="sm:col-span-2">
          <label for="postal-code" class="block text-sm/6 font-medium text-gray-900">Código Postal</label>
          <input id="postal-code" name="postal-code" type="text" placeholder="Código Postal" class="mt-2 block w-full rounded-md bg-white px-3 py-1.5 outline-gray-300 focus:outline-blue-800"/>
          @error('postal-code')
          <p class="bg-red-500 text-white my-2 rounded-lg text-sm p2 text-center">{{ $message }}</p>
          @enderror
        </div>
      </div>
    </div>

    <div class="border-b border-gray-900/10 pb-12">
      <h2 class="text-base/7 font-semibold text-gray-900">Notificaciones</h2>
      <p class="mt-1 text-sm/6 text-gray-600">Siempre te informaremos sobre cambios importantes, tú eliges qué más recibir.</p>

      <div class="mt-10 space-y-10">
        <fieldset>
          <legend class="text-sm/6 font-semibold text-gray-900">Push en el móvil</legend>
          <p class="mt-1 text-sm/6 text-gray-600">Serán enviadas vía SMS a tu celular.</p>
          <div class="mt-6 space-y-6">
            <div class="flex items-center gap-x-3">
              <input id="push-everything" type="radio" name="push-notifications" checked class="relative size-4 appearance-none rounded-full border border-gray-300 bg-white checked:border-indigo-600 checked:bg-indigo-600" />
              <label for="push-everything" class="block text-sm/6 font-medium text-gray-900">Todo</label>
            </div>
            <div class="flex items-center gap-x-3">
              <input id="push-email" type="radio" name="push-notifications" class="relative size-4 appearance-none rounded-full border border-gray-300 bg-white checked:border-indigo-600 checked:bg-indigo-600" />
              <label for="push-email" class="block text-sm/6 font-medium text-gray-900">Igual que por email</label>
            </div>
            <div class="flex items-center gap-x-3">
              <input id="push-nothing" type="radio" name="push-notifications" class="relative size-4 appearance-none rounded-full border border-gray-300 bg-white checked:border-indigo-600 checked:bg-indigo-600" />
              <label for="push-nothing" class="block text-sm/6 font-medium text-gray-900">Sin notificaciones push</label>
            </div>
          </div>
        </fieldset>
      </div>
    </div>

    <!-- Contraseña -->
    <div class="border-b border-gray-900/10 pb-12">
      <h2 class="text-base/7 font-semibold text-gray-900">Seguridad</h2>

      <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        <div class="sm:col-span-3">
          <label for="password" class="block text-sm/6 font-medium text-gray-900">Contraseña</label>
          <input id="password" name="password" type="password" placeholder="Ingrese su contraseña" class="mt-2 block w-full rounded-md bg-white px-3 py-1.5 outline-gray-300 focus:outline-blue-800"/>
          @error('password')
          <p class="bg-red-500 text-white my-2 rounded-lg text-sm p2 text-center">{{ $message }}</p>
          @enderror
        </div>

        <div class="sm:col-span-3">
          <label for="password_confirmation" class="block text-sm/6 font-medium text-gray-900">Repetir contraseña</label>
          <input id="password_confirmation" name="password_confirmation" type="password" placeholder="Repita su contraseña" class="mt-2 block w-full rounded-md bg-white px-3 py-1.5 outline-gray-300 focus:outline-blue-800"/>
          @error('password_confirmation')
          <p class="bg-red-500 text-white my-2 rounded-lg text-sm p2 text-center">{{ $message }}</p>
          @enderror
        </div>
      </div>
    </div>

  </div>
  <div class="mt-6 mr-10 flex items-center justify-end gap-x-6">
    <button type="button" class="text-sm/6 font-semibold text-gray-900">Cancelar</button>
    <button type="submit" class="rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-xs inset-ring inset-ring-gray-300 hover:bg-gray-50">Completar registro</button>
  </div>
</form>
@endsection
