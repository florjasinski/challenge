<!-- resources/views/components/dropdown.blade.php -->
@props(['trigger'])

<div x-data="{ show: false }" @click.away="show = false">
    <div @click="show = !show">
        {{ $trigger }}
    </div>
    <div x-show="show" style="display: none;">
        {{ $slot }}
    </div>
</div>