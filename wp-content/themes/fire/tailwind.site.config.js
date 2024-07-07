// Default Config: https://github.com/tailwindcss/tailwindcss/blob/master/stubs/defaultConfig.stub.js
module.exports = {
  important: false,
  future: {
    hoverOnlyWhenSupported: true,
  },
  content: ['./templates/**/*.php', './templates/**/*.js', './theme/assets/**/*.js', './theme/main.js', './*.php', './inc/**/*.php', './acf-json/**/*.json'],
  safelist: [
    {
      pattern: /(mt|mb)-gap-(0|xs|sm|md|lg|xl)/,
      variants: ['lg', 'md'],
    },
    'text-base',
    'text-md',
    'text-lg',
    'text-xl',
    'text-2xl',
    'text-3xl',
  ],
  theme: {
    screens: {
      sm: '576px',
      md: '768px',
      lg: '992px',
      xl: '1200px',
      // Update /inc/responsive-images.php to match above
    },
    container: {
      gridCols: 12,
      gapX: {
        DEFAULT: '0.75rem',
        sm: '0.75rem',
        lg: '1.5rem',
      },
      center: true,
      padding: {
        DEFAULT: '1rem',
        sm: '1rem',
        lg: '2rem',
      },
    },
    fontFamily: {
      body: ['Open Sans', 'Arial', 'sans-serif'],
    },
    fontWeight: {
      thin: 200,
      light: 300,
      normal: 400,
      book: 450,
      medium: 500,
      bold: 700,
    },
    extend: {
      colors: {
        tan: '#F2E0D0',
        blue: {
          300: '#85BFF2',
          500: '#35428C',
        },
        green: {
          300: '#65A624',
          500: '#267302',
        },
      },
      spacing: {
        'gap-0': '0',
        'gap-xs': '1.25rem',
        'gap-sm': '2rem',
        'gap-md': '3rem',
        'gap-lg': '5rem',
        'gap-xl': '8rem',
      },
    },
  },
  plugins: [
    require('@tailwindcss/forms'),
    function ({ addBase, theme }) {
      const screens = theme('screens');
      let lastPadding = theme('container.padding.DEFAULT') || '0';
      let lastGap = theme('container.gapX.DEFAULT') || '0';
      const rootVars = {
        ':root': {
          '--fire-content-max-width': screens.sm,
          '--fire-content-padding': lastPadding,
          '--fire-content-gap-x': lastGap,
        },
      };
      Object.keys(screens).forEach((key) => {
        const padding = theme(`container.padding.${key}`);
        const gap = theme(`container.gapX.${key}`);
        if (padding) {
          lastPadding = padding;
        }
        if (gap) {
          lastGap = gap;
        }
        rootVars[`@screen ${key}`] = {
          ':root': {
            '--fire-content-max-width': screens[key],
            '--fire-content-padding': lastPadding,
            '--fire-content-gap-x': lastGap,
          },
        };
      });
      addBase(rootVars);
    },
  ],
};
