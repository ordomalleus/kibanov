let mix = require('laravel-mix');
const BundleAnalyzerPlugin = require('webpack-bundle-analyzer').BundleAnalyzerPlugin;

// Оптимизация картинок
// https://github.com/JeffreyWay/laravel-mix/issues/1192
const ImageminPlugin     = require('imagemin-webpack-plugin').default;
const CopyWebpackPlugin  = require('copy-webpack-plugin');
const imageminMozjpeg    = require('imagemin-mozjpeg');
mix.webpackConfig({
    plugins: [
        //Compress images
        new CopyWebpackPlugin([{
            from: 'resources/assets/img', // FROM
            to: 'img/', // TO
        }]),
        new ImageminPlugin({
            test: /\.(jpe?g|png|gif|svg)$/i,
            pngquant: {
                quality: '80'
            },
            plugins: [
                imageminMozjpeg({
                    quality: 65,
                    //Set the maximum memory to use in kbytes
                    maxMemory: 1000 * 200
                })
            ]
        })
    ],
});

// бандл анализатор запус "npm run devAnalyzer"
if(process.env.NODE_ENV === 'developmentAnalyzer') {
    mix.webpackConfig({
        plugins: [
            new BundleAnalyzerPlugin()
        ],
    });
}

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.react('resources/assets/js/app.js', 'public/js')
   // .sass('resources/assets/sass/app.scss', 'public/css');
   .sass('resources/assets/sass/app.scss', 'public/css', { implementation: require('node-sass') });

mix.react('resources/assets/js/admin.js', 'public/js/admin');


// TODO: переделал картинки с оптимизацией на плагины выше
// mix.copy(['resources/assets/img/**.*'], 'public/img');
