define(['handlebars'], function(Handlebars) {return Handlebars.template(function (Handlebars,depth0,helpers,partials,data) {
  this.compilerInfo = [4,'>= 1.0.0'];
helpers = this.merge(helpers, Handlebars.helpers); data = data || {};
  


  return "<h3 class=\"indoor\">Indoor Water</h3>\n<h3 class=\"outdoor\">Outdoor Water</h3>\n<h3 class=\"Virtual\">Virtual Water</h3>\n<div class=\"graph-bars-container\">\n  <div class=\"graph-depth\">\n    <span class='large_text'>Click on any item above or scroll down for detailed information.</span>\n  </div>\n  <div class=\"graph-bars\"></div>\n</div>\n";
  });});