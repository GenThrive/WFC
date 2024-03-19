define(['handlebars'], function(Handlebars) {return Handlebars.template(function (Handlebars,depth0,helpers,partials,data) {
  this.compilerInfo = [4,'>= 1.0.0'];
helpers = this.merge(helpers, Handlebars.helpers); data = data || {};
  


  return "<div id=\"mobile-prompt\">\n  <span>View Your Result</span><span class=\"icon icon-chevron-down\"></span>\n</div>\n\n<div id=\"start\" class=\"progress-group\">\n  <span>Start</span>\n  <div class=\"tri shadow\"></div>\n  <div class=\"tri\"></div>\n</div>\n\n<div id=\"progress-nodes\"></div>\n\n<div id=\"finish\" class=\"progress-group\">\n  <span class=\"progress-group-label\">Finish</span>\n</div>\n\n<div class=\"footer-text\"> <span class='feedback text'>Feedback</span> © 2019 GRACE Communications Foundation</div>\n";
  });});