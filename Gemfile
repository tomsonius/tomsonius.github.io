# Hello! This is where you manage which Jekyll version is used to run.
# When you want to use a different version, change it below, save the
# file and run `bundle install`. Run Jekyll with `bundle exec`, like so:
#
#     bundle exec jekyll serve
#
# This will help ensure the proper Jekyll version is running.
# Happy Jekylling!
# Gemfile

source "https://rubygems.org"

gem "jekyll", "~> 3.9.0"
gem "webrick", "~> 1.7"
gem "jekyll-remote-theme"
gem "jekyll-sitemap"
gem "kramdown-parser-gfm"
gem "jekyll-seo-tag" # Add this line

group :jekyll_plugins do
  gem "jekyll-feed"
end

platforms :mingw, :x64_mingw, :mswin, :jruby do
  gem "tzinfo", ">= 1", "< 3"
  gem "tzinfo-data"
end

gem "http_parser.rb", "~> 0.6.0", :platforms => [:jruby]
