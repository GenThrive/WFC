define(['handlebars'], function(Handlebars) {return Handlebars.template(function (Handlebars,depth0,helpers,partials,data) {
  this.compilerInfo = [4,'>= 1.0.0'];
helpers = this.merge(helpers, Handlebars.helpers); data = data || {};
  


  return "<div class=\"multi-choice survey\">\n  <div id=\"save-water\" class=\"pill-button choice\"><span>COMO AHORRAR AGUA</span></div>\n  <div id=\"help-environment\" class=\"pill-button choice\"><span>AYUDAR AL MEDIO AMBIENTE</span></div>\n  <div id=\"save-money\" class=\"pill-button choice\"><span>AHORRAR DINERO</span></div>\n  <div id=\"get-footprint\" class=\"pill-button choice\"><span>CONOCER MI HUELLA HÍDRICA</span></div>\n  <div class=\"prev-btn pill-button back\"><span class=\"icon icon-chevron-left\"></span></div>\n</div>\n";
  });});