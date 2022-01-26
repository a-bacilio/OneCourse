<div x-data="{open: true}">
    <div class="w-full mx-auto max-w-7xl" x-show="open">
        <x-jet-authentication-card class="">
            <x-slot name="logo">
                <img src="{{asset('img/logo/black_logo.png')}}">
            </x-slot>

            <h1 class="w-full text-3xl font-extrabold text-center">Lea el consentimiento y complete los datos</h1>

            <x-jet-validation-errors class="mb-4" />

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="w-full mx-auto" x-show="open">
                    <div class="flex flex-col items-center justify-center w-full">
                        <img class="object-contain w-11/12 p-5"src="{{asset('img\consent\1.png')}}">
                        <img class="object-contain w-11/12 p-5"src="{{asset('img\consent\2.png')}}">
                        <img class="object-contain w-11/12 p-5"src="{{asset('img\consent\3.png')}}">
                    </div>
                </div>

                <div class="flex flex-row items-center justify-center p-4 mt-4 border-2 border-blue-600">
                    <x-jet-label class="text-3xl font-bold" for="acepto" value="Acepto participar" />
                    <x-jet-input id="acepto" class="block w-6 h-6 mt-1 ml-5" type="checkbox" name="acepto" :value="old('acepto')"
                        required autocomplete="acepto" />
                </div>

                <h1 class="w-full mt-10 text-xl font-extrabold text-center">Complete los datos</h1>

                <div class="mt-4">
                    <x-jet-label for="name" value="Nombre" />
                    <x-jet-input id="name" class="block w-full mt-1" type="text" name="name" :value="old('name')"
                        required autocomplete="name" />
                </div>

                <div class="mt-4">
                    <x-jet-label for="email" value="Correo (Ingresará con su correo)" />
                    <x-jet-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')"
                        required />
                </div>


                <div class="mt-4">
                    <x-jet-label for="password" value="Contraseña" />
                    <x-jet-input id="password" class="block w-full mt-1" type="password" name="password" required
                        autocomplete="new-password" />
                </div>

                <div class="mt-4">
                    <x-jet-label for="password_confirmation" value="Confirme su contraseña" />
                    <x-jet-input id="password_confirmation" class="block w-full mt-1" type="password"
                        name="password_confirmation" required autocomplete="new-password" />
                </div>

                <div class="mt-4">
                    <x-jet-label for="" value="Sexo" />
                    <div class="flex flex-col items-start justify-start">
                        @php
                            $genders=[
                                'Masculino',
                                'Femenino'
                            ]
                        @endphp
                        @foreach ($genders as $gender )
                            <div class="flex flex-row items-center justify-start mt-3 ml-5 mr-5">
                                <x-jet-input id="{{'gender_'.$loop->index}}" class="block mt-1 ml-5 mr-5" type="radio" name="gender"  value="{{$gender}}"
                                    required />
                                <x-jet-label for="{{'gender_'.$loop->index}}" class="ml-6 mr-5" value="{{$gender}}" />
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="mt-4">
                    <x-jet-label for="birth_date" value="Fecha de nacimiento" />
                    <x-jet-input id="birth_date" class="block w-full mt-1" type="date" name="birth_date" min="01/01/1950"  :value="old('birth_date')"
                        required autocomplete="birth_date" />
                </div>


                <div class="mt-10">
                    <x-jet-label for="" value="Nivel Educativo" />
                    <div class="flex flex-col items-start justify-start">
                        @php
                            $education_levels=[
                                'Sin estudios',
                                'Primaria Incompleta',
                                'Primaria Completa',
                                'Secundaria Incompleta',
                                'Secundaria Completa',
                                'Técnico Incompleto',
                                'Técnico Completo',
                                'Universitario Incompleto',
                            ]
                        @endphp
                        @foreach ($education_levels as $education_level )
                            <div class="flex flex-row items-center justify-start mt-3 ml-5 mr-5">
                                <x-jet-input id="{{'education_level_'.$loop->index}}" class="block mt-1 ml-5 mr-5" type="radio" name="education_level"  value="{{$education_level}}"
                                    required />
                                <x-jet-label for="{{'education_level_'.$loop->index}}" class="ml-6 mr-5" value="{{$education_level}}" />
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="mt-10">
                    <x-jet-label for="" value="Estado civil" />
                    <div class="flex flex-col items-start justify-start">
                        @php
                            $civil_statuses=[
                                'Soltera (o)',
                                'Conviviente',
                                'Casada (o)',
                                'Divorciada (o)',
                                'Viuda (o)',
                            ]
                        @endphp
                        @foreach ($civil_statuses as $civil_status )
                            <div class="flex flex-row items-center justify-start mt-3 ml-5 mr-5">
                                <x-jet-input id="{{'civil_status_'.$loop->index}}" class="block mt-1 ml-5 mr-5" type="radio" name="civil_status"  value="{{$civil_status}}"
                                    required />
                                <x-jet-label for="{{'civil_status_'.$loop->index}}" class="ml-6 mr-5" value="{{$civil_status}}" />
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="mt-10">
                    <x-jet-label for="" value="Ocupacion" />
                    <div class="flex flex-col items-start justify-start">
                        @php
                            $occupationes=[
                                'Hogar',
                                'Trabajador dependiente',
                                'Trabajador independiente',
                                'Desempleado',
                                'Estudiante',
                            ]
                        @endphp
                        @foreach ($occupationes as $occupation )
                            <div class="flex flex-row items-center justify-start mt-3 ml-5 mr-5">
                                <x-jet-input id="{{'occupation_'.$loop->index}}" class="block mt-1 ml-5 mr-5" type="radio"  name="occupation" value="{{$occupation}}"
                                    required />
                                <x-jet-label for="{{'occupation_'.$loop->index}}" class="ml-6 mr-5" value="{{$occupation}}" />
                            </div>
                        @endforeach
                    </div>
                </div>


                <h1 class="mt-10 text-xl">Residencia actual</h1>

                <div class="mt-4">
                    <x-jet-label for="residence_state" value="Departamento" />
                    <x-jet-input id="residence_state" class="block w-full mt-1" type="text" name="residence_state" :value="old('residence_state')"
                        required autocomplete="residence_state" />
                </div>

                <div class="mt-4">
                    <x-jet-label for="residence_province" value="Provincia" />
                    <x-jet-input id="residence_province" class="block w-full mt-1" type="text" name="residence_province" :value="old('residence_province')"
                        required autocomplete="residence_province" />
                </div>

                <div class="mt-4">
                    <x-jet-label for="residence_district" value="Distrito" />
                    <x-jet-input id="residence_district" class="block w-full mt-1" type="text" name="residence_district" :value="old('residence_district')"
                        required autocomplete="residence_district" />
                </div>


                <div class="mt-10">
                    <x-jet-label for="" value="¿Usted tuvo un familiar con COVID-19?" />
                    <div class="flex flex-col items-start justify-start">
                        @php
                            $covid_family_options=[
                                'Si',
                                'No',
                            ]
                        @endphp
                        @foreach ($covid_family_options as $covid_family )
                            <div class="flex flex-row items-center justify-start mt-3 ml-5 mr-5">
                                <x-jet-input id="{{'covid_family_'.$loop->index}}" class="block mt-1 ml-5 mr-5"  type="radio" name="covid_family" value="{{$covid_family}}"
                                    required />
                                <x-jet-label for="{{'covid_family_'.$loop->index}}" class="ml-6 mr-5" value="{{$covid_family}}" />
                            </div>
                        @endforeach
                    </div>
                </div>


                <div class="mt-10">
                    <x-jet-label for="" value="¿Fue usted u otro miembro de la familia cuidador(a)?" />
                    <div class="flex flex-col items-start justify-start">
                        @php
                            $caretaker_you_options=[
                                'Si',
                                'No',
                            ]
                        @endphp
                        @foreach ($caretaker_you_options as $caretaker_you )
                            <div class="flex flex-row items-center justify-start mt-3 ml-5 mr-5">
                                <x-jet-input id="{{'caretaker_you_'.$loop->index}}" class="block mt-1 ml-5 mr-5" type="radio"  name="caretaker_you" value="{{$caretaker_you}}"
                                    required />
                                <x-jet-label for="{{'caretaker_you_'.$loop->index}}" class="ml-6 mr-5" value="{{$caretaker_you}}" />
                            </div>
                        @endforeach
                    </div>
                </div>


                <div class="mt-10">
                    <x-jet-label for="" value="¿Contrato a algún profesional para realizar los cuidados?" />
                    <div class="flex flex-col items-start justify-start">
                        @php
                            $caretaker_pro_options=[
                                'Si',
                                'No',
                            ]
                        @endphp
                        @foreach ($caretaker_pro_options as $caretaker_pro )
                            <div class="flex flex-row items-center justify-start mt-3 ml-5 mr-5">
                                <x-jet-input id="{{'caretaker_pro_'.$loop->index}}" class="block mt-1 ml-5 mr-5" type="radio"  name="caretaker_pro" value="{{$caretaker_pro}}"
                                    required />
                                <x-jet-label for="{{'caretaker_pro_'.$loop->index}}" class="ml-6 mr-5" value="{{$caretaker_pro}}" />
                            </div>
                        @endforeach
                    </div>
                </div>




                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                    <div class="mt-4">
                        <x-jet-label for="terms">
                            <div class="flex items-center">
                                <x-jet-checkbox name="terms" id="terms" />

                                <div class="ml-2">
                                    {!! __('I agree to the :terms_of_service and :privacy_policy', [
    'terms_of_service' => '<a target="_blank" href="' . route('terms.show') . '" class="text-sm text-gray-600 underline hover:text-gray-900">' . __('Terms of Service') . '</a>',
    'privacy_policy' => '<a target="_blank" href="' . route('policy.show') . '" class="text-sm text-gray-600 underline hover:text-gray-900">' . __('Privacy Policy') . '</a>',
]) !!}
                                </div>
                            </div>
                        </x-jet-label>
                    </div>
                @endif

                <div class="flex items-center justify-end mt-4">
                    <a class="text-sm text-gray-600 underline hover:text-gray-900" href="{{ route('login') }}">
                        ¿Ya te registraste?
                    </a>

                    <x-jet-button class="ml-4">
                        Regístrame
                    </x-jet-button>
                </div>
            </form>
        </x-jet-authentication-card>
    </div>
</div>
