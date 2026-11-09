@extends('layouts.app')

@section('content')
    @include('sections.home')
    <x-map-divider icon="fa-solid fa-compass" />
    @include('sections.about')
    <x-map-divider icon="fa-solid fa-xmark" accent="red" />
    @include('sections.skills')
    <x-map-divider icon="fa-solid fa-anchor" />
    @include('sections.interests')
    <x-map-divider icon="fa-solid fa-map-location-dot" />
    @include('sections.education')
    <x-map-divider icon="fa-solid fa-bottle-droplet" />
    @include('sections.contact')
@endsection
