@extends('admin.layouts.app')

@section('content')
    {{-- PAGE HEADER  --}}
    <x-admin.page-header title="Mon Profil" subtitle="Gérez vos informations de compte et vos paramètres de sécurité" />

    <div class="space-y-6">
        {{-- UPDATE PROFILE INFORMATION --}}
        <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-6">
            <div class="max-w-xl">
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>

        {{-- UPDATE PASSWORD --}}
        <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-6">
            <div class="max-w-xl">
                @include('profile.partials.update-password-form')
            </div>
        </div>

        {{-- DELETE USER --}}
        <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-6">
            <div class="max-w-xl">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>
@endsection
