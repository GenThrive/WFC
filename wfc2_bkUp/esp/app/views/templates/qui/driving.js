define(['handlebars'], function(Handlebars) {return Handlebars.template(function (Handlebars,depth0,helpers,partials,data) {
  this.compilerInfo = [4,'>= 1.0.0'];
helpers = this.merge(helpers, Handlebars.helpers); data = data || {};
  var buffer = "", stack1, functionType="function", escapeExpression=this.escapeExpression;


  buffer += "<div class='slider-bookended'>\n  <img class=\"slider-bookend left\" src=\"";
  if (stack1 = helpers.appRoot) { stack1 = stack1.call(depth0, {hash:{},data:data}); }
  else { stack1 = (depth0 && depth0.appRoot); stack1 = typeof stack1 === functionType ? stack1.call(depth0, {hash:{},data:data}) : stack1; }
  buffer += escapeExpression(stack1)
    + "images/driving-low.svg\"/>\n  <div id=\"miles-driven\">\n    \n  </div>\n  <div class=\"slider-values\">\n    <span class=\"left\">0</span>\n    <span class=\"middle\">1000</span>\n    <span class=\"right\">2000</span>\n  </div>\n  <img class=\"slider-bookend right\" src=\"";
  if (stack1 = helpers.appRoot) { stack1 = stack1.call(depth0, {hash:{},data:data}); }
  else { stack1 = (depth0 && depth0.appRoot); stack1 = typeof stack1 === functionType ? stack1.call(depth0, {hash:{},data:data}) : stack1; }
  buffer += escapeExpression(stack1)
    + "images/driving-high.svg\"/>\n</div>\n\n<div>\n  <div class=\"prev-btn pill-button ball\"><span class=\"icon icon-chevron-left\"></span></div>\n  <div class=\"next-btn pill-button\"><span>SIGUIENTE</span><span class=\"icon icon-chevron-right\"></span></div>\n</div>\n";
  return buffer;
  });});