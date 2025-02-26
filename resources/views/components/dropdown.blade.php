@props(['align' => 'right', 'width' => '48', 'contentClasses' => 'dropdown-content-default'])

@php
    switch ($align) {
        case 'left':
            $alignmentClasses = 'dropdown-align-left';
            break;
        case 'top':
            $alignmentClasses = 'dropdown-align-top';
            break;
        case 'right':
        default:
            $alignmentClasses = 'dropdown-align-right';
            break;
    }

    switch ($width) {
        case '48':
            $width = 'dropdown-width-48';
            break;
    }
@endphp

<div class="dropdown" x-data="{ open: false }" @click.outside="open = false" @close.stop="open = false">
    <div class="dropdown-trigger" @click="open = ! open">
        {{ $trigger }}
    </div>

    <div x-show="open" x-transition:enter="dropdown-enter" x-transition:enter-start="dropdown-enter-start"
        x-transition:enter-end="dropdown-enter-end" x-transition:leave="dropdown-leave"
        x-transition:leave-start="dropdown-leave-start" x-transition:leave-end="dropdown-leave-end"
        class="dropdown-menu {{ $width }} {{ $alignmentClasses }}" style="display: none;" @click="open = false">
        <div class="dropdown-content {{ $contentClasses }}">
            {{ $content }}
        </div>
    </div>
</div>
