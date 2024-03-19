define(['handlebars'], function(Handlebars) {return Handlebars.template(function (Handlebars,depth0,helpers,partials,data) {
  this.compilerInfo = [4,'>= 1.0.0'];
helpers = this.merge(helpers, Handlebars.helpers); data = data || {};
  


  return "<div class=\"logo-main\"></div>\n<div class=\"logo-minor\"></div>\n\n<div id=\"restart-button\" class=\"button pill-button\">\n  <span>Start Over</span>\n  <span class=\"spin\"><span class=\"flip icon icon-clockwise\"></span></span>\n</div>\n\n<div id=\"header-navigation\">\n  <div id=\"jump-question\" class=\"button pill-button ball\">\n    <div id=\"hover_arrow\">Back To Top</div>\n    <span class=\"icon icon-arrow-thin-up\"></span>\n  </div>\n  <span id=\"show_detail_hover\">\n    <div id=\"jump-graph\" class=\"button pill-button ball\">\n      <div id=\"hover_result\">Your result in detail</div>\n      <span class=\"icon icon-graph-bar\"></span>\n    </div>\n    <div id=\"jump-table\" class=\"button pill-button ball\">\n      <span class=\"icon icon-view-list\"></span>\n    </div>\n  </span>\n</div>\n";
  });});