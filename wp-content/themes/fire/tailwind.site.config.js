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
    // fontSize: {
    //   // removes bases sizes
    // },
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
        cream: '#f0eae4',
        blue: {
          50: '#EFF8FF',
          100: '#DAEEFF',
          200: '#BEE1FF',
          300: '#91D0FF',
          400: '#5DB5FD',
          500: '#3895FA',
          600: '#2176EF',
          700: '#195FDC',
          800: '#1B4DB2',
          900: '#1C448C',
        },
        green: {
          50: '#f4fce9',
          100: '#e6f7d0',
          200: '#e6f7d0',
          300: '#aee472',
          400: '#90d447',
          500: '#65a624',
          600: '#55941c',
          700: '#42711a',
          800: '#375a1a',
          900: '#304d1a',
        },
        purple: {
          50: '#f2f5fc',
          100: '#e1e9f8',
          200: '#cad9f3',
          300: '#a6c0ea',
          400: '#7ca0de',
          500: '#5d80d4',
          600: '#4965c7',
          700: '#3f54b6',
          800: '#35428c',
          900: '#323d76',
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
