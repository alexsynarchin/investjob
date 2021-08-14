const mix = require('laravel-mix');
const SVGSpritemapPlugin = require('svg-spritemap-webpack-plugin');
require('laravel-mix-alias');
mix.js('resources/site/js/app.js', 'public/assets/site/js')
    .vue({ version: 2 })
    .sass('resources/site/sass/app.scss', 'public/assets/site/css')
    .options({
        processCssUrls: false,
        processJsUrls:false
    })
    .webpackConfig({
        plugins: [
            new SVGSpritemapPlugin('resources/site/svg/*.svg',{
                output:{
                    filename:'/public/assets/site/images/sprites.svg'
                }
            }),
        ],
        resolve: {
            extensions: ['.js', '.vue', '.json', '.styl','.scss','.css'],
            alias: {
                '@': __dirname + '/resources/site/js',
            },
        },
    })
    .version();
