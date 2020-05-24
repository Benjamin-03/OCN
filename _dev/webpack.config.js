
const webpack = require('webpack');
const path = require('path');
const UglifyJsPlugin = require('uglifyjs-webpack-plugin');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const postcssPresetEnv = require('postcss-preset-env');
const ManifestPlugin = require('webpack-manifest-plugin');
const {
  CleanWebpackPlugin
} = require('clean-webpack-plugin');
const plugins = [];

plugins.push(
  new CleanWebpackPlugin({
    dry: false,
    verbose: false,
    dangerouslyAllowCleanPatternsOutsideProject: true,
    cleanOnceBeforeBuildPatterns: [
      '../assets/css/', '../assets/js/', '!custom.js'
    ],
  }),
  new MiniCssExtractPlugin({
    filename: '../css/theme.[contenthash:8].css',
  }),
  new ManifestPlugin(),
);

module.exports = {
  entry: {
    theme: './index.js',
  },
  output: {
    filename: '[name].[chunkhash:8].js',
    path: path.resolve(__dirname, '../assets/js'),
  },
  optimization: {
    minimizer: [
      new UglifyJsPlugin({
        sourceMap: true,
        extractComments: true,
      }),
    ],
  },
  module: {
    rules: [{
        test: /\.m?js$/,
        exclude: /(node_modules|bower_components)/,
        use: [{
          loader: 'babel-loader',
          options: {
            presets: [
              ['@babel/preset-env', {
                'targets': {
                  'browsers': ["defaults", "ie >= 9", "last 2 versions", "> 1%", "iOS 7", "last 3 iOS versions"],
                }
              }]
            ],
            cacheDirectory: true,
          },
        }],
      },
      {
        test: /\.(css|sass|scss)$/,
        use: [
          MiniCssExtractPlugin.loader, {
            loader: 'css-loader',
            options: {
              sourceMap: true,
              esModule: true,
              importLoaders: 1,
            },
          },
          {
            loader: 'postcss-loader',
            options: {
              sourceMap: true,
              config: {
                path: './postcss.config.js'
              },
              ident: 'postcss',
              plugins: () => [
                postcssPresetEnv()
              ],
            },
          },
          {
            loader: 'sass-loader',
            options: {
              sourceMap: true
            },
          },
        ],
      },
      {
        test: /.(jpg|png|woff(2)?|eot|ttf|svg)(\?[a-z0-9=\.]+)?$/,
        use: [{
          loader: 'file-loader?name=../img/[hash].[ext]'
        }],
      },
    ],
  },

  devtool: 'source-map',
  plugins: plugins,
  resolve: {
    extensions: ['.js', '.scss'],
  },
};