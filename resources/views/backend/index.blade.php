<x-backend.app >
    <!-- Top Bar -->
    <x-backend.header />

    <x-backend.sidebar />
    <x-backend.main agents="{{$agentsCount}}" properties="{{$totProperties}}" businesses="{{$totBusiness}}"/>
</x-backend.app>

