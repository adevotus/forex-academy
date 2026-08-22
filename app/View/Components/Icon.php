<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class Icon extends Component
{
    public function __construct(public string $name, public string $class = 'h-5 w-5') {}

    public function render(): View
    {
        return view('components.icon');
    }

    public function path(): string
    {
        return match ($this->name) {
            'home' => 'M3 12l9-9 9 9M5 10v10a1 1 0 001 1h4a1 1 0 001-1v-4h2v4a1 1 0 001 1h4a1 1 0 001-1V10',
            'book' => 'M4 19.5A2.5 2.5 0 016.5 17H20M4 19.5A2.5 2.5 0 006.5 22H20V4H6.5A2.5 2.5 0 004 6.5v13z',
            'cpu' => 'M9 3v2m6-2v2M9 19v2m6-2v2M3 9h2m-2 6h2m14-6h2m-2 6h2M7 7h10v10H7V7z',
            'chart' => 'M3 3v18h18M7 15l4-4 3 3 5-6',
            'users' => 'M17 21v-2a4 4 0 00-4-4H7a4 4 0 00-4 4v2M11 7a4 4 0 11-8 0 4 4 0 018 0zm10 14v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75',
            'card' => 'M2 7a2 2 0 012-2h16a2 2 0 012 2v10a2 2 0 01-2 2H4a2 2 0 01-2-2V7zM2 10h20',
            'check' => 'M5 13l4 4L19 7',
            'check-circle' => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z',
            'lock' => 'M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zM8 11V7a4 4 0 118 0v4',
            'unlock' => 'M8 11V7a4 4 0 118 0M6 11h12a2 2 0 012 2v6a2 2 0 01-2 2H6a2 2 0 01-2-2v-6a2 2 0 012-2z',
            'play' => 'M14.752 11.168l-6.518-3.76A1 1 0 007 8.24v7.52a1 1 0 001.234.972l6.518-1.626a1 1 0 00.766-.972v-2.294a1 1 0 00-.766-.972l-6.518-1.626',
            'play-solid' => 'M8 5v14l11-7z',
            'trophy' => 'M8 21h8m-4-4v4M7 4h10v3a5 5 0 01-10 0V4zM7 6H4a3 3 0 003 3M17 6h3a3 3 0 01-3 3',
            'plus' => 'M12 5v14m-7-7h14',
            'edit' => 'M11 4H6a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2v-5m-1.5-9.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z',
            'trash' => 'M3 6h18M8 6V4a2 2 0 012-2h4a2 2 0 012 2v2m3 0v14a2 2 0 01-2 2H7a2 2 0 01-2-2V6h14z',
            'arrow-right' => 'M5 12h14m-6-6l6 6-6 6',
            'star' => 'M12 2l3.09 6.26L22 9.27l-5 4.87L18.18 21 12 17.77 5.82 21 7 14.14l-5-4.87 6.91-1.01L12 2z',
            'shield' => 'M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z',
            'download' => 'M12 3v12m0 0l-4-4m4 4l4-4M4 19h16',
            'calendar' => 'M8 2v4m8-4v4M3 10h18M5 4h14a2 2 0 012 2v14a2 2 0 01-2 2H5a2 2 0 01-2-2V6a2 2 0 012-2z',
            'mail' => 'M3 6l9 6 9-6M5 4h14a2 2 0 012 2v12a2 2 0 01-2 2H5a2 2 0 01-2-2V6a2 2 0 012-2z',
            'clock' => 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z',
            'x' => 'M6 18L18 6M6 6l12 12',
            'menu' => 'M4 6h16M4 12h16M4 18h16',
            'sparkles' => 'M5 3v4M3 5h4m6 2l1.5 3.5L18 12l-3.5 1.5L13 17l-1.5-3.5L8 12l3.5-1.5L13 7z',
            'badge' => 'M12 15l-5.5 3 1.5-6L3 8l6-.5L12 2l3 5.5 6 .5-5 4 1.5 6z',
            'grid' => 'M4 4h6v6H4V4zm10 0h6v6h-6V4zM4 14h6v6H4v-6zm10 0h6v6h-6v-6z',
            default => 'M12 4v16m8-8H4',
        };
    }
}
