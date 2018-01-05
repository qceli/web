const path = require('path');
const webpack = require('webpack');
const ExtractTextPlugin = require('extract-text-webpack-plugin');
function resolve(dir) {
  return path.join(__dirname, dir);
}
var host = "";
module.exports = {
  entry: {
    main: './src/main',
    vendors: './src/vendors'
  },
  output: {
    path: path.join(__dirname, './dist'),
    filename: '[name].js'
  },
  module: {
    rules: [
      {
        test: /\.vue$/,
        loader: 'vue-loader',
        options: {}
      }, {
        test: /\.js$/,
        loader: 'babel-loader',
        exclude: /node_modules/,
        options: {
          presets: ['es2015'],
        },
      }, {
        test: /\.css$/,
        loader: 'style-loader!css-loader'
      }, {
        test: /\.(eot|svg|ttf|woff|woff2)(\?\S*)?$/,
        loader: 'file-loader',
        options: {
          name: '[name].[ext]?[hash]',
          publicPath: "/",
          outputPath: "static/",
        }
      }, {
        test: /\.(png|jpe?g|gif|svg)(\?\S*)?$/,
        loader: 'file-loader',
        options: {
          name: '[name].[ext]?[hash]',
          publicPath: "/",
          outputPath: "static/",
        }
      }
    ]
  },
  resolve: {
    extensions: ['.js', '.vue', '.json'],
    alias: {
      'vue': 'vue/dist/vue.esm.js',
      '@': resolve('../src')
    }
  },
  devServer:{
    port:4001,
    // proxy:{
    //   "/api":backend,
    // },
    // host:host
  },
  devtool:"source-map",
  plugins: [
    new webpack.ProvidePlugin({  
      $:"jquery",  
      jQuery:"jquery",
      "windows.jQuery": "jquery"
    })  
  ] 
};