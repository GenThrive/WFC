define(['handlebars'], function(Handlebars) {return Handlebars.template(function (Handlebars,depth0,helpers,partials,data) {
  this.compilerInfo = [4,'>= 1.0.0'];
helpers = this.merge(helpers, Handlebars.helpers); data = data || {};
  


  return "<div class=\"multi-choice survey\">\n  <div id=\"indoor\" class=\"pill-button choice\"><span>INDOOR WATER USE</span></div>\n  <div id=\"outdoor\" class=\"pill-button choice\"><span>OUTDOOR WATER USE</span></div>\n  <div id=\"virtual\" class=\"pill-button choice\"><span>VIRTUAL WATER USE</span></div>\n  <div class=\"prev-btn pill-button back\"><span class=\"icon icon-chevron-left\"></span></div>\n</div>\n";
  });});