const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we compile the Sass file
 | for the package as well as bundling up all the JS files.
 |
 */

if (!mix.inProduction()) {
    mix
        .webpackConfig({ devtool: 'source-map' })
        .sourceMaps();
} else {
    mix.options({
        clearConsole: true,
        terser: {
            terserOptions: {
                compress: { drop_console: true },
            },
        },
    });
}

mix
    .sass('resources/sass/app.scss', 'css/template.css', {
        implementation: require('sass'),
    })
    .options({ processCssUrls: false })
    .js('resources/js/app.js', 'js/template.js')
    .setPublicPath('public')
    .version();
