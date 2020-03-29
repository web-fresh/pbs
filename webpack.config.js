const globImporter = require("node-sass-glob-importer");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const path = require("path");

module.exports = () => {
  return {
    mode: "production",
    devtool: false,
    entry: {
      main: ["./src/js/main.js", "./src/sass/main.scss"]
    },
    module: {
      rules: [
        {
          test: /\.scss$/,
          use: [
            {
              loader: MiniCssExtractPlugin.loader
            },
            {
              loader: "css-loader",
              options: {
                sourceMap: true,
                modules: false,
                localIdentName: "[local]___[hash:base64:5]",
                url: false
              }
            },
            {
              loader: "postcss-loader",
              options: {
                sourceMap: true
              }
            },
            {
              loader: "sass-loader",
              options: {
                importer: globImporter(),
                sourceMap: true,
              }
            }
          ]
        },
        {
          test: /\.js$/,
          exclude: /(node_modules|bower_components)/,
          use: {
            loader: "babel-loader",
            options: {
              presets: [["@babel/preset-env", { modules: false }]]
            }
          }
        }
      ]
    },
    output: {
      path: path.resolve(__dirname),
      filename: "app.min.js",
    },
    plugins: [
      new MiniCssExtractPlugin({
          filename: "app.min.css"
      }),
    ]
  };
};