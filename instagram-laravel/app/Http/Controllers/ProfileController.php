<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

use Illuminate\Support\Facades\Storage;

// Adicionamos una libreria para hacer las validaciones de nick y email antes de guardarlos cambios
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        // Definir el usuario, esto para que el código quede mas legible y no se este usando cada rato $request->user()
        $user = $request->user();

        // Ingresamos las validaciones para los campos de nick y email para que no se repitan
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'nick' => [
                'required', 'string', 'max:255',
                Rule::unique('users')->ignore($user->id),
            ],
            'email' => [
                'required', 'email', 'max:255',
                Rule::unique('users')->ignore($user->id),
            ],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,gif,webp', 'max:2048'],
        ]);

        // Rellenamos los datos validados
        $user->fill($validated);

        // Si el email fue modificado, quitar verificación
        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        // Guardar nueva imagen si existe
        if ($request->hasFile('image')) {
            // Eliminar imagen anterior si existe
            if ($user->image && Storage::exists('users/' . $user->image)) {
                Storage::delete('users/' . $user->image);
            }

            $filename = uniqid() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('users', $filename);
            $user->image = $filename;
        }

        // Guardamos cambios
        $user->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Este metodo lo reemplazamos por el anterior, mas estructurado.
    */
    /* public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        // Ingresamos las validaciones para los campos de nick y email para que no se repitan
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'nick' => [
                'required',
                'string',
                'max:255',
                Rule::unique('users')->ignore($request->user()->id), // Ignorar al usuario actual
            ],
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users')->ignore($request->user()->id), // Ignorar al usuario actual
            ],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,gif,webp', 'max:2048'],
        ]);

        // Rellenamos los datos del usuario con la información validada
        // Esto estaba antes, pero como ahora deseamos que se valide nick y email que sean unicos se comentarea y se reemplaza
        //$request->user()->fill($request->validated());
        $request->user()->fill($validated);

        // Si el correo ha cambiado, restablecemos la verificación
        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        //var_dump($request);
        //die();

        // Guardamos el usuario actualizado
        $request->user()->save();

        // Redirigimos con el mensaje de éxito
        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    } */

    /**
     * Metodo para obtener una imagen.
     */
    public function getImage($filename) {
        $file = Storage::disk('users')->get($filename);
        // Retornamos aca el archivo para imprimirlo por pantalla
        return new Response($file, 200);
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

}
