<x-app-layout>
    <div class="flex gap-8">
        <h3>{{ $event->name }}</h3>

        <p>{{ $event->start_date }}</p>

        <p>{{ $event->end_date }}</p>
    </div>
</x-app-layout>