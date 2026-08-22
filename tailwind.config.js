/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './resources/views/**/*.blade.php',
        './resources/js/**/*.js',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans:    ['Plus Jakarta Sans', 'Inter', 'ui-sans-serif', 'system-ui', 'sans-serif'],
                display: ['Plus Jakarta Sans', 'Inter', 'ui-sans-serif', 'system-ui', 'sans-serif'],
            },
            colors: {
                // EMMIOXFOREX ACADEMY brand palette — deep navy + electric blue,
                // with a gold accent reserved for "Pro" / premium elements.
                navy: {
                    950: '#060912',
                    900: '#0A0E1A',
                    850: '#0D1324',
                    800: '#111A30',
                    700: '#182342',
                    600: '#22305A',
                },
                brand: {
                    50:  '#EAF3FF',
                    100: '#D3E7FF',
                    200: '#A6CFFF',
                    300: '#72B2FF',
                    400: '#3D91F5',
                    500: '#1F6FE0',
                    600: '#1655B8',
                    700: '#123F8A',
                    800: '#102F63',
                    900: '#0D2246',
                },
                gold: {
                    300: '#F5D67B',
                    400: '#EFC24C',
                    500: '#E0AC1F',
                },
            },
            boxShadow: {
                glow:       '0 0 0 1px rgba(61,145,245,0.15), 0 8px 30px -8px rgba(31,111,224,0.45)',
                'glow-gold':'0 0 0 1px rgba(224,172,31,0.25), 0 8px 30px -8px rgba(224,172,31,0.35)',
                card:       '0 1px 3px 0 rgba(0,0,0,0.06), 0 4px 16px -4px rgba(0,0,0,0.08)',
                'card-hover':'0 4px 24px -4px rgba(31,111,224,0.15), 0 1px 3px 0 rgba(0,0,0,0.06)',
            },
            backgroundImage: {
                'grid-glow':   'radial-gradient(circle at 20% 0%, rgba(61,145,245,0.18), transparent 40%), radial-gradient(circle at 80% 10%, rgba(224,172,31,0.10), transparent 35%)',
                'hero-light':  'radial-gradient(ellipse 80% 60% at 50% -10%, rgba(31,111,224,0.10) 0%, transparent 70%)',
                'brand-panel': 'linear-gradient(135deg, #060912 0%, #0A0E1A 40%, #111A30 100%)',
            },
        },
    },
    plugins: [
        require('@tailwindcss/forms'),
    ],
};
